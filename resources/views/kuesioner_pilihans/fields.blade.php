<!-- Id Kuesioner Field -->
<div class="form-group col-sm-6">
{!! Form::label('id_kuesioner', 'Kuesioner:') !!}
    <input type="text" name="Kuesioner" class="form-control" value="@if(isset($kuesioner_pilihan->kuesioner)){{ $kuesioner_pilihan->kuesioner }}@endif">
</div>

<!-- Pilihan Jawaban Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pilihan_jawaban', 'Pilihan Jawaban:') !!}
    {!! Form::textarea('pilihan_jawaban', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="Created_by" class="form-control" value="@if(isset($kuesioner_pilihan->created_by)){{ $kuesioner_pilihan->created_by }}@endif" disabled>
</div> -->

<!-- Edited By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesioner_pilihan->edited_by)){{ $kuesioner_pilihan->edited_by }}@endif" disabled>
</div> -->

<!-- Edited At Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($kuesioner_pilihan->edited_at)){{ $kuesioner_pilihan->edited_at }}@endif" disabled>
</div> -->

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