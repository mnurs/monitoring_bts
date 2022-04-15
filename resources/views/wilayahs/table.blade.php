<div class="table-responsive">
    <table class="table" id="wilayahs-table">
        <thead>
        <tr>
            <th>Nama</th>
        <th>Level</th>
        <th>Id Parent</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($wilayahs as $wilayah)
            <tr>
                <td>{{ $wilayah->nama }}</td>
            <td>{{ $wilayah->level }}</td>
            <td>{{ $wilayah->id_parent }}</td>
            <td>{{ $wilayah->created_by }}</td>
            <td>{{ $wilayah->edited_by }}</td>
            <td>{{ $wilayah->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['wilayahs.destroy', $wilayah->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wilayahs.show', [$wilayah->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('wilayahs.edit', [$wilayah->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
