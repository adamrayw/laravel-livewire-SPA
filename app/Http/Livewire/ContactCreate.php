<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use WireUi\Traits\Actions;


class ContactCreate extends Component
{
    use Actions;
    // public $contacts;

    // public function mount($contacts)
    // {
    //     $this->contacts = $contacts;
    // }

    public $name;
    public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    protected $rules = [
        'name' => 'required|min:6',
        'phone' => 'required|numeric|min:9'
    ];

    public function store()
    {
        $this->validate();

        $contacts = Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->resetInput();

        $this->emit('contactStored', $contacts);
    }

    public function caneae()
    {
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
