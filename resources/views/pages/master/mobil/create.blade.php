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
                    <form method="post" action="{{ route('pages.mobil.store') }}" autocomplete="off">
                        <div class="card-body">
                                @csrf

                                <div class="form-group">
                                    <label>{{ __('Nopol') }}</label>
                                    <input type="text" name="nopol" class="form-control" placeholder="Masukan Nopol">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Merk') }}</label>
                                    <input type="text" name="merk" class="form-control" placeholder="Masukan Merk">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Model') }}</label>
                                    <input type="text" name="model" class="form-control" placeholder="Masukan Model">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Tarif') }}</label>
                                    <input type="number" name="tarif" class="form-control" placeholder="Masukan Tarif">
                                </div>
                                



                        </div>
                        <div class="card-footer">
                            <a href="{{route('pages.mobil')}}" class="btn btn-fill btn-success" style="float: left;">Back</a>
                            <button type="submit" class="btn btn-fill btn-primary" style="float: right;">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>


        </div>
    </div>
</div>
@endsection