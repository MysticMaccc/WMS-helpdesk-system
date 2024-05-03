<?php

namespace App\Livewire\Pages\Login;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LogIn extends Component
{
    #[Validate([
        'email' => 'email|required',
        'password' => 'required'
    ])]
    public $email;
    public $password;
    public $showModal = false;
    public $generatedOTP;
    public $OTP;

    #[Layout('layouts.guest')]

    
    public function logInAuthenticate(){
        $this->validate();

        $checkUser = User::where('email', $this->email)->first();
        $verify = false;
        if ($checkUser) {
            $verify = password_verify($this->password, $checkUser->password);
        }else{
            $this->addError('email', 'There is no match credentials to our records.');
        }

        if ($verify) {
            session(['Authenticated' => $checkUser]);

            // Auth::login($checkUser);

            return redirect()->intended('dashboard');

            $this->generatedOTP = rand(0, 999999);
            $this->showModal = true;
        }
    }
    
    public function render()
    {
        return view('livewire.pages.login.log-in');
    }
}
