<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        <!-- {!! Form::hidden('level', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('level', '1', null, ['class' => 'form-check-input']) !!} -->
        {!! Form::label('level', 'Level', ['class' => 'form-check-label']) !!}
        <select name="level" class="form-control">
            <option value="1">Negara</option>
            <option value="2">Provinsi</option>
            <option value="3">Kabupaten/Kota</option>
            <option value="4">Kecamatan</option>
            <option value="5">Kelurahan</option>
        </select>
    </div>
</div>


<!-- Id Parent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_parent', 'Parent:') !!}
    {!! Form::number('id_parent', null, ['class' => 'form-control']) !!}
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