@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kuesioner Detail</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('kuesioners.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('kuesioners.show_fields')
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12"> 
                       <h2>Pilihan Jawaban</h2>
                    </div>

                      @foreach($pilihan as $pilih)
                      <div class="col-sm-12"> 
                            <div class="col-sm-6">  
                                <input type="text" name="pilihan_jawaban[]" class="form-control" value="{{$pilih->pilihan_jawaban}}" disabled><br> 
                            </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div> 


    </div>
@endsection
