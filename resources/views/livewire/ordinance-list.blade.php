
<div>
    <div class="mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Actions</th>
                    <th>Ordinance Number</th>
                    <th>Title</th>
                    <th>Tracking Level</th>
                    <th>Date of Upload</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordinances as $ordinance)
                    <tr class="text-center">
                        <td><input type="checkbox" name="" id=""></td>
                        <td>{{ $ordinance->ordinance_number }}</td>
                        <td><a href="{{ Storage::url($ordinance->file_path) }}" target="_blank">
                            {{ $ordinance->title }}
                        </a></td>
                        <td class="text-uppercase">{{ $ordinance->tracking_level }}</td>
                        <td>{{ $ordinance->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>