<?php

namespace App\Http\Controllers;

use App\Models\MasterMobil;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class PeminjamanController extends Controller
{
    public static function cek(Request $request){
        $mobil = Peminjaman::query()
        ->with(['hasMobil'])
        ->orderBy('id', 'DESC')->get();
        // dd($mobil);
        return view('pages.master.peminjaman.index')->with(['mobil'=>$mobil]);
    }
    public static function pinjam(Request $request){
        $mobil = MasterMobil::where('status',"Tersedia")->get();

        return view('pages.master.peminjaman.create')->with(['mobil'=>$mobil]);
    }
    public static function transaksi(Request $request){
        $user = Auth::user()->id;
        $mobil = MasterMobil::find($request->mobil_id);

        $updated = MasterMobil::where('id',$request->mobil_id)->update(['status'=>"Booked"]);

        // Periksa validasi tanggal
        if ($request->tanggal_pinjam >= $request->tanggal_kembali) {
            // Lakukan penanganan kesalahan atau berikan respon ke pengguna
            return redirect()->back()->with('error', 'Tanggal kembali harus setelah tanggal pinjam.');
        }
        $tanggalPinjam = Carbon::parse($request->tanggal_pinjam);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);

        $jumlahHari = $tanggalPinjam->diffInDays($tanggalKembali);
        $total = $mobil->tarif * $jumlahHari;

        $create = Peminjaman::create([
            'user_id' => $user,
            'tanggal_pinjam' => $tanggalPinjam->format('Y-m-d'),
            'tanggal_kembali' => $tanggalKembali->format('Y-m-d'),
            'mobil_id' => $request->mobil_id,
            'tarif' => $mobil->tarif,
            'total' => $total,
        ]);
        $updated = MasterMobil::where('id',$request->mobil_id)->update(['status'=>"Pinjam"]);
        return back();
    }
}