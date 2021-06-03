<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use Actions;
    use WithPagination;

    public $statusUpdate = false;
    public $search;
    protected $queryString = ['search'];
    public $paginate = 5;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated',
        'cancelUpdate' => 'handleCancelUpdate'
    ];

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => Contact::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)

        ]);
    }

    public function delete($contactId)
    {
        $contact = Contact::find($contactId);

        $contact->delete();

        // session()->flash('message', 'Data Berhasil Dihapus.');

        $this->errorNotification(
            $title = 'User Deleted',
            $description = 'User was successfull deleted!',
        );
    }

    public function getUser($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);

        $this->emit('getContact', $contact);
    }

    public function handleUpdated($contact)
    {
        $this->statusUpdate = false;
        $this->successNotification(
            $title = 'User Updated',
            $description = 'User ' . $contact['name'] . ' was successfull updated!'
        );
    }

    public function handleStored($contacts)
    {
        $this->successNotification(
            $title = 'User Added',
            $description = 'User ' . $contacts['name'] . ' was successfull added!'
        );
    }

    public function handleCancelUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }

    public function cancel()
    {
    }
}
