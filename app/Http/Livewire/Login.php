<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:8',
    ];
    public function mount(){
        if(auth()->check()){
            redirect('/');
        }
    }

    public function Login(){
        $this->validate();
        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            redirect('/');
        }else{
            session()->flash('message', 'Incorrect. Please try again');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
