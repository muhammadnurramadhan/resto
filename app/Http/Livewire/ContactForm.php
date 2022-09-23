<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
 
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];
 
    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        ContactForm::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }
}
