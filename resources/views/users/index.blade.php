@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'users'])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Soal 1</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                  <thead class="">
                    <th>
                      ID
                    </th>
                    <th>
                      Tanggal Transaksi
                    </th>
                    <th>
                      Nama Pelanggan
                    </th>

                  </thead>
                  <tbody>

                  @foreach ($data as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->tanggal_terakhir}}</td>
                        <td>{{$user->nama_pelanggan}}</td>

                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Soal 2 & 5</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                  <thead class="">
                    <th>
                      ID
                    </th>
                    <th>
                      Nama Pelanggan
                    </th>
                    <th>
                      Jumlah Transaksi
                    </th>
                    <th>
                      Total Transaksi
                    </th>

                  </thead>
                  <tbody>

                  @foreach ($data2 as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->nama_pelanggan}}</td>
                        <td>{{number_format($user->total_jumlah, 0, ',', '.') }}</td>
                        <td>{{ 'Rp ' . number_format($user->total_harga, 0, ',', '.') }}</td>


                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-body">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> Soal 3</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
              </div>
              <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                  <thead class="">
                    <th>#</th>
                    <th>
                      Nama Produk
                    </th>
                    <th>
                      Jumlah Penjualan
                    </th>

                  </thead>
                  <tbody>

                    @foreach($data3 as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ number_format($item->total_jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-body">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> Soal 4</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
              </div>
              <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                  <thead class="">
                    <th>#</th>
                    <th>
                      Nama Pelanggan
                    </th>
                    <th>
                      Nama Produk
                    </th>
                    <th>
                      Jumlah Penjualan
                    </th>

                  </thead>
                  <tbody>

                    @foreach($data4 as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ number_format($item->total_jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-body">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> Soal 6</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
              </div>
              <div class="table-responsive">
                <table id="myTable" class="table table-hover">
                  <thead class="">
                    <th>#</th>
                    <th>
                      Negara
                    </th>
                    <th>
                      Jumlah Penjualan
                    </th>

                  </thead>
                  <tbody>

                    @foreach($data5 as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                        <td>{{ $item->negara }}</td>
                        <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
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

