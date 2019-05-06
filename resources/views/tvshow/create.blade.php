@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Your Favourite Tv Show') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tvshows.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="season" class="col-md-4 col-form-label text-md-right">{{ __('Season') }}</label>

                                <div class="col-md-6">
                                    <input id="season" type="text" class="form-control @error('season') is-invalid @enderror" name="season" value="{{ old('season') }}" required autocomplete="season" autofocus>

                                    @error('season')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="episode" class="col-md-4 col-form-label text-md-right">{{ __('Episode') }}</label>

                                <div class="col-md-6">
                                    <input id="episode" class="form-control @error('episode') is-invalid @enderror" name="episode" value="{{ old('episode') }}" required autocomplete="episode">

                                    @error('episode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quote" class="col-md-4 col-form-label text-md-right">{{ __('Quote') }}</label>

                                <div class="col-md-6">
                                    <textarea id="quote" class="form-control @error('quote') is-invalid @enderror" name="quote"></textarea>

                                    @error('quote')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
