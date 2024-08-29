<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Patient;
use App\Models\Period;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;  
class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role_id==1)
        {
            return redirect('/admin/dashboard');
        }
        else
        {
            return redirect('/user/dashboard');
        }
    }
    public function admindashboard()
    {
        $topUsers = User::withCount('periods')
        ->orderBy('periods_count', 'desc')
        ->take(5)
        ->get();


       // Oxirgi 1 haftadagi bemorlarni hisoblash
       // Oxirgi 1 haftadagi bemorlarni hisoblash
       $patientsByWeek = Period::selectRaw('DATE(created_at) as date, COUNT(*) as count')
       ->where('created_at', '>=', Carbon::now()->subWeek())
       ->groupBy('date')
       ->orderBy('date', 'asc')
       ->get();

   // Oxirgi 1 yildagi bemorlarni hisoblash
   $patientsByYear = Period::selectRaw('MONTH(created_at) as month, MONTHNAME(created_at) as monthName, COUNT(*) as count')
       ->where('created_at', '>=', Carbon::now()->subYear())
       ->groupBy('month', 'monthName')
       ->orderBy('month', 'asc')
       ->get();

   // Formatlash
   $chartDataWeek = $this->formatChartDataWeek($patientsByWeek);
   $chartDataYear = $this->formatChartDataYear($patientsByYear);


   $rolesCount = User::select('role_id')
            ->groupBy('role_id')
            ->selectRaw('count(*) as total')
            ->get();

        // Chart uchun ma'lumotlarni tayyorlash
        $labels = $rolesCount->map(function ($item) {
            return $item->role_id == 1 ? 'Adminlar' : 'Foydalanuvchilar';
        })->toArray();
        
        $data = $rolesCount->pluck('total')->toArray();
        $periods = auth()->user()->periods()->distinct('patient_id')->where('date_end', null)->get(['patient_id']);

        // Har bir periodga tegishli patientlarning malumotlarini olish
        $patients = Patient::whereIn('id', $periods->pluck('patient_id'))->get();
        $periodsx = auth()->user()->periods()->distinct('patient_id')->get(['patient_id']);

        // Har bir periodga tegishli patientlarning malumotlarini olish
        $patientsx = Patient::whereIn('id', $periodsx->pluck('patient_id'))->get();
        $drugCounts = DB::table('drug_period')
        ->select('drug_id', DB::raw('count(*) as total'))
        ->groupBy('drug_id')
        ->orderBy('total', 'desc')
        ->limit(10)
        ->get();
        

    // Top-5 tavsiya etilgan dorilarni olish
    $drugIds = $drugCounts->pluck('drug_id')->toArray();

    // Dori vositalarini olish va tartibini saqlash
    $drugs = Drug::whereIn('id', $drugIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $drugIds) . ')')
        ->get();

    // Dori vositalariga ularning sonlarini qo'shish
    foreach ($drugs as $drug) {
        $drug->total = $drugCounts->where('drug_id', $drug->id)->first()->total;
    }


    $user=auth()->user();
        $colleagues = User::where('hospital_id', $user->hospital_id)
                          ->where('id', '<>', $user->id)->paginate(10);  
        return view('admin.index',
        [
            'chartDataWeek' => $chartDataWeek,
            'chartDataYear' => $chartDataYear,
            'labels' => $labels,
            'data' => $data,
            'drugs' => $drugs,
            'patients' => $patients,
            'patientsx' => $patientsx,
            'colleagues' => $colleagues,
            'topUsers' =>$topUsers
        ]);
    }
    private function formatChartDataWeek($patientsByDay)
    {
        $data = [];
        $startDate = Carbon::now()->subWeek()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $uzbekDays = [
            'Monday' => 'Dushanba',
            'Tuesday' => 'Seshanba',
            'Wednesday' => 'Chorshanba',
            'Thursday' => 'Payshanba',
            'Friday' => 'Juma',
            'Saturday' => 'Shanba',
            'Sunday' => 'Yakshanba'
        ];

        while ($startDate->lte($endDate)) {
            $date = $startDate->format('Y-m-d');
            $dayName = $uzbekDays[$startDate->format('l')] ?? $startDate->format('d-m-Y'); // Har qanday kunni ko'rsatish
            $count = $patientsByDay->firstWhere('date', $date)->count ?? 0;

            $data[] = [
                'day' => $dayName,
                'count' => $count,
            ];

            $startDate->addDay();
        }

        return $data;
    }

    private function formatChartDataYear($patientsByMonth)
    {
        $data = [];
        $months = [
            1 => 'Yanvar',
            2 => 'Fevral',
            3 => 'Mart',
            4 => 'Aprel',
            5 => 'May',
            6 => 'Iyun',
            7 => 'Iyul',
            8 => 'Avgust',
            9 => 'Sentabr',
            10 => 'Oktabr',
            11 => 'Noyabr',
            12 => 'Dekabr',
        ];

        foreach ($months as $monthNumber => $monthName) {
            $count = $patientsByMonth->firstWhere('month', $monthNumber)->count ?? 0;
            $data[] = [
                'month' => $monthName,
                'count' => $count,
            ];
        }

        return $data;
    }
    public function userdashboard(Request $request)
    {
        
        $patients = Patient::whereHas('periods', function($query) {
            $query->whereNull('date_end');
        })->paginate(10);
        
        $user=auth()->user();
        return view('user.index',[
            'user'=>$user,
            'patients'=>$patients,
        ]);
    }
}
