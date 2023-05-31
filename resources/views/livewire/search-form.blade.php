
<div>
<div class="form-group">
    <input type="text" class="form-control" placeholder="Search" wire:model.debounce.100ms="searchTerm">
</div>
<hr class="hr"/>
<div class="mt-3">
        <div class="form-group">
            <label for="date">From:</label>
            <input type="date" class="form-control" id="dateFrom" wire:model="dateFrom">
            @error('date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group ">
            <label for="date">To:</label>
            <input type="date" class="form-control" id="dateTo" wire:model="dateTo">
            @error('date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3 col-12" wire:click='searchDates'>Submit</button>
</div>
</div>