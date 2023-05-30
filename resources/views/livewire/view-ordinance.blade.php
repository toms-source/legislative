
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           <a href="{{ route('home') }}"><i class="fa fa-arrow-left"></i></a> 
        </div>
        <div class="card-body">
            <h3 class="text-center">{{ $ordinance->title }}</h3>
            <p><strong>Ordinance Number:</strong> {{ $ordinance->ordinance_number }}</p>
            <p><strong>Tracking Level:</strong> {{ $ordinance->tracking_level }}</p>
            <p><strong>Date:</strong> {{ $ordinance->date }}</p>
            <p><strong>Last Action:</strong> {{ $ordinance->last_action }}</p>
            <p><strong>Author:</strong> {{ $ordinance->author }}</p>
            <p><strong>Keywords:</strong> {{ $ordinance->keywords }}</p>
            <p><strong>Last Action Date:</strong> {{ $ordinance->last_action_date }}</p>
        </div>
        <div class="card-footer">
           
        </div>
    </div>
</div>
@endsection
