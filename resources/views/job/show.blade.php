@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <span>{{ $data->type.' - '.$data->location }}</span>
                <h3>{{ $data->title }}</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                        {!! $data->description !!}
                        </div>
                        <div class="col-lg-4">

                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>{{ $data->company }}</h4>
                                </div>
                                <div class="panel-body">
                                    <img class="img img-responsive" src="{{ $data->company_logo }}" alt="">
                                    <a href="{{ $data->company_url }}">{{ $data->company_url }}</a>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>How to Apply</h4>
                                </div>
                                <div class="panel-body">
                                    {!! $data->how_to_apply !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
