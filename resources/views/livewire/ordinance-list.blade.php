<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Ordinance Number</th>
                    <th>Title</th>
                    <th>Tracking Level</th>
                    <th>Date of Upload</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordinances as $ordinance)
                    <tr class="text-center">
        
                        <td>{{ $ordinance->ordinance_number }}</td>
                        <td><a href="{{ Storage::url($ordinance->file_path) }}" target="_blank">
                                {{ $ordinance->title }}
                            </a></td>
                        <td class="text-uppercase">{{ $ordinance->tracking_level }}</td>
                        <td>{{ $ordinance->created_at }}</td>
                
                        <td> 
                            <button class="fa fa-edit border-0" data-target="#editordinance" type="button" data-toggle="modal" wire:click="editOrdinance({{ $ordinance->id }})"></button>
                            <a href="{{ route('view-ordinance', $ordinance) }}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

 

</div>
