@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::guest())

  @else
  @if(Auth::user()->role === 'admin')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Post Contract</div>

                <div class="panel-body">

                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/addTender') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}

                              <div class="col-md-12">
                                <div><h3>Contract Details</h3></div><hr>

                                <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                      <label for="title" class="col-md-12 control-label">Contract Title</label>

                                      <div class="col-md-12">
                                          <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                          @if ($errors->has('title'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('title') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
                                </div>

                       <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-12 control-label">Select Dateline</label>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="date" id="datepicker">

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                           <div class="col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-12 control-label">Tender Descriptions:</label>

                                <div class="col-md-12">
                                     <textarea id="description" class="form-control ckeditor" name="description"></textarea>

                                     @if ($errors->has('description'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('description') }}</strong>
                                         </span>
                                     @endif
                                </div>
                            </div>
                          </div>

                          </div>
                          <div class="col-md-3">

                          <div class="col-md-12">
                           <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                               <label for="file" class="col-md-12 control-label">Upload File:</label>

                               <div class="col-md-12" style="padding-top:20px;">
                                    <input class="form-control" type="file" name="file" required="true">

                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                               </div>
                           </div>
                          </div>

                          </div>

                        <div class="col-md-3" style="padding-top:30px;">
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-plus"></i> Submit
                                  </button>
                              </div>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    <div class="col-md-8">
    <div><h2>Open Contracts</h2></div><hr>
    @if($count > 0)
    @foreach($tenders as $key)
    <div class="col-md-12" style="background:white;margin-top:20px;border-style: ridge;">
      <div class="col-md-6"><h4><b>{{ $key->id }}. {{ $key->title }}</b></h4></div>
      <div class="col-md-4 " ><h5>Posted On: <em>{{ $key->created_at }}</em></h5></div>
      <div class="col-md-2" style="padding-top:3px; ">
        @if(Auth::guest())

        <div class="" style="float:right; padding-top: 5px;">
          <a href="{{ url('/bid'.$key->id)}}"><i class="fa fa-btn fa-plus"></i> Apply </a>
        </div>
        @else
        @if(Auth::user()->role === 'admin')
        <div class="" style="float:right; padding-top: 5px;">
          <a href="{{ url('/del'.$key->id)}}"><i class="fa fa-btn fa-remove"></i> Remove</a>
        </div>

        @else
        <div class="" style="float:right; padding-top: 5px;">
          <a href="{{ url('/bid'.$key->id)}}"><i class="fa fa-btn fa-plus"></i> Apply</a>
        </div>
        @endif
        @endif
      </div>
    </div>
    <div class="col-md-12 " style="padding-left:30px; padding-top:20px;">
      <div>
      <p>{{ $key->description }}</p>

      <a href="{{ URL::to( '..' . $key->file)  }}" target="_blank" style="margin-left:100px; margin-top:20px;"><i class="fa fa-download"></i>Download</a>

    </div>
  </div>
    <div class="col-md-12" style="border-bottom: groove;">
      <div class="col-md-7"></div>
      <div class="col-md-4">Dateline: {{ $key->dateline }}</div>
    </div><hr><b>
    @endforeach

    @else
    <div class="jumbotron">There are no open contracts currently.</div>
    @endif
    </div>
    <div class="col-md-4" style="margin-top:70px; border-left:ridge;">
      <h3>Archives</h3><hr>
      @foreach($closed as $key)
      <div class="col-md-12" style="border-style:outset;">
        <div class="col-md-12" style="background-color:silver; width:100%;padding-right:1px;"><h5>{{ $key->title}}</h5></div><hr>
        <div style="margin-bottom:5px;">Awarded To: {{ $key->c_name}}</div>
        <p>{{ $key->description}}</p>
      </div>
      @endforeach
    </div>

</div>


@endsection
