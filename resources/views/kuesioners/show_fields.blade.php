<!-- Jawaban Field -->
<div class="col-sm-12">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    <p>{{ $kuesioner->jawaban }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $kuesioner->created_by }}</p>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <p>{{ $kuesioner->edited_by }}</p>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <p>{{ $kuesioner->edited_at }}</p>
</div>

