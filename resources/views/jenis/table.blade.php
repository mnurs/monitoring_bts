<div class="table-responsive">
    <table class="table" id="jenis-table">
        <thead>
        <tr>
            <th>Nama</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jenis as $jenis)
            <tr>
                <td>{{ $jenis->nama }}</td>
            <td>{{ $jenis->created_by }}</td>
            <td>{{ $jenis->edited_by }}</td>
            <td>{{ $jenis->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['jenis.destroy', $jenis->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jenis.show', [$jenis->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jenis.edit', [$jenis->id]) }}"
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
