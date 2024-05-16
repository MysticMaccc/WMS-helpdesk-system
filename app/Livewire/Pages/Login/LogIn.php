<?php

namespace App\Livewire\Pages\Login;

use App\Http\Middleware\WmsAuthentication;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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


    public function logInAuthenticate()
    {

        // Attempt to authenticate using Sanctum
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            // Store authenticated user in session
            session(['Authenticated' => $user]);

            // Redirect to dashboard
            return redirect()->route('dashboard');
        } else {
            // Sanctum authentication failed
            $this->addError('email', 'Invalid credentials.');
        }
    }

    public function render()
    {

        return view('livewire.pages.login.log-in');
    }
}
