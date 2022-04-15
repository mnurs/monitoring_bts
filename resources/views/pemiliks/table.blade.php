<div class="table-responsive">
    <table class="table" id="pemiliks-table">
        <thead>
        <tr>
            <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pemiliks as $pemilik)
            <tr>
                <td>{{ $pemilik->nama }}</td>
            <td>{{ $pemilik->alamat }}</td>
            <td>{{ $pemilik->telepon }}</td>
            <td>{{ $pemilik->created_by }}</td>
            <td>{{ $pemilik->edited_by }}</td>
            <td>{{ $pemilik->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pemiliks.destroy', $pemilik->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pemiliks.show', [$pemilik->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pemiliks.edit', [$pemilik->id]) }}"
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
