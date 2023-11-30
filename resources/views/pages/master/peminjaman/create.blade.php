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
                    <form method="post" action="{{ route('pages.transaksi') }}" autocomplete="off">
                        <div class="card-body">
                                @csrf

                                <div class="form-group">
                                    <label>{{ __('Tanggal Pinjam') }}</label>
                                    <div class="row">
                                        <div class="col">
                                            <label>{{ __('Dari Tanggal') }}</label>
                                            <input type="date" name="tanggal_pinjam" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label>{{ __('Hingga Tanggal') }}</label>
                                            <input type="date" name="tanggal_kembali" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>{{ __('Pilih Mobil') }}</label>
                                    <select name="mobil_id" class="form-control">
                                        <option value="" selected disabled>{{ __('Pilih mobil') }}</option>
                                        @foreach ($mobil as $item)
                                            <option value="{{ $item->id }}">{{ $item->merk }}-{{ $item->model }}-{{ $item->nopol }}</option>
                                        @endforeach
                                    </select>
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