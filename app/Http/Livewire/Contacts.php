<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contacts extends Component
{
    public $contacts = [];
    public $name = '';
    public $phone  = '';
    public function storeContact(){
        array_unshift($this->contacts,[
            'name' => $this->name,
            'phone' => $this->phone
        ]);
    }
    public function render()
    {
        return view('livewire.contacts')->with(['name' => $this->name]);
    }
}
