<div>
    <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#addordinance"><i class="fa-solid fa-plus" style="color: #e6e6e6;"></i>  ADD ORDINANCE</button>

    <div class="col-8">
        <div class="modal fade" id="addordinance" tabindex="-1" role="dialog" aria-labelledby="addordinanceLabel" aria-hidden="true" wire:ignore>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Ordinance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" raaole="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload File</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Book Scanner</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                        <input type="text" class="form-control" id="last_action" wire:model="last_action">
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
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Upload via book scanner form goes here -->
                         
                                <video id="video" width="100%"  autoplay></video>
                                <div class="text-center">
                                    <button id="openCameraButton" class="btn btn-success mt-3">SCAN</button>
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
    const video = document.getElementById('video');
    const button = document.getElementById('openCameraButton');

    button.onclick = function() {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                })
                .catch(function(err) {
                    console.log("Something went wrong!", err);
                });
        }
    }
</script>
