<div>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="ordinance_number">Ordinance Number:</label>
            <input type="text" class="form-control" id="ordinance_number" wire:model="ordinance_number">
            @error('ordinance_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="title" wire:model="author">
            @error('author') <span class="text-danger">{{ $message }}</span> @enderror
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
            @error('tracking_level') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="last_action">Last Action:</label>
            <input type="text" class="form-control" id="last_action" wire:model="last_action">
            @error('last_action') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" wire:model="date">
            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" class="form-control" id="file" wire:model="file">
            @error('file') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="keywords">Keywords:</label>
            <input type="text" class="form-control" id="last_action" wire:model="keywords">
            @error('keywords') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Add the rest of your form fields here in a similar manner -->

        <button type="submit" class="btn btn-primary mt-3 col-12z">Submit</button>
    </form>
</div>