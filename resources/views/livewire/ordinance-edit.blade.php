<div>
    <div class="col-8">
        <div class="modal fade" id="editordinance" tabindex="-1" role="dialog" aria-labelledby="addordinanceLabel"
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
                        <ul class="nav nav-tabs" id="editTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="edit-upload-tab" data-toggle="tab" href="#edit-upload"
                                    role="tab" aria-controls="edit-upload" aria-selected="true">Upload File</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="edit-scanner-tab" data-toggle="tab" href="#edit-scanner"
                                    role="tab" aria-controls="edit-scanner" aria-selected="false">Book Scanner</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="editTabContent">
                            <div class="tab-pane fade show active" id="edit-upload" role="tabpanel"
                                aria-labelledby="edit-upload-tab">
                                <form wire:submit.prevent="save" method="post">
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
                                        <input type="text" class="form-control" id="last_action"
                                            wire:model="keywords">
                                        @error('keywords')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success mt-3 col-12">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="edit-scanner" role="tabpanel"
                                aria-labelledby="edit-scanner-tab">
                                <video id="video2" width="100%" autoplay></video>
                                <div class="text-center">
                                    <button id="openCameraButton2" class="btn btn-success mt-3">SCAN</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const video2 = document.getElementById('video2');
    const button2 = document.getElementById('openCameraButton2');

    button2.onclick = function() {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    video2.srcObject = stream;
                })
                .catch(function(err) {
                    console.log("Something went wrong!", err);
                });
        }
    }
</script>
