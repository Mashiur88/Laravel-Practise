<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Division;
use App\District;
use App\Thana;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        $division = Division::all();
//        $district = District::where('id',$id)->get();
//        $thana = Thana::where('id',$id)->get();
        //echo "<pre>";
        //print_r($division); exit;
        return view('auth.register')->with('division',$division);
    }

    public function getDistrict($id)
    {   
        $districts = District::where('division_id',$id)->get();
        return view('getDistrict')->with('districts',$districts);
    }
    public function getThana($id)
    {
        $thanas = Thana::where('district_id',$id)->get();
        return view('getThana')->with('thana',$thanas);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'division' => ['required'],
            'district' => ['required'],
            'thana' => ['required'],
            'address' => ['required','string'],
            'status' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'division' => $data['division'],
            'district' => $data['district'],
            'thana' => $data['thana'],
            'address' => $data['address'],
            'status' => $data['status']
        ]);
    }
}
