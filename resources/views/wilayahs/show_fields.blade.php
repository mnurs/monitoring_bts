<div class="row">
    <!-- Nama Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('nama', 'Nama:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $wilayah->nama }}" readonly> 
    </div>

    <!-- Level Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('level', 'Level:') !!}
        <select name="level" class="form-control" disabled>
            <option value="1" @if($wilayah->level == 1) selected @endif>Negara</option>
            <option value="2" @if($wilayah->level == 2) selected @endif>Provinsi</option>
            <option value="3" @if($wilayah->level == 3) selected @endif>Kabupaten/Kota</option>
            <option value="4" @if($wilayah->level == 4) selected @endif>Kecamatan</option>
            <option value="5" @if($wilayah->level == 5) selected @endif>Kelurahan</option>
        </select> 
    </div>

    <!-- Id Parent Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('id_parent', 'Parent:') !!}
        <input type="text" name="nama" class="form-control" value="@if(isset($wilayah->parent->nama)){{ $wilayah->parent->nama }}@endif" readonly>  
    </div>

    <!-- Created By Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('created_by', 'Created By:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $wilayah->created_by }}" readonly>  
    </div>

    <!-- Edited By Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('edited_by', 'Edited By:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $wilayah->edited_by }}" readonly>  
    </div>

    <!-- Edited At Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('edited_at', 'Edited At:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $wilayah->edited_at }}" readonly>  
    </div>

    
</div>
