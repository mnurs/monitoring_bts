<div class="table-responsive">
    <table class="table" id="kuesioners-table">
        <thead>
        <tr>
            <th>Jawaban</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kuesioners as $kuesioner)
            <tr>
                <td>{{ $kuesioner->jawaban }}</td>
            <td>{{ $kuesioner->created_by }}</td>
            <td>{{ $kuesioner->edited_by }}</td>
            <td>{{ $kuesioner->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['kuesioners.destroy', $kuesioner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kuesioners.show', [$kuesioner->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('kuesioners.edit', [$kuesioner->id]) }}"
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
