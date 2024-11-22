<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return view("info.info",compact("user"));

        //return redirect(route('info',compact("user"), absolute: false));
    }
    public function info(User $user,Request $request){

        $weight = $request->weight;
        $height = $request->height;
        $age = $request->age;
        $activity_factor = $request->activity;

            // * For men:
            //^ BMR = 10 × weight (kg) + 6.25 × height (cm) - 5 × age (years) + 5

            // For women:
            //^ BMR = 10 × weight (kg) + 6.25 × height (cm) - 5 × age (years) - 161

            //! TDEE = BMR × Activity Factor

        if($request->gender == 'female'){
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
        }else{
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
        }

        $calories = $bmr * $activity_factor;

        $user->update([
            "age" => $request->age ,
            "weight" => $request->weight ,
            "height" => $request->height,
            "gender" => $request->gender,
            "calories" => $calories
        ]);
        return redirect(route("gym"));
    }
}
