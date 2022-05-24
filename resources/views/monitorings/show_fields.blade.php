
<div class="row">
    <!-- Id Bts Field -->
    <div class="col-sm-6">
        {!! Form::label('id_bts', 'Bts:') !!}
        <input type="text" name="id_bts" class="form-control" value="@if(isset($monitoring->idBts->nama)){{ $monitoring->idBts->nama }}@endif" disabled> 
    </div>

    <!-- Id Kondisi Bts Field -->
    <div class="col-sm-6">
        {!! Form::label('id_kondisi_bts', 'Kondisi Bts:') !!}
        <input type="text" name="id_kondisi_bts" class="form-control" value="@if(isset($monitoring->idKondisiBts->nama)){{ $monitoring->idKondisiBts->nama }}@endif" disabled>  
    </div>

    <!-- Id User Surveyor Field -->
    <div class="col-sm-6">
        {!! Form::label('id_user_surveyor', 'User Surveyor:') !!}
        <input type="text" name="id_user_surveyor" class="form-control" value="@if(isset($monitoring->idUserSurveyor->name)){{ $monitoring->idUserSurveyor->name }}@endif" disabled>  
    </div>

    <!-- Tgl Generate Field -->
    <div class="col-sm-6">
        {!! Form::label('tgl_generate', 'Tgl Generate:') !!}
        <input type="text" name="tgl_generate" class="form-control" value="@if(isset($monitoring->tgl_generate)){{date('Y-m-d', strtotime($monitoring->tgl_generate))}}@endif" disabled>  
    </div>

    <!-- Tgl Kunjungan Field -->
    <div class="col-sm-6">
        {!! Form::label('tgl_kunjungan', 'Tgl Kunjungan:') !!}
        <input type="text" name="tgl_kunjungan" class="form-control" value="@if(isset($monitoring->tgl_kunjungan)){{date('Y-m-d', strtotime($monitoring->tgl_kunjungan))}}@endif" disabled> 
    </div>

    <!-- Tahun Field -->
    <div class="col-sm-6">
        {!! Form::label('tahun', 'Tahun:') !!}
         <input type="text" name="tahun" class="form-control" value="@if(isset($monitoring->tahun)){{ $monitoring->tahun }}@endif" disabled> 
        <p></p>
    </div>

    <!-- Created By Field -->
    <div class="col-sm-6">
        {!! Form::label('created_by', 'Created By:') !!}
         <input type="text" name="created_by" class="form-control" value="@if(isset($monitoring->created_by)){{ $monitoring->created_by }}@endif" disabled>
    </div>

    <!-- Edited By Field -->
    <div class="col-sm-6">
        {!! Form::label('edited_by', 'Edited By:') !!}
         <input type="text" name="edited_by" class="form-control" value="@if(isset($monitoring->edited_by)){{ $monitoring->edited_by }}@endif" disabled> 
    </div>

    <!-- Edited At Field -->
    <div class="col-sm-6">
        {!! Form::label('edited_at', 'Edited At:') !!}
         <input type="text" name="edited_at" class="form-control" value="@if(isset($monitoring->edited_at)){{date('Y-m-d', strtotime($monitoring->edited_at))}} @endif" disabled>  
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-12">
        <hr>
        <br> 
        <h3>Pertanyaan Survey</h3>
    </div>
    <div class="col-sm-12">
        @php 
            $i = 1;
        @endphp
        @foreach($kuesioner as $kuesioner)
            <p>
                {{$i++}}. {{ $kuesioner->pertanyaan }}
            </p> 
            @php 
                $j = 0;
            @endphp
            @foreach($kuesioner->kuesionerPilihans as $jawaban)
                <div class="col-sm-12">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jawaban[{{$kuesioner->id}}]" id="jawaban{{$jawaban->id}}"  @if(isset($helper->getJawaban($monitoring->id,$kuesioner->id)->jawaban)) @if($jawaban->id == $helper->getJawaban($monitoring->id,$kuesioner->id)->jawaban) checked @endif @endif  disabled>
                      <label class="form-check-label" for="jawaban{{$jawaban->id}}">
                        {{ $jawaban->pilihan_jawaban }}
                      </label>
                    </div> 
                </div> 
            @endforeach
            <br>
        @endforeach
    </div>
</div>