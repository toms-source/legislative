@extends('layouts.app')
@livewireStyles
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">{{ __('Action') }}</div>

                <div class="card-body">
                    @livewire('oridnance-form')
                    <button type="submit" class="btn btn-primary col-12 mt-2">EDIT ORDINANCE</button>
                    <button type="submit" class="btn btn-primary col-12 mt-2">VIEW ORDINANCE</button>
                    <hr class="hr"/>
                    <h3>Search:</h3>
                     @livewire('search-form')
                    <button type="submit" class="btn btn-primary col-12 mt-2">SEARCH</button>

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

                  
          
                    @livewire('ordinance-list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@livewireScripts