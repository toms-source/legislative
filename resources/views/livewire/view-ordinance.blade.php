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

                @if (isset($ordinance->files) && $ordinance->files->count() > 0)
                    <div>
                        <h3>Previous Versions:</h3>
                        <ul>

                            @foreach ($ordinance->files as $file)
                                <li class='mt-3'>
                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">Version
                                        {{ $file->version }}</a>
                                    <button class="btn btn-primary"
                                        onclick="window.location.href='{{ asset('storage/' . $file->file_path) }}?download=1'">Download</button>

                                </li>
                            @endforeach


                        </ul>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
