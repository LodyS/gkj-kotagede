<?php

namespace App\Http\Controllers;
use App\Babtis;
use App\Gereja;
use App\Jemaat;
use DB;
use Illuminate\Http\Request;

class BabtisController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role_or_permission:superadministrator|create babtis|edit babtis|delete babtis|read babtis']);
    }

    public function TambahBabtis ()
    {
        $Gereja = Gereja::all();
        $Jemaat = Jemaat::whereNotIn('id', Babtis::select('id'))->get();

        return view('babtis/tambah-babtis', compact('Gereja', 'Jemaat'));
    }

    public function SimpanBabtis (Request $request)
    {
        DB::beginTransaction();
        try {
            Babtis::create($request->all());
            DB::commit();
            return redirect ('babtis/daftar-babtis')->with('status', 'Data Babtis berhasil disimpan');
        }
        catch (Exception $e){
            DB::rollback();
            return redirect('babtis/daftar-babtis')->with('warning', 'Babtis gagal dihapus');
        }
    }

    public function DaftarBabtis()
    {
        $babtis = Babtis::select('babtis.id', 'jemaat.nama_jemaat', 'no_surat_babtis', 'tanggal_babtis')
        ->join('jemaat', 'jemaat.id', 'babtis.id_jemaat')
        ->paginate(15);

        return view('babtis/daftar-babtis', compact('babtis'));
    }

    public function CariBabtis ()
    {
        $data = DB::table('babtis')->selectRaw('babtis.id_jemaat, nama_jemaat, tanggal_babtis, no_surat_babtis')
        ->join('jemaat', 'jemaat.id', 'babtis.id_jemaat')
        ->get();

        return view ('babtis/cari-babtis', compact('data'));
    }

    public function ListBabtis (Request $request)
    {    
        $data = DB::table('babtis')->selectRaw('babtis.id, nama_jemaat, tanggal_babtis, no_surat_babtis')
        ->join('jemaat', 'jemaat.id', 'babtis.id_jemaat')
        ->where('babtis.id_jemaat', $request->id_jemaat)
        ->get();
    
        return response()->json($data);
    }

    public function EditBabtis(Request $request)
    {
        $Gereja = Gereja::all();
        $babtis = Babtis::selectRaw('babtis.id, babtis.id_jemaat, nama_jemaat, tanggal_babtis, no_surat_babtis, pendeta_babtis, gereja_atestasi, 
        tanggal_atestasi, no_surat, gereja_sidi, no_surat_sidi, pendeta_sidi, gereja_penyerahan, tanggal_penyerahan, pendeta_penyerahan')
        ->join('jemaat', 'jemaat.id', 'babtis.id_jemaat')
        ->where('babtis.id', $request->id)
        ->first();

        return view('babtis/edit-babtis', compact('babtis', 'Gereja'));
    }

    public function UpdateBabtis (Request $request)
    {
        DB::beginTransaction();
        try {
            Babtis::find($request->id)->update($request->all());
        } 
        catch (Exception $e) {
            DB::rollback();
            return redirect('babtis/daftar-babtis')->with('warning', 'Babtis gagal di update');
        }
        DB::commit();
        return redirect ('babtis/daftar-babtis')->with('status', 'babtis berhasil diupdate');
    }

    public function HapusBabtis (Request $request)
    {
        $babtis = Babtis::find($request->id);

        return view('babtis/hapus-babtis', compact('babtis'));
    }

    public function DeleteBabtis (Request $request)
    {

        DB::beginTransaction();
        try{
            Babtis::find($request->id)->delete();
            return redirect('babtis/daftar-babtis')->with('warning', 'Babtis gagal dihapus');
        }
        catch (Exception $e){
            DB::rollback();
        }
        DB::commit();
        return redirect('babtis/daftar-babtis')->with('status', 'Babtis berhasil dihapus');
    }
}
