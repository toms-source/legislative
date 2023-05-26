@extends('layouts.app')
@livewireStyles
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">{{ __('Action') }}</div>

                <div class="card-body">
                    <a href="{{ url('add') }}" type="submit" class="btn btn-primary col-12 mt-2">ADD ORDINANCE</a>
                    <button type="submit" class="btn btn-primary col-12 mt-2">EDIT ORDINANCE</button>
                    <button type="submit" class="btn btn-primary col-12 mt-2">VIEW ORDINANCE</button>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @livewire('oridnance-form')
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@livewireScripts