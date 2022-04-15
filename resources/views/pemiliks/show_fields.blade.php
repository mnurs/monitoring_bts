<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $pemilik->nama }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $pemilik->alamat }}</p>
</div>

<!-- Telepon Field -->
<div class="col-sm-12">
    {!! Form::label('telepon', 'Telepon:') !!}
    <p>{{ $pemilik->telepon }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $pemilik->created_by }}</p>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <p>{{ $pemilik->edited_by }}</p>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <p>{{ $pemilik->edited_at }}</p>
</div>

