<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\raw_team;
use App\Models\smackdown_team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_power' => 0,
        ]);
        $id_user = DB::table('users')
                        ->where('email',$data['email'])
                        ->value('id'); 
                           
        raw_team::create([
            'user_id' => $id_user,
            'superstar01' => 999,
            'superstar02' => 998,
            'superstar03' => 997,
            'superstar04' => 996
        ]);
        smackdown_team::create([
            'user_id' => $id_user,
            'superstar01' => 999,
            'superstar02' => 998,
            'superstar03' => 997,
            'superstar04' => 996
        ]);
        return $user;
        
    }
}
