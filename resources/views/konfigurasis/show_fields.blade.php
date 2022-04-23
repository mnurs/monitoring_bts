<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <input type="text" name="name" class="form-control" value="@if(isset($konfigurasi->name)){{ $konfigurasi->name }}@endif" disabled>  
</div>

<!-- Value Field -->
<div class="col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    <input type="text" name="value" class="form-control" value="@if(isset($konfigurasi->value)){{ $konfigurasi->value }}@endif" disabled>  
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="created_by" class="form-control" value="@if(isset($konfigurasi->created_by)){{ $konfigurasi->created_by }}@endif" disabled>  
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($konfigurasi->edited_by)){{ $konfigurasi->edited_by }}@endif" disabled>  
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($konfigurasi->edited_at)){{ $konfigurasi->edited_at }}@endif" disabled>  
</div>

