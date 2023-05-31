<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Ordinance Number</th>
                    <th>Title</th>
                    <th>Tracking Level</th>
                    <th>Date of Upload</th>
                    <th>Last Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($this->ordinances as $ordinance)
                    <tr class="text-center">
        
                        <td>{{ $ordinance->ordinance_number }}</td>
                        <td>
                            @if($ordinance->files->last())
                                <a href="{{ asset('storage/' . $ordinance->files->last()->file_path) }}" target="_blank">
                                    {{ $ordinance->title }}
                                </a>
                            @else
                                {{ $ordinance->title }}
                            @endif
                        </td>
                        <td class="text-uppercase">{{ $ordinance->tracking_level }}</td>
                        <td>{{ $ordinance->date }}</td>
                        <td>{{ $ordinance->files->last()->last_action }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

 

</div>
