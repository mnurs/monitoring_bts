<div class="table-responsive">
    <table class="table" id="monitorings-table">
        <thead>
        <tr>
            <th>Id Bts</th>
        <th>Id Kondisi Bts</th>
        <th>Id User Surveyor</th>
        <th>Tgl Generate</th>
        <th>Tgl Kunjungan</th>
        <th>Tahun</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($monitorings as $monitoring)
            <tr>
                <td>{{ $monitoring->id_bts }}</td>
            <td>{{ $monitoring->id_kondisi_bts }}</td>
            <td>{{ $monitoring->id_user_surveyor }}</td>
            <td>{{ $monitoring->tgl_generate }}</td>
            <td>{{ $monitoring->tgl_kunjungan }}</td>
            <td>{{ $monitoring->tahun }}</td>
            <td>{{ $monitoring->created_by }}</td>
            <td>{{ $monitoring->edited_by }}</td>
            <td>{{ $monitoring->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['monitorings.destroy', $monitoring->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('monitorings.show', [$monitoring->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('monitorings.edit', [$monitoring->id]) }}"
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
