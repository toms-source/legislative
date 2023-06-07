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
                        <td> 
                            @if(($ordinance->files->last()->file_path)==null)
                            {{ $ordinance->title }}
                            @else
                            <a href="{{ asset('storage/' . $ordinance->files->last()->file_path) }}" target="_blank">
                            {{ $ordinance->title }}
                            @endif
                        </a>
                        </td>
                        <td class="text-uppercase">{{ $ordinance->tracking_level }}</td>
                        <td>{{ $ordinance->date }}</td>
                
                        <td> 
                            <button class="fa fa-edit border-0" data-target="#editordinance" type="button" data-toggle="modal" wire:click="editOrdinance({{ $ordinance->id }})"></button>
                            <a href="{{ route('view-ordinance', $ordinance) }}"><i class="fa fa-eye"></i></a>
                            <a wire:click="deleteForm({{$ordinance->id}})"><i class="fa-solid fa-trash-can" <i class="fa-solid fa-trash-can" style="color: #e61919;"></i></i></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="ordinanceDelete" tabindex="-1" role="dialog"
                    aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ordinanceAddedModalLabel">Ordinance Deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this ordinance?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="deleteOrdinance({{ $ordinance->id }})">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
 

</div>
<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('ordinanceDelete', () => {
            console.log('ordinanceAdded event received');

            // document.getElementById('editordinance').classList.remove('show');
            // document.body.classList.remove('modal-open');
            // document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'ordinanceDelete'));
            modalOrdinanceAdded.show();
        });
    });
</script>
