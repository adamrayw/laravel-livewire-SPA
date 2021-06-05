<div class="bg-white pb-4 px-4 rounded-md w-full">

    <x-notifications z-index="z-50" />

    @if($statusUpdate)
    <livewire:contact-update></livewire:contact-update>
    @else
    <livewire:contact-create></livewire:contact-create>

    @endif
    <hr>

    <div class="flex justify-between items-center w-full pt-6 ">

        <p class="text-2xl font-bold"> Users Table</p>
        <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.4">
                <circle cx="2.19796" cy="1.80139" r="1.38611" fill="#222222" />
                <circle cx="11.9013" cy="1.80115" r="1.38611" fill="#222222" />
                <circle cx="7.04991" cy="1.80115" r="1.38611" fill="#222222" />
            </g>
        </svg>
    </div>
    <div class="container-search">
        <div class="w-80 max-w-full px-0 my-2">
            <div class="w-80 max-w-full inline-block relative ">
                <input wire:model="search" type="search" name="" class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-2 px-4 pl-8 rounded-lg" placeholder="Search by name..." />

                <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

                    <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                        <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Dropdown -->

        <select wire:model="paginate" name="" id="" class="leading-snug border border-gray-300 block appearance-none bg-gray-100 text-sm text-gray-600 py-2 pl-4 my-2 rounded-lg">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>

    <hr>
    <!-- TABLE -->

    <div class="overflow-x-auto mt-6">

        <table class="table-auto border-collapse w-full">
            <thead>
                <tr class="rounded-lg text-sm font-medium text-black-700 text-left" style="font-size: 0.9674rem">
                    <th class="px-4 py-2 bg-gray-100 ">#</th>
                    <th class="px-4 py-2 bg-gray-100">Name</th>
                    <th class="px-4 py-2 bg-gray-100">Phone</th>
                    <th class="px-4 py-2 bg-gray-100"></th>
                </tr>
            </thead>
            <tbody class="text-sm font-normal text-gray-700">
                <?php $no = 0 ?>
                @foreach ($contacts as $contact)
                <?php $no++ ?>
                <tr class="hover:bg-gray-100 border-b border-gray-200 py-10 w-full">
                    <td class="px-4 py-4">{{$no}}</td>
                    <td class="px-4 py-4">{{$contact->name}}</td>
                    <td class="px-4 py-4">{{$contact->phone}}</td>
                    <td class="px-4 py-4">
                        <button type="button" wire:click="getUser({{ $contact->id }})" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Edit</button>
                        <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg" @confirmAction({ title: 'Are you Sure?' , icon: 'warning' , accept: { label: 'Yes, delete it' , method: 'delete' , params: '{{$contact->id}}' }, reject: { label: 'No, cancel' , method: 'cancel' } })>Delete</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @if (count($contacts) < 1) <p class="my-6 text-center">Sorry, user not found</p> @endif
    </div>

    <!-- PAGINATION -->
    {{$contacts->links()}}
    <!-- <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center">

        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.4">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z" fill="#2C2C2C" />
            </g>
        </svg>

        <p class="leading-relaxed cursor-pointer mx-2 text-blue-600 hover:text-blue-600 text-sm">1</p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600">2</p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 3 </p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 4 </p>
        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z" fill="#18A0FB" />
        </svg>

    </div> -->
</div>