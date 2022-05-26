@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Monitoring</h1>
                </div>
                <div class="col-sm-6">
                  @if(Session::get('role') == 1)
                    <a class="btn btn-primary float-right"
                       href="{{ route('monitorings.create') }}">
                        Add New
                    </a>
                    <a href="#" class="btn btn-primary float-right" onclick="event.preventDefault(); document.getElementById('generate-form').submit();">
                             Generate Survey
                    </a>
                    <form id="generate-form" action="{{ url('monitoring/generate') }}" method="POST" class="d-none">
                        @csrf
                    </form> 
                  @endif
                    
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="card">
          <div class="card-header">
            Pencarian
          </div>
          <div class="card-body">
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form action="{{ url('/monitoring/cari') }}" method="GET">
                        {{ csrf_field() }}
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">BTS</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="id_bts" >
                                <option value = "" >Pilih BTS</option>
                                @foreach($bts as $nama => $id)
                                    <option value = "{{ $id }}" @if(isset($id_bts)) @if($id_bts  == $id ) selected @endif @endif >{{ $nama }}</option>
                                @endforeach
                            </select> 
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kondisi BTS</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="id_kondisi_bts">
                                <option value = "" >Pilih Kondisi BTS</option>
                                @foreach($kondisi as $nama => $id)
                                    <option value = "{{ $id }}" @if(isset($id_kondisi_bts)) @if($id_kondisi_bts == $id ) selected @endif @endif >{{ $nama }}</option>
                                @endforeach
                            </select> 
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Surveyor</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="id_user_surveyor">
                            <option value = "" >Pilih Surveyor</option>
                            @foreach($users as $nama => $id)
                                <option value = "{{ $id }}" @if(isset($id_user_surveyor)) @if($id_user_surveyor  == $id ) selected @endif @endif >{{ $nama }}</option>
                            @endforeach
                        </select> 
                        </div> 
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal Generate</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="generate_mulai" placeholder="Mulai" onfocus="(this.type='date')" value="@if(isset($generate_mulai)) {{$generate_mulai}} @endif">
                        </div>
                         <div class="col-sm-4">
                          <input type="text" class="form-control" name="generate_selesai" placeholder="Sampai" onfocus="(this.type='date')" value="@if(isset($generate_selesai)) {{$generate_selesai}} @endif">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-4 col-form-label">Tanggal Kunjungan</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="kunjungan_mulai" placeholder="Mulai" onfocus="(this.type='date')" value="@if(isset($kunjungan_mulai)) {{$kunjungan_mulai}} @endif">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="Kunjungan_selesai" placeholder="Sampai" onfocus="(this.type='date')" value="@if(isset($Kunjungan_selesai)) {{$Kunjungan_selesai}} @endif">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="tahun" id="tahun" name="tahun" value="@if(isset($tahun)) {{$tahun}} @endif">
                        </div> 
                      </div>
                      <div class="form-group row"> 
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary btn-block">Cari</button>
                        </div> 
                        <div class="col-sm-6">
                          <a class="btn btn-primary btn-block" href="{{ url('/monitorings') }}">Reset</a>
                        </div> 
                      </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-body p-0" style=" overflow: scroll;"> 
                @include('monitorings.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

