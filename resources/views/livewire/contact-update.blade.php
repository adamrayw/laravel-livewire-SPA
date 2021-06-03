<div>
    <div class="mb-6 text-left md:text-center">
        <form wire:submit.prevent="update">
            <input type="hidden" name="" wire:model="contactId">
            @if(session()->has('message'))
            <div class="text-sm text-left text-gray-600 bg-gray-200 border border-gray-400 h-12 flex items-center p-4 rounded-sm mb-4" role="alert">
                {{session('message')}}
            </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4 max-w-xl mx-auto md:mx-0 text-left md:text-left">
                <input wire:model="name" id="name" type="text" name="" class="h-full border-gray-300 px-2 transition-all border-blue rounded-sm" placeholder="Name" value="{{ $name }}" />
                <input wire:model="phone" id="phone" type="text" name="" class="h-full border-gray-300 px-2 transition-all border-blue rounded-sm" placeholder="Phone" />
                @error('name') <span class="text-red-400 text-sm block">{{ $message }}</span>@enderror
                @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="focus:outline-none text-white text-sm py-2 px-6 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Update</button>
            <button type="button" wire:click="cancelUpdate()" class="focus:outline-none text-white text-sm py-2 px-6 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Cancel</button>
        </form>
    </div>
</div>