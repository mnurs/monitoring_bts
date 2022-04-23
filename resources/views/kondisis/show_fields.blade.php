<!-- Nama Field -->
<div class="col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    <input type="text" name="nama" class="form-control" value="@if(isset($kondisi->nama)){{ $kondisi->nama }}@endif" disabled>  
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="created_by" class="form-control" value="@if(isset($kondisi->created_by)){{ $kondisi->created_by }}@endif" disabled>   
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kondisi->edited_by)){{ $kondisi->edited_by }}@endif" disabled>   
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($kondisi->edited_at)){{ $kondisi->edited_at }}@endif" disabled>   
</div>

