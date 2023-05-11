@extends('app')

@section('content')
    <div class="grid justify-self-center">
        <div>
            {{-- The best athlete wants his opponent at his best. --}}
            <div class="relative mx-auto w-auto max-w-2xl">
                <div class="bg-white w-full mt-2 p-5 border-solid border-2 rounded-md divide-gray-400">
                    <label class="block mb-4">
                        <b class="text-2xl font-bold text-slate-700 border-b-4">Profil</b>
                    </label>
                    <label class="block my-4">
                        <img  style="width: 60px; height: 60px;" class="flex-none rounded-full bg-gray-50" src="{{ asset("storage/photos/".auth()->user()->photo) }}"/>
                    </label>
                    <label class="block my-4">
                        <span class="block text-sm font-medium text-slate-700">Name : {{ auth()->user()->name }}</span>
                    </label>
                    <label class="block my-4">
                        <span class="block text-sm font-medium text-slate-700">Email :{{ auth()->user()->email }}</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
@endsection
