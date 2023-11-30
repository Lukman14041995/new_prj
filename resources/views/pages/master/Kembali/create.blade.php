@extends('layouts.app', ['activePage' => 'mobil', 'titlePage' => __('Mobil')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('Input User') }}</h5>
                    </div>
                    <form method="post" action="{{ route('pages.transaksikembali') }}" autocomplete="off">
                        <div class="card-body">
                                @csrf

                                <div class="form-group">
                                    <label>{{ __('Tanggal Pinjam') }}</label>
                                    <div class="row">
                                        <div class="col">
                                            <label>{{ __('Masukan Nopol') }}</label>
                                            <input type="text" name="nopol" class="form-control">
                                        </div>

                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('pages.kembalian')}}" class="btn btn-fill btn-success" style="float: left;">Back</a>
                            <button type="submit" class="btn btn-fill btn-primary" style="float: right;">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>


        </div>
    </div>
</div>
@endsection