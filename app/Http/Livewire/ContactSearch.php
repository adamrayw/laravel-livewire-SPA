<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactSearch extends Component
{

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.contact-search', [
            'contacts' => Contact::where('name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}
