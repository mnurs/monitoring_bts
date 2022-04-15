<div class="table-responsive">
    <table class="table" id="kuesionerJawabans-table">
        <thead>
        <tr>
            <th>Id Monitoring</th>
        <th>Id Kuesioner</th>
        <th>Jawaban</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kuesionerJawabans as $kuesionerJawaban)
            <tr>
                <td>{{ $kuesionerJawaban->id_monitoring }}</td>
            <td>{{ $kuesionerJawaban->id_kuesioner }}</td>
            <td>{{ $kuesionerJawaban->jawaban }}</td>
            <td>{{ $kuesionerJawaban->created_by }}</td>
            <td>{{ $kuesionerJawaban->edited_by }}</td>
            <td>{{ $kuesionerJawaban->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['kuesionerJawabans.destroy', $kuesionerJawaban->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kuesionerJawabans.show', [$kuesionerJawaban->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('kuesionerJawabans.edit', [$kuesionerJawaban->id]) }}"
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
