@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Closed Contracts</div>
                <div class="panel-body">
                @foreach($tenders as $key)
                <div class="col-md-12">
                <div class="col-md-1">{{$key->id}}</div>
                <div class="col-md-6">{{$key->title}}</div>
                <div class="col-md-4">
                  <button class="btn btn-default"><a href="{{ url('/view'.$key->id)}}">
                        <i class="fa fa-btn fa-refresh"></i> View Details </a>
                    </button>
                </div>
<hr>
              </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
