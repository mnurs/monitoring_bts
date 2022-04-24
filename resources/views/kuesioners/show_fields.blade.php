<!-- pertanyaan Field -->
<div class="col-sm-6">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($kuesioner->pertanyaan)){{ $kuesioner->pertanyaan }}@endif" disabled>
</div>

<!-- Jawaban Field -->
<!-- <div class="col-sm-12">
    {!! Form::label('jawaban', 'jawaban:') !!}
    <input type="text" name="jawaban" class="form-control" value="{{ $kuesioner->jawaban }}" readonly> 
</div>
 -->
<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="created_by" class="form-control" value="@if(isset($kuesioner->created_by)){{ $kuesioner->created_by }}@endif" disabled>
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesioner->edited_by)){{ $kuesioner->edited_by }}@endif" disabled>
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($kuesioner->edited_at)){{ $kuesioner->edited_at }}@endif" disabled>
</div>

