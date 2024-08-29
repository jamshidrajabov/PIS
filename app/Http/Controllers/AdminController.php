<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(Request $request)
    {
        $patients = Patient::whereHas('periods', function($query) {
            $query->whereNull('date_end');
        })->paginate(10);
        return view('admin.createpatient', compact('patients'));
    }
    public function destroy($id)
    {
    $user = User::find($id);

    if ($user) {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User muvaffaqiyatli o\'chirildi');
    }

    return redirect()->route('admin.users')->with('error', 'User topilmadi');
}

    public function addadmin($id)
    {
        $user = User::findOrFail($id);
        $user->update(
            ['role_id'=>1]
        );
        return redirect()->back();
    }
    public function minusadmin($id)
    {
        $user = User::findOrFail($id);
        $user->update(
            ['role_id'=>2]
        );
        return redirect()->back();
    }
    public function users(Request $request)
    {
        $query = User::query();
    
        // Lavozim bo'yicha filtrni qo'llash
        if ($request->has('lavozim') && $request->lavozim != '') {
            $role = ($request->lavozim == 'Admin') ? 1 : 2; // Lavozim ID'sini aniqlash
            $query->where('role_id', $role);
        }
    
        $users = $query->where('id', '!=', auth()->user()->id) // Kirib turgan foydalanuvchini chiqarib tashlash
        ->withCount([
            'periods',
            'periods as active_periods_count' => function ($query) {
                $query->whereNull('date_end');
            }
        ])
        ->orderBy('name', 'desc')
        ->paginate(10);
    
        if ($request->ajax()) {
            return view('admin.user.partialsusers_table', compact('users'))->render(); // Faqat ma'lumotlarni qaytaradi
        }
            // Ommaviy so'rov uchun
            return view('admin.user.users', compact('users'));
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Foydalanuvchi biror narsa qidirsa
            $patients = Patient::where('last_name', 'LIKE', "%{$query}%")
                                ->orWhere('first_name', 'LIKE', "%{$query}%")
                                ->orWhere('passport', 'LIKE', "%{$query}%")
                                ->paginate(10); // 10 tadan paginate
        } else {
            // Qidiruv maydoni bo'sh bo'lsa, barcha patientlarni alfavit tartibida ko'rsatish
            $patients = Patient::orderBy('last_name', 'asc')->paginate(10); // Alfavit bo'yicha 10 tadan paginate
        }
    
        // AJAX so'rovi uchun JSON formatida qaytarish
        if ($request->ajax()) {
            return response()->json([
                'data' => $patients->items(),  // Hozirgi sahifadagi bemorlar ro'yxati
                'links' => (string) $patients->links(),  // Pagination tugmalari uchun linklar
                'pagination' => [
                    'current_page' => $patients->currentPage(),
                    'last_page' => $patients->lastPage(),
                    'total' => $patients->total(),
                ],
            ]);
        }
        
        if (auth()->user()->id==1)
        {
            return view('admin.createpatient', compact('patients'));
        }
        else{
            $user=auth()->user();
        return view('user.index',[
            'user'=>$user,
            'patients'=>$patients,
        ]);
        }
        

        
    }
    
}
