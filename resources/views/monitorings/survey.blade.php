@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Survey BTS</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($monitoring, ['url' => ['monitoring/survey'], 'method' => 'post']) !!}

            <div class="card-body">
                <div class="row">
                    @include('monitorings.fields')
                    <input type="hidden" name="id_monitoring" value="{{$monitoring->id}}">
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Pertanyaan Survey</h3>
                    </div>
                    <div class="col-sm-12">
                        @php 
                            $i = 1;
                        @endphp
                        @foreach($kuesioner as $kuesioner)
                            <p>
                                {{$i++}}. {{ $kuesioner->pertanyaan }}
                                <input type="hidden" name="kuesioner[{{$kuesioner->id}}]" value="{{$kuesioner->id}}">
                            </p> 
                            @php 
                                $j = 0;
                            @endphp
                            @foreach($kuesioner->kuesionerPilihans as $key => $jawaban )
                                <div class="col-sm-12">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="jawaban[{{$kuesioner->id}}]" id="jawaban{{$jawaban->id}}" value="{{$jawaban->id}}"  @if(isset($helper->getJawaban($monitoring->id,$kuesioner->id)->jawaban)) @if($jawaban->id == $helper->getJawaban($monitoring->id,$kuesioner->id)->jawaban) checked @endif @endif >
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
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('monitorings.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
