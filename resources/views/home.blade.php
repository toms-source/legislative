@extends('layouts.app')
@livewireStyles
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @livewire('oridnance-form')
                    <div class="mt-3">@livewire('search-form')</div>
                    
                    @livewire('ordinance-list')
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@livewireScripts