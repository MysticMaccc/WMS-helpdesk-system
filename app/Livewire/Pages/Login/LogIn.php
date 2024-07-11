<?php

namespace App\Livewire\Pages\Login;

use App\Mail\sendOTPAuthenticateMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LogIn extends Component
{
    #[Validate([
        'email' => 'email|required',
        'password' => 'required',
        'invalidCredentials' => 'required',
        'OTP' => 'required',
    ])]

    public $email;
    public $password;
    public $showModal = false;
    public $generatedOTP;
    public $enteredOTP;
    public $invalidCredentials;
    public $OTP;

    #[Layout('layouts.guest')]

    public function submitOTP()
    {
        if ($this->enteredOTP == $this->generatedOTP) {
            Auth::attempt(['email' => $this->email, 'password' => $this->password]);
            $user = Auth::user();
            // Store authenticated user in session
            session(['Authenticated' => $user]);
            return redirect()->route('dashboard.index');
        } else {
            $this->addError('OTP', 'Invalid OTP.');
        }
    }

    public function logInAuthenticate()
    {
        $user = User::where('email', $this->email)->first();

        if ($user != null) {
            $passwordVerified = password_verify($this->password, $user->password);

            if ($passwordVerified) {
                $userEmail = $user->email;
                $this->generatedOTP = rand(0, 999999);
                Mail::to($userEmail)->send(new sendOTPAuthenticateMail($userEmail, $this->generatedOTP));
                $this->showModal = true;
            } else {
                $this->addError('password', 'Invalid password.');
            }
        } else {
            $this->addError('invalidCredentials', 'Oops.. Credentials not found on our end.');
        }
    }

    public function render()
    {
        return view('livewire.pages.login.log-in');
    }
}
