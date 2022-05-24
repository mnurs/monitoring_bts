<!-- Id Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_bts', 'Bts:') !!} 
    <select class="form-control" name="id_bts"  @if(isset($flag)) disabled @endif>
        @foreach($bts as $nama => $id)
            <option value = "{{ $id }}" @if(isset($monitoring->id_bts)) @if($monitoring->id_bts  == $id ) selected @endif @endif >{{ $nama }}</option>
        @endforeach
    </select> 
</div>


<!-- Id User Surveyor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user_surveyor', 'User Surveyor:') !!}
    <select class="form-control" name="id_user_surveyor"  @if(isset($flag)) disabled @endif>
        @foreach($users as $nama => $id)
            <option value = "{{ $id }}" @if(isset($monitoring->id_user_surveyor)) @if($monitoring->id_user_surveyor  == $id ) selected @endif @endif >{{ $nama }}</option>
        @endforeach
    </select> 
</div>

<!-- Tgl Generate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_generate', 'Tgl Generate:') !!} 
    <input type="text" name="tgl_generate" class="form-control" id="tgl_generate" value="@if(isset($monitoring->tgl_generate)){{$monitoring->tgl_generate}}@endif" @if(isset($flag)) disabled @endif>
    <!-- {!! Form::text('tgl_generate', null, ['class' => 'form-control','id'=>'tgl_generate']) !!} -->
</div>


<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    <input type="text" name="tahun" class="form-control" id="tahun" value="@if(isset($monitoring->tahun)){{$monitoring->tahun}}@endif" @if(isset($flag)) disabled @endif> 
</div>


<!-- Id Kondisi Bts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kondisi_bts', 'Kondisi Bts:') !!}
    <select class="form-control" name="id_kondisi_bts">
        @foreach($kondisi as $nama => $id)
            <option value = "{{ $id }}" @if(isset($monitoring->id_kondisi_bts)) @if($monitoring->id_kondisi_bts == $id ) selected @endif @endif >{{ $nama }}</option>
        @endforeach
    </select> 
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tgl_generate').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tgl Kunjungan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_kunjungan', 'Tgl Kunjungan:') !!}
    {!! Form::text('tgl_kunjungan', null, ['class' => 'form-control','id'=>'tgl_kunjungan']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tgl_kunjungan').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

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
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush