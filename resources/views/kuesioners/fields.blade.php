<!-- Jawaban Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('jawaban', 'Jawaban:') !!}
    {!! Form::textarea('jawaban', null, ['class' => 'form-control']) !!}
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