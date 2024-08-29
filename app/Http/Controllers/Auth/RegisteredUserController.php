<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles=Role::all();
        $hospitals=Hospital::all();
        return view('auth.register', compact('hospitals', 'roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'hospital1' => 'nullable|string',
            'hospital2' => 'nullable|string|unique:hospitals,name',
        ]);
        if (!$request->hospital1 && !$request->hospital2) {
            $validator->errors()->add('hospital', 'Kasalxona tanlanish  i kerak.');
        }

        // Agar validatsiya muvaffaqiyatsiz bo'lsa, xatolarni qaytarish
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->hospital2) {
            $maxId = Hospital::max('id');

            $hospital=Hospital::create(
                [
                    'name'=>$request->hospital2,
                    'address'=>'nomalum'. $maxId+1
                
                ]
            );
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id'=>$request->role,
                'hospital_id'=>$hospital->id,
            ]);
    
        }
        else
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id'=>$request->role,
                'hospital_id'=>$request->hospital1,
            ]);
        }

        

        event(new Registered($user));

        

        return redirect(RouteServiceProvider::HOME);
    }
}
