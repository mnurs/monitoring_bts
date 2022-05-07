@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Monitoring</h1>
                </div>
                <div class="col-sm-6">
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
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

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

