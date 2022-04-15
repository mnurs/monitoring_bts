<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $wilayah->nama }}</p>
</div>

<!-- Level Field -->
<div class="col-sm-12">
    {!! Form::label('level', 'Level:') !!}
    <p>{{ $wilayah->level }}</p>
</div>

<!-- Id Parent Field -->
<div class="col-sm-12">
    {!! Form::label('id_parent', 'Id Parent:') !!}
    <p>{{ $wilayah->id_parent }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $wilayah->created_by }}</p>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <p>{{ $wilayah->edited_by }}</p>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <p>{{ $wilayah->edited_at }}</p>
</div>

