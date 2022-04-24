<!-- Id Kuesioner Field -->
<div class="col-sm-12">
    {!! Form::label('Kuesioner', 'Kuesioner:') !!}
    <p>{{ $kuesionerPilihan->id_kuesioner }}</p>
</div>

<!-- Pilihan Jawaban Field -->
<div class="col-sm-12">
    {!! Form::label('pilihan_jawaban', 'Pilihan Jawaban:') !!}
    <p>{{ $kuesionerPilihan->pilihan_jawaban }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $kuesionerPilihan->created_by }}</p>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <p>{{ $kuesionerPilihan->edited_by }}</p>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <p>{{ $kuesionerPilihan->edited_at }}</p>
</div>

