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
     <img src="https://via.placeholder.com/200x200.png" width="200" height="200"> 
</div>
<div class="col-sm-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3498586014!2d106.94055531485441!3d-6.217509995499168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c9c16c45925%3A0xfe61b1a03d0cde66!2sBTS%20TELKOMSEL%20BULAK%20JAYA!5e0!3m2!1sen!2sid!4v1650791236229!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
