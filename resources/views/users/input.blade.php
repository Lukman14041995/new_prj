@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'user'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Input User') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Email address') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">

                            </div>
                            <div class="form-group">
                                <label>{{ __('Role') }}</label>
                                <select class="form-control" name="role" id="" style="background: black">
                                    <option value="user">User</option>
                                    <option value="manajemen">Manajement</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('user.index')}}" class="btn btn-fill btn-success" style="float: left;">Back</a>
                        <button type="submit" class="btn btn-fill btn-primary" style="float: right;">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>


    </div>
@endsection
