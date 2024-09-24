<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\ContactFormMail;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Mail;

#[Title('Contact | InstaCapture Fotograf Profesionist în Cluj-Napoca')]

class Contact extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submitForm()
    {
        $this->validate();

        // Trimite email
        Mail::to('paultut@yahoo.com')->send(new ContactFormMail($this->name, $this->email, $this->message));
      
        // Resetează câmpurile formularului
        $this->reset(['name', 'email', 'message']);

        // Afișează mesajul de succes
        session()->flash('message', 'Mesajul a fost trimis cu succes!');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}