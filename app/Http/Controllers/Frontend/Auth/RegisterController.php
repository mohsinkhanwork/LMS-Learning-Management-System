<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Helpers\Frontend\Auth\Socialite;
use App\Events\Frontend\Auth\UserRegistered;
use App\Mail\Frontend\Auth\AdminRegistered;
use App\Models\Auth\User;
use Arcanedev\NoCaptcha\Rules\CaptchaRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ClosureValidationRule;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
<<<<<<< HEAD
use Illuminate\Support\Facades\Mail;
use App\Notifications\leadPassword;
use Notification;
use Illuminate\Support\Facades\Make;
=======
>>>>>>> 01c8e8b33f7e541cac16bd5284d6f96fd11d0959


/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        return view('frontend.auth.register')
            ->withSocialiteLinks((new Socialite)->getSocialLinks());
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:6|confirmed',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
            'g-recaptcha-response' => (config('access.captcha.registration') ? ['required',new CaptchaRule] : ''),
        ],[
            'g-recaptcha-response.required' => __('validation.attributes.frontend.captcha'),
        ]);

        if ($validator->passes()) {

            
            // Store your user in database
            event(new Registered($user = $this->create($request->all())));
            $this->guard()->login($user);
            // dd($user->id);
           
            return response(['success' => true]);

        }

        return response(['errors' => $validator->errors()]);
    }


    public function register_one(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:6|confirmed',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
            'g-recaptcha-response' => (config('access.captcha.registration') ? ['required',new CaptchaRule] : ''),
        ],[
            'g-recaptcha-response.required' => __('validation.attributes.frontend.captcha'),
        ]);

        if ($validator->passes()) {

            
            // Store your user in database
            event(new Registered($user = $this->create_one($request->all())));
            $this->guard()->login($user);
            // dd($user->id);
           
            return response(['success' => true]);

        }

        return response(['errors' => $validator->errors()]);
    }


    


    public function register_lead(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'g-recaptcha-response' => (config('access.captcha.registration') ? ['required',new CaptchaRule] : ''),
            ],[
                'g-recaptcha-response.required' => __('validation.attributes.frontend.captcha'),
            ]);

            if ($validator->passes()) {

                
                // Store your user in database
                event(new Registered($user = $this->create_lead($request->all())));
                $this->guard()->login($user);
                // dd($user->id);

                
               
                return response(['success' => true]);

            }

            return response(['errors' => $validator->errors()]);
        }


    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'refferal_code'=> Str::upper(bin2hex(random_bytes(4))),
            'refferal_code_affilate'=> $data['refferal_code_affilate'],
        ]);
                $user->dob = isset($data['dob']) ? $data['dob'] : NULL ;
                $user->phone = isset($data['phone']) ? $data['phone'] : NULL ;
                $user->gender = isset($data['gender']) ? $data['gender'] : NULL;
                $user->address = isset($data['address']) ? $data['address'] : NULL;
                $user->city =  isset($data['city']) ? $data['city'] : NULL;
                $user->pincode = isset($data['pincode']) ? $data['pincode'] : NULL;
                $user->state = isset($data['state']) ? $data['state'] : NULL;
                $user->country = isset($data['country']) ? $data['country'] : NULL;
                $user->save();

        $userForRole = User::find($user->id);
        $userForRole->confirmed = 1;
        $userForRole->save();
        $userForRole->assignRole('student');

        if(config('access.users.registration_mail')) {
            $this->sendAdminMail($user);
        }

        return $user;
    }

 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create_one(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'refferal_code'=> Str::upper(bin2hex(random_bytes(4))),
            'refferal_code_affilate'=> $data['refferal_code_affilate'],
        ]);
                $user->dob = isset($data['dob']) ? $data['dob'] : NULL ;
                $user->phone = isset($data['phone']) ? $data['phone'] : NULL ;
                $user->gender = isset($data['gender']) ? $data['gender'] : NULL;
                $user->address = isset($data['address']) ? $data['address'] : NULL;
                $user->city =  isset($data['city']) ? $data['city'] : NULL;
                $user->pincode = isset($data['pincode']) ? $data['pincode'] : NULL;
                $user->state = isset($data['state']) ? $data['state'] : NULL;
                $user->country = isset($data['country']) ? $data['country'] : NULL;
                $user->save();

        $userForRole = User::find($user->id);
        $userForRole->confirmed = 1;
        $userForRole->save();
        $userForRole->assignRole('student');

        if(config('access.users.registration_mail')) {
            $this->sendAdminMail($user);
        }

        return $user;
    }





     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create_lead(array $data)
    {
        $pass = substr(md5(mt_rand()), 0, 9);
        $user = User::create([
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($pass),
            'refferal_code'=> Str::upper(bin2hex(random_bytes(4))),
            'refferal_code_affilate'=> $data['refferal_code_affilate'],
        ]);
                $user->dob = isset($data['dob']) ? $data['dob'] : NULL ;
                $user->phone = isset($data['phone']) ? $data['phone'] : NULL ;
                $user->gender = isset($data['gender']) ? $data['gender'] : NULL;
                $user->address = isset($data['address']) ? $data['address'] : NULL;
                $user->city =  isset($data['city']) ? $data['city'] : NULL;
                $user->pincode = isset($data['pincode']) ? $data['pincode'] : NULL;
                $user->state = isset($data['state']) ? $data['state'] : NULL;
                $user->country = isset($data['country']) ? $data['country'] : NULL;
                $user->save();

        $userForRole = User::find($user->id);
        $userForRole->confirmed = 1;
        $userForRole->save();
        $userForRole->assignRole('student');

        if(config('access.users.registration_mail')) {
            $this->sendAdminMail($user);
        }

        $password = NULL;
        $password = $pass;
        $email = $data['email'];

        Notification::route('mail', $email)->notify(new leadPassword($password));

        return $user;
    }

    



    private function sendAdminMail($user)
    {
        $admins = User::role('administrator')->get();

        foreach ($admins as $admin){
            \Mail::to($admin->email)->send(new AdminRegistered($user));
        }
    }



}
