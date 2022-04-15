<div class="table-responsive">
    <table class="table" id="konfigurasis-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Value</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($konfigurasis as $konfigurasi)
            <tr>
                <td>{{ $konfigurasi->name }}</td>
            <td>{{ $konfigurasi->value }}</td>
            <td>{{ $konfigurasi->created_by }}</td>
            <td>{{ $konfigurasi->edited_by }}</td>
            <td>{{ $konfigurasi->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['konfigurasis.destroy', $konfigurasi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('konfigurasis.show', [$konfigurasi->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('konfigurasis.edit', [$konfigurasi->id]) }}"
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
