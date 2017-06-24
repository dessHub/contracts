@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row cont">
        <div class="col-md-12 text-center">

                <div class="welcome">
                    <h3>Welcome To Bamburi Cement Contracts' Portal.</h3>
                    <button class=" btn-warning fa fa-search"><a href="{{url('/addtenders')}}">View Available Contracts</a></button>
                </div>
        </div>
    </div>
</div>
@endsection
