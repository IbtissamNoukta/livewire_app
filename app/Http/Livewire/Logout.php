<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class Logout extends Component
{
    public function Logout(){
        Auth::logout();
        redirect('/');
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
