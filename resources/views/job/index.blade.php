@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ route("job") }}" method="GET" class="form-inline">
                <div class="form-group">
                    <label for="description">Job Description
                        <input type="text" class="form-control" id="description" name="description" value="{{ Input::get('description') }}">
                    </label>
                </div>
                <div class="form-group">
                    <label for="location">Location 
                        <input type="text" class="form-control" id="location" name="location" value="{{ Input::get('location') }}">
                    </label>
                    
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="full_time" value="true"> Full Time Only</label>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Job List</h3>
                </div>

                <div class="panel-body">
                    @if($data->count() > 0)
                    <table>
                        <tbody>
                            @foreach($data as $item)
                            <tr style="border-bottom: 1px solid #000">
                                <td class="title">
                                    <h4><a class='job-list-title' href="{{ route('job.detail', $item->id) }}">{{ $item->title }}</a></h4>
                                    <p class="source">{{ $item->company." - " }}<strong class='fulltime'>{{$item->type}}</strong></p>
                                </td>
                                <td class="meta text-right">
                                    <span class="location">{{ $item->location }}</span>
                                    @php($date = new Carbon($item->created_at))
                                    <br/>
                                    <span class="time">{{ $date->diffForHumans() }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="pagination">
                        <a href="{{ route('job', [
                                'location' => Input::get('location'),
                                'location' => Input::get('location'),
                                'full_time' => Input::get('full_time'),
                                'page' => $page
                            ]) }}" class="btn btn-primary btn-block">More Jobs</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
