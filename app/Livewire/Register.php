<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $username;
    public $password;
    public $password_confirmation;

    public function save()
    {
        $this->validate([
            'username' => 'required|min:5|unique:users,username',
            'password' => 'required|min:7',
            'password_confirmation' => 'required|confirmed:password',
        ]);

        User::create([
            'username' => $this->username,
            'password' => bcrypt($this->password)
        ]);

        // return redirect()->back()->withSuccess('User has been added successfully');
        return redirect()->intended('users.login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
