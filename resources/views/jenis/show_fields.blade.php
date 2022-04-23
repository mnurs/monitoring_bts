<!-- Nama Field -->
<div class="col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    <input type="text" name="nama" class="form-control" value="@if(isset($jenis->nama)){{ $jenis->nama }}@endif" disabled>   
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="created_by" class="form-control" value="@if(isset($jenis->created_by)){{ $jenis->created_by }}@endif" disabled>  
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($jenis->edited_by)){{ $jenis->edited_by }}@endif" disabled>   
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($jenis->edited_at)){{ $jenis->edited_at }}@endif" disabled>   
</div>

