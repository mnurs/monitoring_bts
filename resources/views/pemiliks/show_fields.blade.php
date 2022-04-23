<!-- Nama Field -->
<div class="col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
        <input type="text" name="nama" class="form-control" value="@if(isset($pemilik->nama )){{ $pemilik->nama  }}@endif" disabled>  
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <textarea class="form-control" rows="5" disabled>{{ $pemilik->alamat }}</textarea> 
</div>

<!-- Telepon Field -->
<div class="col-sm-6">
    {!! Form::label('telepon', 'Telepon:') !!}
        <input type="text" name="telepon" class="form-control" value="@if(isset($pemilik->telepon )){{ $pemilik->telepon  }}@endif" disabled>  
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
        <input type="text" name="created_by" class="form-control" value="@if(isset($pemilik->created_by )){{ $pemilik->created_by  }}@endif" disabled>  
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
        <input type="text" name="edited_by" class="form-control" value="@if(isset($pemilik->edited_by )){{ $pemilik->edited_by  }}@endif" disabled>  
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
        <input type="text" name="edited_at" class="form-control" value="@if(isset($pemilik->edited_at )){{ $pemilik->edited_at  }}@endif" disabled>  
</div>

