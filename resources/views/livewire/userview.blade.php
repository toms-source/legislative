<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th wire:click="sortBy('ordinance_number')">Ordinance Number
                        <i class="fas {{ $sortField === 'ordinance_number' ? ($sortDirection === 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                    </th>
                    <th wire:click="sortBy('title')">Title
                        <i class="fas {{ $sortField === 'title' ? ($sortDirection === 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                    </th>
                    <th wire:click="sortBy('tracking_level')">Tracking Level
                        <i class="fas {{ $sortField === 'tracking_level' ? ($sortDirection === 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                    </th>
                    <th wire:click="sortBy('date')">Date of Upload
                        <i class="fas {{ $sortField === 'date' ? ($sortDirection === 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                    </th>
                    <th>Last Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordinances as $ordinance)
                    <tr class="text-center">
                        <td>{{ $ordinance->ordinance_number }}</td>
                        <td>
                            @if(($ordinance->files->last()->file_path)==null)
                                    {{ $ordinance->title }}
                            @else
                                <a href="{{ asset('storage/' . $ordinance->files->last()->file_path) }}" target="_blank">
                                    {{ $ordinance->title }}
                                </a>
                            @endif
                        </td>
                        <td class="text-uppercase">{{ $ordinance->tracking_level }}</td>
                        <td>{{ $ordinance->date }}</td>
                            
                        <td>
                            @if(($ordinance->files->last()->last_action)==null)
                                <span class="text-danger">No Action Taken</span>
                            @else
                                {{ $ordinance->files->last()->last_action }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         
           
    </div>
</div>
