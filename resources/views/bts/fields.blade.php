<!-- Id User Pic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_pic', 'User Pic:') !!}
    <!--{!! Form::number('id_user_pic', null, ['class' => 'form-control']) !!}-->
    <select class="form-control" name="id_user_pic"  @if(isset($flag)) disabled @endif>
        @foreach($users as $nama => $id)
            <option value = "{{ $id }}" @if(isset($bts->id_user_pic)) @if($bts->id_user_pic  == $id ) selected @endif @endif >{{ $nama }}</option>
        @endforeach
    </select>
</div>

<!-- Id Pemilik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pemilik', 'Pemilik:') !!}
    <!--{!! Form::number('id_pemilik', null, ['class' => 'form-control']) !!}-->
    <select class="form-control" name="id_pemilik"  @if(isset($flag)) disabled @endif>
        @foreach($pemilik as $nama => $id)
            <option value = "{{ $id }}" @if(isset($bts->id_pemilik)) @if($bts->id_pemilik  == $id ) selected @endif @endif >{{ $nama }}</option>
        @endforeach
    </select>
</div>

<!-- Id Wilayah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_wilayah', 'Wilayah:') !!}
    {!! Form::number('id_wilayah', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Jenis Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_jenis_bts', 'Jenis Bts:') !!}
    <!--{!! Form::number('id_jenis_bts', null, ['class' => 'form-control']) !!}-->
    <select class="form-control" name="id_jenis_bts"  @if(isset($flag)) disabled @endif>
        @foreach($jenis as $nama => $id)
            <option value = "{{ $id }}" @if(isset($bts->id_jenis_bts)) @if($bts->id_jenis_bts  == $id ) selected @endif @endif >{{ $nama }}</option>
        @endforeach
    </select>
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Tinggi Tower Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tinggi_tower', 'Tinggi Tower:') !!}
    {!! Form::number('tinggi_tower', null, ['class' => 'form-control']) !!}
</div>

<!-- Panjang Tanah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('panjang_tanah', 'Panjang Tanah:') !!}
    {!! Form::number('panjang_tanah', null, ['class' => 'form-control']) !!}
</div>

<!-- Lebar Tanah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lebar_tanah', 'Lebar Tanah:') !!}
    {!! Form::number('lebar_tanah', null, ['class' => 'form-control']) !!}
</div>

<!-- Ada Genset Field -->
<div class="form-group col-sm-3">
    <div class="form-check">
        {!! Form::hidden('ada_genset', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('ada_genset', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('ada_genset', 'Ada Genset', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Ada Tembok Batas Field -->
<div class="form-group col-sm-3">
    <div class="form-check">
        {!! Form::hidden('ada_tembok_batas', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('ada_tembok_batas', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('ada_tembok_batas', 'Ada Tembok Batas', ['class' => 'form-check-label']) !!}
    </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    <br>
    <img src="https://via.placeholder.com/200x200.png" width="200" height="200"> 
</div>
<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div> -->

<!-- Edited By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    {!! Form::text('edited_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div> -->

<!-- Edited At Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    {!! Form::text('edited_at', null, ['class' => 'form-control','id'=>'edited_at']) !!}
</div>
 -->
@push('page_scripts')
    <script type="text/javascript">
        $('#edited_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush