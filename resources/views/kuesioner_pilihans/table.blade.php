<div class="table-responsive">
    <table class="table" id="kuesionerPilihans-table">
        <thead>
        <tr>
            <th>Id Kuesioner</th>
        <th>Pilihan Jawaban</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kuesionerPilihans as $kuesionerPilihan)
            <tr>
                <td>{{ $kuesionerPilihan->id_kuesioner }}</td>
            <td>{{ $kuesionerPilihan->pilihan_jawaban }}</td>
            <td>{{ $kuesionerPilihan->created_by }}</td>
            <td>{{ $kuesionerPilihan->edited_by }}</td>
            <td>{{ $kuesionerPilihan->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['kuesionerPilihans.destroy', $kuesionerPilihan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kuesionerPilihans.show', [$kuesionerPilihan->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('kuesionerPilihans.edit', [$kuesionerPilihan->id]) }}"
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
