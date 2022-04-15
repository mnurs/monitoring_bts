<!-- Id Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_bts', 'Id Bts:') !!}
    {!! Form::number('id_bts', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Kondisi Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kondisi_bts', 'Id Kondisi Bts:') !!}
    {!! Form::number('id_kondisi_bts', null, ['class' => 'form-control']) !!}
</div>

<!-- Id User Surveyor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_surveyor', 'Id User Surveyor:') !!}
    {!! Form::number('id_user_surveyor', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Generate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_generate', 'Tgl Generate:') !!}
    {!! Form::text('tgl_generate', null, ['class' => 'form-control','id'=>'tgl_generate']) !!}
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

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::number('tahun', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Edited By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    {!! Form::text('edited_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Edited At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    {!! Form::text('edited_at', null, ['class' => 'form-control','id'=>'edited_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#edited_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush