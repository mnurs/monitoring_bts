<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $jenis->nama }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $jenis->created_by }}</p>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <p>{{ $jenis->edited_by }}</p>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <p>{{ $jenis->edited_at }}</p>
</div>

