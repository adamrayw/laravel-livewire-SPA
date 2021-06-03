<div>
    <input wire:model="search" type="search" placeholder="Search posts by title...">

    <h1>Search Results:</h1>

    <ul>
        @foreach($contacts as $contact)
        <li>{{ $contact->name }}</li>
        @endforeach
    </ul>
</div>