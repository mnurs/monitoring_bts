<!-- Id Kuesioner Field -->
<div class="col-sm-6">
    {!! Form::label('Kuesioner', 'Kuesioner:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($kuesionerPilihan->idKuesioner->pertanyaan)){{ $kuesionerPilihan->idKuesioner->pertanyaan }}@endif" disabled> 
</div>

<!-- Pilihan Jawaban Field -->
<div class="col-sm-6">
    {!! Form::label('pilihan_jawaban', 'Pilihan Jawaban:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset( $kuesionerPilihan->pilihan_jawaban)){{  $kuesionerPilihan->pilihan_jawaban }}@endif" disabled> 
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($kuesionerPilihan->created_by)){{ $kuesionerPilihan->created_by }}@endif" disabled> 
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($kuesionerPilihan->edited_by)){{ $kuesionerPilihan->edited_by }}@endif" disabled> 
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="pertanyaan" class="form-control" value="@if(isset($kuesionerPilihan->edited_at)){{ $kuesionerPilihan->edited_at }}@endif" disabled> 
</div>

