@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Your Favourite Tv Show') }}</div>

                    <div class="card-body">
                        {{ Form::model($tvShow, array('route' => array('tvshows.update', $tvShow->id), 'method' => 'PUT')) }}

                        <div class="form-group row">
                            {{ Form::label('season', 'Season', array('class' => 'col-md-4 col-form-label text-md-right')) }}
                            <div class="col-md-6">
                                {{ Form::text('season', null, array('class' => 'form-control')) }}
                                @if ($errors)
                                <span class="" role="alert">
                                    <strong>{{$errors->first('season')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('episode', 'Episode', array('class' => 'col-md-4 col-form-label text-md-right')) }}
                            <div class="col-md-6">
                            {{ Form::text('episode', null, array('class' => 'form-control')) }}
                                @if ($errors)
                                    <span class="" role="alert">
                                    <strong>{{$errors->first('episode')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('quote', 'Quote', array('class' => 'col-md-4 col-form-label text-md-right')) }}
                            <div class="col-md-6">
                            {{ Form::textarea('quote') }}
                                @if ($errors)
                                    <span class="" role="alert">
                                    <strong>{{$errors->first('quote')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            {{ Form::submit(__('Save'), array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
