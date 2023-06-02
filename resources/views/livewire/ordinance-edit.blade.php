<div>
    <div class="col-8">
        <div class="modal fade" id="editordinance" tabindex="-1" role="dialog" aria-labelledby="editordinanceLabel"
            aria-hidden="true" wire:ignore>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save" method="post" class="mt-3">
                            <form wire:submit.prevent="save" method="post" class="mt-3">
                                <div class="form-group">
                                    <label for="ordinance_number">Ordinance Number:</label>
                                    <input type="text" class="form-control" id="ordinance_number"
                                        wire:model="ordinance_number">
                                    @error('ordinance_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" id="title" wire:model="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="author">Author:</label>
                                    <input type="text" class="form-control" id="title" wire:model="author">
                                    @error('author')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tracking_level">Tracking Level:</label>
                                    <select class="form-control" id="tracking_level" wire:model="tracking_level">
                                        <option value="">-- Select Tracking Level --</option>
                                        <option value="priority">Priority</option>
                                        <option value="of_interest">Of Interest</option>
                                        <option value="graveyard">Graveyard</option>
                                        <option value="passed">Passed</option>
                                    </select>
                                    @error('tracking_level')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="last_action">Last Action:</label>
                                    <input type="text" class="form-control" id="last_action"
                                        wire:model="last_action">
                                    @error('last_action')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" class="form-control" id="date" wire:model="date">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file">File:</label>
                                    <input type="file" class="form-control" id="file" wire:model="file">
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Keywords:</label>
                                    <input type="text" class="form-control" id="last_action" wire:model="keywords">
                                    @error('keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success mt-3 col-12">Submit</button>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ordinanceEdited" tabindex="-1" role="dialog"
        aria-labelledby="ordinanceAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordinanceAddedModalLabel">Ordinance Updated</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    The ordinance has been successfully updated.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        window.livewire.on('ordinanceEdited', () => {
            console.log('ordinanceAdded event received');

            document.getElementById('editordinance').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.getElementsByClassName('modal-backdrop')[0].remove();

            var modalOrdinanceAdded = new bootstrap.Modal(document.getElementById(
                'ordinanceEdited'));
            modalOrdinanceAdded.show();
        });
    });
</script>
