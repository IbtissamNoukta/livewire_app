<?php

namespace App\Http\Livewire;
use App\Models\Contact;
use Livewire\WithPagination;


use Livewire\Component;

class Contacts extends Component{
    use WithPagination;


    public $contacts;
    public $name;
    public $phone;
    public $contactId;
    public $editing = false;

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required|digits:10|numeric',
    ];

    //first hook
    public function mount(){
        $this->getContacts();
    }
    public function getContacts(){
        //last in top
        $this->contacts = Contact::latest('updated_at')->get();
        //first in top
        //$contactsList = Contact::all();
        //$this->contacts = $contacts;
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
        session()->flash('message', 'Contact successfully added.');
    }
    public function getContact($contactId){
        $contact = Contact::find($contactId);
        $this->contactId = $contact->id;
        $this->name = $contact->name;
        $this->phone = $contact->phone;
        $this->editing = true;
    }
    public function cancelUpdate(){
        $this->contactId = '';
        $this->name = '';
        $this->phone = '';
        $this->editing = false;
    }
    public function updateContact(){
        $this->validate();
        $contact = Contact::find($this->contactId);
        $contact->name = $this->name;
        $contact->phone = $this->phone;
        $contact->update();
        $this->getContacts();
        $this->contactId = '';
        $this->name = '';
        $this->phone = '';
        $this->editing = false;
        session()->flash('message', 'Contact successfully updated.');

    }
    public function deleteContact($contactId){
        $contact = Contact::find($contactId);
        $contact->delete();
        $this->getContacts();
        $this->contactId = '';
        $this->name = '';
        $this->phone = '';
        $this->editing = false;
        session()->flash('message', 'Contact successfully deleted.');

    }

    public function render()
    {
        // ['name' => $this->name]
        return view('livewire.contacts')->with(['contactsList' => Contact::paginate(3)]);
    }
}
