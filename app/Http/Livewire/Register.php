<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class Register extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $photo;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required',
        'password' => 'required|min:8',
    ];

    public function mount(){
        if(auth()->check()){
            redirect('/');
        }
    }

    public function Register(){
        $this->validate();
        $newUser = new User();
        $newUser->name = $this->name;
        $newUser->email = $this->email;
        $newUser->password = bcrypt($this->password);

        if($this->photo){
            $this->validate([
                'photo' => 'image|max:1024',
            ]);
            $newUser->photo = $this->storePhoto();
        }
        $newUser->save();
        $this->name='';
        $this->email='';
        $this->password='';
        $this->photo='';
        session()->flash('message', 'User successfully created.');
    }
    public function storePhoto(){
        $this->photo->storeAs('photos', $this->photo->getClientOriginalName(), 'public');
        return $this->photo->getClientOriginalName();
    }

    public function render()
    {
        return view('livewire.register');
    }
}
