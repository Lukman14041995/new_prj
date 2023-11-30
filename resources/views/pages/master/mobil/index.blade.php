@extends('layouts.app', ['activePage' => 'mobil', 'titlePage' => __('Mobil')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Data Mobil</h4>
                        <p class="card-category"> dan Ketersediaannya</p>
                    </div>
                    <div class="card-body">
                        <a href="{{route('pages.mobil.create')}}" class="btn btn-outline-success btn-outline-oke pull-right btn-sm"
                        style="margin-right: 1%">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        NOPOL
                                    </th>
                                    <th>
                                        Merk
                                    </th>
                                    <th>
                                        Model
                                    </th>
                                    <th>
                                        Tarif Perhari
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($view_mobil as $item)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$item->nopol}}
                                        </td>
                                        <td>
                                            {{$item->merk}}
                                        </td>
                                        <td>
                                            {{$item->model}}
                                        </td>
                                        <td>
                                           Rp {{number_format($item->tarif)}} /day
                                        </td>
                                        <td class="text-primary">
                                            {{$item->status}}
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
    </div>
</div>
@endsection