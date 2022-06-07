<div class="row">
<!-- Id User Pic Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('id_user_pic', 'User Pic:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->idUserPic->name }}" readonly> 
    </div>

<!-- Id Pemilik Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('id_pemilik', 'Pemilik:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->idPemilik->nama }}" readonly> 
    </div>

<!-- Id Wilayah Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('id_wilayah', 'Wilayah:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->idWilayah->nama }}" readonly> 
    </div>

<!-- Id Jenis Bts Field --> 
<div class="form-group  col-sm-6">
        {!! Form::label('id_jenis_bts', 'Jenis Bts:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->idJenisBts->nama }}" readonly> 
    </div>

<!-- Nama Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('nama', 'Nama:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->nama }}" readonly> 
    </div>

<!-- Alamat Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('alamat', 'Alamat:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->alamat }}" readonly> 
    </div>

<!-- Latitude Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('latitude', 'Latitude:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->latitude }}" readonly> 
    </div>

<!-- Longitude Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('longitude', 'Longitude:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->longitude }}" readonly> 
    </div>

<!-- Tinggi Tower Field -->
<div class="form-group  col-sm-6">
        {!! Form::label('tinggi_tower', 'Tinggi Tower:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->tinggi_tower }}" readonly> 
    </div>

<!-- Panjang Tanah Field -->
<div class="form-group  col-sm-6">
{!! Form::label('panjang_tanah', 'Panjang Tanah:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->panjang_tanah }}" readonly> 
    </div>

<!-- Lebar Tanah Field -->
<div class="form-group  col-sm-6">
{!! Form::label('lebar_tanah', 'Lebar Tanah:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->lebar_tanah }}" readonly> 
    </div>

<!-- Ada Genset Field -->
<div class="form-group  col-sm-3">
{!! Form::label('ada_genset', 'Ada Genset:') !!}
        <input type="checkbox" name="nama" class="form-control" value="{{ $bts->ada_genset }}" disabled> 
    </div>

<!-- Ada Tembok Batas Field -->
<div class="form-group  col-sm-3">
{!! Form::label('ada_tembok_batas', 'Ada Tembok Batas:') !!}
        <input type="checkbox" name="nama" class="form-control" value="{{ $bts->ada_tembok_batas }}" disabled> 
    </div>

<!-- Created By Field -->
<div class="form-group  col-sm-6">
{!! Form::label('created_by', 'Created By:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->created_by }}" readonly> 
    </div>

<!-- Edited By Field -->
<div class="form-group  col-sm-6">
{!! Form::label('edited_by', 'Edited By:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->edited_by }}" readonly> 
    </div>

<!-- Edited At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
        <input type="text" name="nama" class="form-control" value="{{ $bts->edited_at }}" readonly>  
</div>
<div class="form-group col-sm-6"> 
</div>
<div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Foto') !!}
    <br>
     <img src="@if(isset($foto->path_foto)){{ URL::to('/img/' . $foto->path_foto) }}@endif " alt=" @if(isset($foto->path_foto)){{ $foto->idBts->nama }}@endif" width="200" height="200"> 
</div>

<!-- Map -->
<iframe 
  width="100%" 
  height="450" 
  frameborder="0" 
  scrolling="no" 
  marginheight="0" 
  marginwidth="0" 
  src="https://maps.google.com/maps?q={{ $bts->latitude}},{{ $bts->longitude }}&hl=es&z=14&amp;output=embed"
 >
 </iframe>
 