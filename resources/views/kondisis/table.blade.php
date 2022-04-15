<div class="table-responsive">
    <table class="table" id="kondisis-table">
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
        @foreach($kondisis as $kondisi)
            <tr>
                <td>{{ $kondisi->nama }}</td>
            <td>{{ $kondisi->created_by }}</td>
            <td>{{ $kondisi->edited_by }}</td>
            <td>{{ $kondisi->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['kondisis.destroy', $kondisi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kondisis.show', [$kondisi->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('kondisis.edit', [$kondisi->id]) }}"
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
