@extends('app')

@section('content')
    <div class="grid justify-self-center">
        <div class="grid grid-flow-col me-5 justify-stretch">
            <livewire:register/>
            <livewire:login/>
        </div>
    </div>
@endsection
