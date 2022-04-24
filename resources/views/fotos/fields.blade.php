<!-- Id Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_bts', 'Bts:') !!}
    {!! Form::number('id_bts', null, ['class' => 'form-control']) !!}
</div>

<!-- Path Foto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('path_foto', 'Path Foto:') !!}
    {!! Form::textarea('path_foto', null, ['class' => 'form-control']) !!}
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