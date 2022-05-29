<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    {!! Form::text('pertanyaan', null, ['class' => 'form-control']) !!}
</div> 
<!-- <div class="form-group col-sm-2 ">
    {!! Form::label('pilihanJawaban', 'Pilihan Jawaban:') !!} 
</div> -->
<!-- <div class="form-group col-sm-10"> 
     <p><a href="javascript:action();">Tambah</a></p>

</div> -->
 <!-- <div class="form-group col-sm-12 "><input name="pilihanJawaban[]" class="form-control" type="text" /></div>
 <div id="input0" class="form-group col-sm-12"></div>  -->

<!-- Jawaban Field -->
<!-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('jawaban', 'jawaban:') !!}
    {!! Form::textarea('Jawaban', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    $input['created_by'] = $nameUser;
</div> -->

<!-- Edited By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    $input['edited_by'] = $nameUser;
</div> -->

<!-- Edited At Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    {!! Form::text('edited_at', null, ['class' => 'form-control','id'=>'edited_at']) !!}
</div>
 -->
@push('page_scripts')
    <script type="text/javascript">
        $('#edited_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        }) 
    </script>
@endpush