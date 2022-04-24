<!-- Jawaban Field -->
<div class="col-sm-12">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    <input type="text" name="nama" class="form-control" value="{{ $kuestioner->jawaban }}" readonly>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <input type="text" name="nama" class="form-control" value="{{ $kuestioner->created_by }}" readonly>
</div>

<!-- Edited By Field -->
<div class="col-sm-12">
    {!! Form::label('edited_by', 'Edited By:') !!}
    <input type="text" name="nama" class="form-control" value="{{ $kuestioner->edited_by }}" readonly>
</div>

<!-- Edited At Field -->
<div class="col-sm-12">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="nama" class="form-control" value="{{ $kuestioner->edited_at }}" readonly>
</div>

