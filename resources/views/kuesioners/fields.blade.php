<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    {!! Form::textarea('Pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jawaban Field -->
<!-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('jawaban', 'jawaban:') !!}
    {!! Form::textarea('Jawaban', null, ['class' => 'form-control']) !!}
</div> -->

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

<!-- Role Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        <!-- {!! Form::hidden('role', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('role', '1', null, ['class' => 'form-check-input']) !!} -->
        {!! Form::label('role', 'Role', ['class' => 'form-check-label']) !!}
        <select name="role" class="form-control">
            <option value="1" @if(isset($user->role)) @if($user->role == 1) selected @endif @endif>Admin</option>
            <option value="2" @if(isset($user->role)) @if($user->role == 2) selected @endif @endif>Surveyor</option> 
        </select>
    </div>
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