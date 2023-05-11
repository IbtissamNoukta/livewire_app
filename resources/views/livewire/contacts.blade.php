<div>
    {{-- The whole world belongs to you. --}}
    <div class="relative mx-auto w-auto max-w-2xl">
        <div class="bg-white w-full mt-2 p-5 border-solid border-2 rounded-md divide-gray-400">
            <label class="block mb-4">
                <span class="block text-sm font-medium text-slate-700">Contact image</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:loading wire:model="photo" type="file" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="block my-2">
                @if ($photo)
                Photo Preview:
                    @if(is_string($photo))
                        <img width="200" src="{{ asset("storage/photos/".$photo) }}">
                    @else
                        <img width="200" src="{{ $photo->temporaryUrl() }}">
                    @endif
                @endif
            </label>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Contact name</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:model="name" type="text" placeholder="Name" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Contact phone</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:model="phone" type="text" placeholder="Phone number" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('phone') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="flex justify-between">
                @if ($editing)
                    <!-- edit contact -->
                    <div class="flex">
                        <button
                        type ="button" class="rounded-none bg-blue-400 px-6 py-1 text-white rounded-l-lg"
                        wire:click="updateContact">Update</button>
                        <button
                        type ="button" class="rounded-none bg-red-400 px-6 py-1 text-white rounded-r-lg"
                        wire:click="cancelUpdate">Cancel</button>
                    </div>
                @else
                    <!-- add contact -->
                    <button
                    type ="submit" class="rounded-md bg-indigo-400 px-6 py-1 text-white"
                    wire:click="storeContact">Add</button>
                @endif
            </label>
            <div>
                @if (session()->has('message'))
                    <div class="alert bg-green-200 border-1 rounded-md p-1 mt-2">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <ul role="list" class="px-6 my-4 divide-y border-solid border-2 rounded-md divide-gray-200 mx-auto w-auto max-w-2xl items-center">
        @foreach ( $contactsList as $contact)
            <li class="justify-between gap-x-6 py-5">
        <div class="flex gap-x-4">
            <!-- :src="person.imageUrl" -->
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset("storage/photos/".$contact->photo) }}"/>
            <div class="min-w-0 flex-auto">
            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $contact->name }}</p>
            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $contact->phone  }}</p>
            </div>
            <div class="flex">
                <button class="rounded-none bg-yellow-500 px-4 text-white rounded-l-lg"
                wire:click="getContact({{ $contact->id }})">Edit</button>

                <button wire:click="deleteContact({{ $contact->id }});"
                class="rounded-none bg-red-400 px-2 text-white rounded-r-lg">Delete</button>

            </div>
        </div>
        </li>
        @endforeach
    </ul>
    <div class="mb-2">
        {{ $contactsList->links('custom-pagination-links-view') }}
    </div>
</div>
