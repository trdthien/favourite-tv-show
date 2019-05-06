@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            <div class="card">
                <div class="card-header">Actions</div>
                <div class="card-body">
                    <a href="{{route('tvshows.create')}}">Add a favourite tv show</a>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">Your TV Show</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-borderless table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Season') }}</th>
                                <th scope="col">{{ __('Episode') }}</th>
                                <th scope="col" width="70%">{{ __('Quote') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tvShows as $show)
                                <tr>
                                    <th scope="row">{{$show->id}}</th>
                                    <td>{{$show->season}}</td>
                                    <td>{{$show->episode}}</td>
                                    <td>{{$show->quote}}</td>
                                    <td colspan="1">
                                        <a class="btn btn-small btn-info" href="{{route('tvshows.edit', ['id' => $show->id])}}">Edit</a>
                                        {{ Form::open(array('url' => route('tvshows.destroy', ['id' => $show->id]), 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
