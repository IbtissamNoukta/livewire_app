<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="relative mx-auto w-auto max-w-2xl">
        <div class="bg-white w-full mt-2 p-5 border-solid border-2 rounded-md divide-gray-400">
            <label class="block mb-4">
            <b class="text-2xl font-bold text-slate-700 border-b-4">Register</b>
            </label>
            <label class="block mb-4">
                <span class="block text-sm font-medium text-slate-700">Profil image</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:loading wire:model="photo" type="file" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('photo') <span class="error text-red-600">{{ $message }}</span> @enderror
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
                <span class="block text-sm font-medium text-slate-700">Your Name</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:model="name" type="text" placeholder="Name" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Your Email</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:model="email" type="email" placeholder="Email" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('email') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Your Password</span>
                <!-- Using form state modifiers, the classes can be identical for every input -->
                <input wire:model="password" type="password" placeholder="Password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"/>
                @error('password') <span class="error text-red-600">{{ $message }}</span> @enderror
            </label>
            <label class="flex justify-between">
                    <!-- add profil -->
                    <button
                    type ="submit" class="rounded-md bg-indigo-400 px-6 py-1 text-white"
                    wire:click="Register">Register</button>
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
</div>
