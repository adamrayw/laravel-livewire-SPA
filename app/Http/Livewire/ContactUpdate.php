<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{

    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function update()
    {
        $contact = Contact::find($this->contactId);

        $contact->update([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->resetInput();

        $this->emit('contactUpdated', $contact);
    }

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function cancelUpdate()
    {
        $statusUpdate = false;

        $this->emit('cancelUpdate', $statusUpdate);
    }

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
