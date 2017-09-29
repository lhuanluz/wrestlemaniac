<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use App\Mail\NewUserVerify;
use App\Models\raw_team;
use App\Models\league;
use App\Models\smackdown_team;
use App\Models\ppv_team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


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
    protected $redirectTo = '/';

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
            'name' => 'required|string|max:25',
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
            'verifyCode' => base64_encode(str_random(40)),
            'id_league' => 1
            
        ]);
        $id_user = DB::table('users')
                        ->where('email',$data['email'])
                        ->value('id'); 
                           
        raw_team::create([
            'user_id' => $id_user,
            'superstar01' => 103,
            'superstar02' => 102,
            'superstar03' => 101,
            'superstar04' => 100
        ]);
        smackdown_team::create([
            'user_id' => $id_user,
            'superstar01' => 103,
            'superstar02' => 102,
            'superstar03' => 101,
            'superstar04' => 100
        ]);
        ppv_team::create([
            'user_id' => $id_user,
            'superstar01' => 103,
            'superstar02' => 102,
            'superstar03' => 101,
            'superstar04' => 100
        ]);
        Mail::to($data['email'])->queue(new NewUserVerify($user));
        return $user;
        
    }
    
}
