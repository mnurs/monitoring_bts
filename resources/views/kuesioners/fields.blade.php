<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    {!! Form::text('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Pilihan Jawaban Field-->
<div class="Panel Body  col-sm-12 ">
    <form action="KuesionerController.php" method="POST">
        <div class="control-group after-add-more">
            <label>Pilihan Jawaban</label>
            <input type="text" name="pilihan_jawaban[]" class="form-control">
        
            <br>
            <button class="btn btn-success add-more" type="button">
            <i class="glyphicon glyphicon-plus"></i> Add</button>
            
            <hr>
        </div>
    </form>
        
        <div class="copy invisible">
            <div class="hapus_grup">
            <label>Pilihan Jawaban</label>
            <input type="text" name="pilihan_jawaban[]" class="form-control">
            <br>

            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            <hr>
        </div>
</div>

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

<<script type="text/javascript">

    // saat tombol add ditekan, hapus_grup akan dimunculkan dan dicopy
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik hapus_grup akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".hapus_grup").remove();
      });
    });
</script>
@endpush