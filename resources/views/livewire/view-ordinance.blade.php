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
             
                <p><strong>Author:</strong> {{ $ordinance->author }}</p>
                <p><strong>Keywords:</strong> {{ $ordinance->keywords }}</p>
          
            </div>
            <div class="card-footer">

                @if (isset($ordinance->files) && $ordinance->files->count() > 0)
                    <div>
                        <h5>Edit History:</h5>
                        <ul>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Version</th>
                                        <th>Last Action</th>
                                        <th>Last Action Date</th>
                                        <th>File</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ordinance->files as $file)
                                        <tr class="text-center">
                                            <td>{{ $file->version }}</td>
                                            <td>{{ $file->last_action }}</td>
                                            <td>{{ $file->last_action_date }}</td>
                                            <td><a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">View</a></td>
                                            <td><button class="btn btn-primary" onclick="window.location.href='{{ asset('storage/' . $file->file_path) }}?download=1'">Download</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            


                        </ul>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
