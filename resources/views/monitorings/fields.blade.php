<!-- Id Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_bts', 'Bts:') !!}
    <input type="text" name="bts" class="form-control" value="@if(isset($monitoring->idBts->nama)){{$monitoring->idBts->nama}}@endif" @if(isset($flag)) disabled @endif>
    {!! Form::hidden('id_bts', null, ['class' => 'form-control']) !!}
</div>


<!-- Id User Surveyor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_surveyor', 'User Surveyor:') !!}
    <input type="text" name="user_surveyor" class="form-control" value="@if(isset($monitoring->idUserSurveyor->name)){{$monitoring->idUserSurveyor->name}}@endif" @if(isset($flag)) disabled @endif>
    {!! Form::hidden('id_user_surveyor', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Generate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_generate', 'Tgl Generate:') !!} 
    <input type="text" name="tgl_generate" class="form-control" id="tgl_generate" value="@if(isset($monitoring->tgl_generate)){{$monitoring->tgl_generate}}@endif" @if(isset($flag)) disabled @endif>
    <!-- {!! Form::text('tgl_generate', null, ['class' => 'form-control','id'=>'tgl_generate']) !!} -->
</div>


<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    <input type="text" name="tahun" class="form-control" id="tahun" value="@if(isset($monitoring->tahun)){{$monitoring->tahun}}@endif" @if(isset($flag)) disabled @endif> 
</div>


<!-- Id Kondisi Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kondisi_bts', 'Kondisi Bts:') !!}
    <input type="text" name="kondisi" class="form-control" value="@if(isset($monitoring->idKondisiBts->nama)){{$monitoring->idKondisiBts->nama}}@endif" >
    {!! Form::hidden('id_kondisi_bts', null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tgl_generate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tgl Kunjungan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_kunjungan', 'Tgl Kunjungan:') !!}
    {!! Form::text('tgl_kunjungan', null, ['class' => 'form-control','id'=>'tgl_kunjungan']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tgl_kunjungan').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

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
</div> -->

@push('page_scripts')
    <script type="text/javascript">
        $('#edited_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush