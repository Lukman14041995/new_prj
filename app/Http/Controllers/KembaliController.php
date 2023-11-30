<?php

namespace App\Http\Controllers;

use App\Models\Kembali;
use App\Models\MasterMobil;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KembaliController extends Controller
{
    public static function cek(Request $request)
    {
        $mobil = Kembali::query()
            ->with(['hasMobil', 'hasPinjam', 'hasUser'])
            ->orderBy('id', 'DESC')->get();
        // dd($mobil);
        return view('pages.master.kembali.index')->with(['mobil' => $mobil]);
    }
    public static function kembalis(Request $request)
    {


        return view('pages.master.kembali.create');
    }
    public static function transaksi(Request $request)
    {
        // dd($request->all());
        $user = Auth::user()->id;
        $mobil = MasterMobil::all();
        $pinjam = Peminjaman::where('user_id', $user)->whereNull('tanggal_kembali')->first();
        $now = Carbon::now();
        $sekarang = $now->format('Y-m-d');

        // Periksa validasi tanggal
        if (!$pinjam || $pinjam->tanggal_kembali != $sekarang || $request->nopol != $mobil->nopol) {
            // Lakukan penanganan kesalahan atau berikan respon ke pengguna
            return redirect()->back()->with('error', 'Pengembalian Tidak Sesuai.');
        }

        $tanggalPinjam = Carbon::parse($pinjam->tanggal_pinjam);
        $tanggalKembali = $now;

        $jumlahHari = $tanggalPinjam->diffInDays($tanggalKembali);
        $total = $mobil->tarif * $jumlahHari;

        $createKembali = Kembali::create([
            'user_id' => $user,
            'tanggal_pinjam' => $tanggalPinjam->format('Y-m-d'),
            'aktual_kembali' => $sekarang,
            'mobil_id' => $request->mobil_id,
            'tarif' => $mobil->tarif,
            'total' => $total,
        ]);

        $updatePeminjaman = Peminjaman::where('id', $pinjam->id)->update([
            'tanggal_kembali' => $sekarang,
            'tarif' => $mobil->tarif * $jumlahHari, // Update tarif sesuai dengan jumlah hari
        ]);

        $updated = MasterMobil::where('id', $request->mobil_id)->update(['status' => 'Tersedia']);

        return back();
    }
}