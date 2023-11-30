<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $data = DB::table('penjualan')
    ->leftJoin('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
    ->select('pelanggan_id', DB::raw('MAX(tanggal) as tanggal_terakhir'),'pelanggan.nama_pelanggan')
    ->groupBy('pelanggan_id','pelanggan.nama_pelanggan')
    ->get();

    $data2 = DB::table('penjualan')
    ->leftJoin('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
    ->leftJoin('produk', 'penjualan.produk_id', '=', 'produk.id')
    ->select('pelanggan_id', 'pelanggan.nama_pelanggan',
             DB::raw('COUNT(*) as total_jumlah'),
             DB::raw('SUM(produk.harga * penjualan.jumlah) as total_harga'))
    ->groupBy('pelanggan_id', 'pelanggan.nama_pelanggan')
    ->get();



    $data3 = DB::table('penjualan')
    ->leftJoin('produk', 'penjualan.produk_id', '=', 'produk.id')
    ->select('produk.nama_produk',
             DB::raw('SUM(penjualan.jumlah) as total_jumlah'))
    ->groupBy('produk.nama_produk')
    ->get();


    $data4 = DB::table('penjualan')
    ->where('produk_id', '=', "1")
    ->leftJoin('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
    ->leftJoin('produk', 'penjualan.produk_id', '=', 'produk.id')
    ->select('produk.nama_produk', 'pelanggan.nama_pelanggan',
             DB::raw('SUM(penjualan.jumlah) as total_jumlah'))
    ->groupBy('pelanggan.nama_pelanggan', 'produk.nama_produk')
    ->get();

    $data5 = DB::table('penjualan')
    ->leftJoin('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
    ->leftJoin('produk', 'penjualan.produk_id', '=', 'produk.id')
    ->select('pelanggan.negara',
    DB::raw('SUM(produk.harga * penjualan.jumlah) as total_harga'))
    ->where('tanggal', '>=', Carbon::now()->subDays(10))
    ->groupBy('pelanggan.negara')
    ->get();





                    // dd($data);
        return view('users.index', ['users' => $model->paginate(15),'data' => $data,'data2' => $data2,'data3' => $data3,'data4' => $data4,'data5'=>$data5]);
    }
    public function create(User $model)
    {
        $data = User::all();
        return view('users.input');
    }
    public function Input(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        return view('users.input');
    }

    public function data_pelanggan(User $model)
    {
        $data = DB::table('penjualan')
                    ->leftJoin('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
                    ->leftJoin('produk', 'penjualan.produk_id', '=', 'produk.id')
                    ->select('pelanggan.nama_pelanggan', 'penjualan.tanggal', 'produk.nama_produk', 'produk.harga', 'penjualan.jumlah')
                    ->join(DB::raw('(SELECT pelanggan_id, MAX(tanggal) AS max_tanggal FROM penjualan GROUP BY pelanggan_id) AS latest_transactions'), function ($join) {
                        $join->on('penjualan.pelanggan_id', '=', 'latest_transactions.pelanggan_id')
                            ->on('penjualan.tanggal', '=', 'latest_transactions.max_tanggal');
                    })
                    ->get();
                    dd($data);
        return view('users.index', ['users' => $model->paginate(15),'data' => $data]);
    }
}