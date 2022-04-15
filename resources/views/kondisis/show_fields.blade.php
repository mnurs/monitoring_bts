<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $kondisi->nama }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $kondisi->created_by }}</p>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <p>{{ $kondisi->edited_by }}</p>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <p>{{ $kondisi->edited_at }}</p>
</div>

