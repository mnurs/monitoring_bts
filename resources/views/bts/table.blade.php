<div class="table-responsive">
    <table class="table" id="bts-table">
        <thead>
        <tr>
            <th>Id User Pic</th>
        <th>Id Pemilik</th>
        <th>Id Wilayah</th>
        <th>Id Jenis Bts</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Tinggi Tower</th>
        <th>Panjang Tanah</th>
        <th>Lebar Tanah</th>
        <th>Ada Genset</th>
        <th>Ada Tembok Batas</th>
        <th>Created By</th>
        <th>Edited By</th>
        <th>Edited At</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bts as $bts)
            <tr>
                <td>{{ $bts->id_user_pic }}</td>
            <td>{{ $bts->id_pemilik }}</td>
            <td>{{ $bts->id_wilayah }}</td>
            <td>{{ $bts->id_jenis_bts }}</td>
            <td>{{ $bts->nama }}</td>
            <td>{{ $bts->alamat }}</td>
            <td>{{ $bts->latitude }}</td>
            <td>{{ $bts->longitude }}</td>
            <td>{{ $bts->tinggi_tower }}</td>
            <td>{{ $bts->panjang_tanah }}</td>
            <td>{{ $bts->lebar_tanah }}</td>
            <td>{{ $bts->ada_genset }}</td>
            <td>{{ $bts->ada_tembok_batas }}</td>
            <td>{{ $bts->created_by }}</td>
            <td>{{ $bts->edited_by }}</td>
            <td>{{ $bts->edited_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bts.destroy', $bts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bts.show', [$bts->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bts.edit', [$bts->id]) }}"
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
