<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username;
    public $password;
    
    public function save()
    {
        $this->validate([
            'username' => 'required|min:5|exists:users,username',
            'password' => 'required|min:7'
        ]);

        if (Auth::attempt([
            'username' => $this->username,
            'password' => $this->password
        ])) {
            return redirect()->intended(route('products.index'));
        }

        return redirect()->back()->withErrors([
            'username' => 'Username does not exists in the system'
        ])->onlyInput('username');
    }

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.app');
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }
}
