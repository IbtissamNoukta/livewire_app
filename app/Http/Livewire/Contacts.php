<?php

namespace App\Http\Livewire;
use App\Models\Contact;


use Livewire\Component;

class Contacts extends Component
{
    public $contacts;
    public $name = '';
    public $phone  = '';

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required|min:10|numeric',
    ];

    //first hook
    public function mount(){
        //last in top
        $contactsList = Contact::latest()->get();
        //first in top
        //$contactsList = Contact::all();
        $this->contacts = $contactsList;
    }

    public function storeContact(){
        $this->validate();
        // array_unshift($this->contacts,[
        //     'name' => $this->name,
        //     'phone' => $this->phone
        // ]);
        $newContact = new Contact();
        $newContact->name = $this->name;
        $newContact->phone = $this->phone;
        $newContact->save();
        //The prepend method will add a a given $value to the beginning of the collection
        $this->contacts->prepend($newContact);
        $this->name='';
        $this->phone='';
    }

    public function render()
    {
        return view('livewire.contacts')->with(['name' => $this->name]);
    }
}
