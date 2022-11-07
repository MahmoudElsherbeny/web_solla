<table id="section2Table" class="table table-striped">
    <thead>
        <tr>
            <th class="text-center w-5">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">BirthDate</th>
            <th class="text-center">Created At</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($section_2_data as $section)
            <tr id="section2_row{{ $section->id }}">
                <td class="text-center w-5">{{ $loop->iteration }}</td>
                <td class="sec2_cell_update text-center" contenteditable data-name="name" data-id="{{ $section->id }}">{{ $section->name }}</td>
                <td class="sec2_cell_update text-center" contenteditable data-name="birthdate" data-id="{{ $section->id }}">{{ $section->birthdate }}</td>
                <td class="sec2_cell_update text-center" contenteditable data-name="created_at" data-id="{{ $section->id }}">{{ $section->created_at->format('Y-m-d g:i a') }}</td>
                <td class="text-center">
                    <button class="btn btn-danger deleteFrom_section2" data_id="{{ $section->id }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>