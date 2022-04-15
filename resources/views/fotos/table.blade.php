<div class="table-responsive">
    <table class="table" id="fotos-table">
        <thead>
        <tr>
            <th>Id Bts</th>
        <th>Path Foto</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fotos as $foto)
            <tr>
                <td>{{ $foto->id_bts }}</td>
            <td>{{ $foto->path_foto }}</td>
            <td>{{ $foto->created_by }}</td>
            <td>{{ $foto->edited_by }}</td>
            <td>{{ $foto->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['fotos.destroy', $foto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fotos.show', [$foto->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('fotos.edit', [$foto->id]) }}"
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
