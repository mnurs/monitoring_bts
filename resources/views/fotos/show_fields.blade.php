<!-- Id Bts Field -->
<div class="col-sm-6">
    {!! Form::label('id_bts', 'Bts:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($foto->idBts->nama)){{ $foto->idBts->nama }}@endif" disabled> 
</div>

<!-- Path Foto Field -->
<div class="col-sm-6">
    {!! Form::label('path_foto', 'Path Foto:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($foto->path_foto)){{ $foto->path_foto }}@endif" disabled> 
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="created_by" class="form-control" value="@if(isset($foto->created_by)){{ $foto->created_by }}@endif" disabled> 
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($foto->edited_by)){{ $foto->edited_by }}@endif" disabled> 
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($foto->edited_at)){{ $foto->edited_at }}@endif" disabled> 
</div>

