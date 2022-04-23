<!-- Id Monitoring Field -->
<div class="col-sm-6">
    {!! Form::label('id_monitoring', 'User Monitoring:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesionerJawaban->idMonitoring->idUserSurveyor->name)){{ $kuesionerJawaban->idMonitoring->idUserSurveyor->name }}@endif" disabled>  
</div>

<!-- Id Kuesioner Field -->
<div class="col-sm-6">
    {!! Form::label('id_kuesioner', 'Kuesioner:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesionerJawaban->idKuesioner->pertanyaan)){{ $kuesionerJawaban->idKuesioner->pertanyaan }}@endif" disabled>   
</div>

<!-- Jawaban Field -->
<div class="col-sm-6">
    {!! Form::label('jawaban', 'Jawaban:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesionerJawaban->jawabanSoal->pilihan_jawaban)){{ $kuesionerJawaban->jawabanSoal->pilihan_jawaban }}@endif" disabled>    
</div>

<!-- Created By Field -->
<div class="col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesionerJawaban->created_by)){{ $kuesionerJawaban->created_by }}@endif" disabled>    
</div>

<!-- Edited By Field -->
<div class="col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesionerJawaban->edited_by)){{ $kuesionerJawaban->edited_by }}@endif" disabled>  
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_by" class="form-control" value="@if(isset($kuesionerJawaban->edited_at)){{ $kuesionerJawaban->edited_at }}@endif" disabled>  
</div>

