<?php

namespace App\Http\Controllers;
use App\Jemaat;
use App\Atestasi;
use DB;
use Illuminate\Http\Request;

class AtestasiController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role_or_permission:superadministrator|create atestasi|delete atestasi|update atestasi|read atestasi']);
    }

    public function DaftarAtestasi()
    {
        $Atestasi = Atestasi::select('atestasi.id', 'jemaat.nama_jemaat', 'no_surat')
        ->join('jemaat', 'jemaat.id', 'atestasi.id_jemaat')
        ->paginate(15);

        return view('atestasi/daftar-atestasi', compact('Atestasi'));
    }

    public function TambahAtestasi ()
    {
        $jemaat = Jemaat::whereNotIn('id', Atestasi::select('id_jemaat'))->get();

        return view ('atestasi/tambah-atestasi', compact('jemaat'));
    }

    
    public function CariAtestasi ()
    {
        $jemaat = DB::table('atestasi')->selectRaw('atestasi.id, nama_jemaat')
        ->join('jemaat', 'jemaat.id', 'atestasi.id_jemaat')
        ->get();

        return view ('atestasi/cari-atestasi', compact('jemaat'));
    }

    public function ListAtestasi (Request $request)
    {    
        $data = DB::table('atestasi')->selectRaw('atestasi.id, nama_jemaat, no_surat')
        ->join('jemaat', 'jemaat.id', 'atestasi.id_jemaat')
        ->where('atestasi.id_jemaat', $request->id_jemaat)
        ->get();
    
        return response()->json($data);
    }

    public function SimpanAtestasi (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Atestasi::$validasi);
            if ($validasi = true) {
                Atestasi::create($request->all());
                DB::commit();
                return redirect ('atestasi/daftar-atestasi')->with('status', 'Atestasi berhasil disimpan');
            }
        }
        catch (Exception $e){
            DB::rollback();
            return redirect('atestasi/daftar-atestasi')->with('warning', 'Atestasi gagal di simpan');
        }
    }

    public function EditAtestasi(Request $request)
    {
        $Atestasi = Atestasi::findOrFail($request->id);
        $jemaat = Jemaat::all();

        return view('atestasi/edit-Atestasi', compact('Atestasi', 'jemaat'));
    }

    public function UpdateAtestasi (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Atestasi::$validasi);
            if ($validasi == true){
                Atestasi::find($request->id)->update($request->all());
                DB::commit();
                return redirect ('atestasi/daftar-atestasi')->with('status', 'Atestasi berhasil diupdate');
            }
        } 
        catch (Exception $e) {
            DB::rollback();
            return redirect('atestasi/daftar-atestasi')->with('warning', 'Atestasi gagal di update');
        }
    }

    public function HapusAtestasi (Request $request)
    {
        $Atestasi = Atestasi::find($request->id);

        return view('atestasi/hapus-atestasi', compact('Atestasi'));
    }

    public function DeleteAtestasi (Request $request)
    {
        DB::beginTransaction();
        try{
            Atestasi::find($request->id)->delete();
            DB::commit();
            return redirect('Atestasi/daftar-Atestasi')->with('status', 'Atestasi berhasil dihapus');
        }
        catch (Exception $e){
            DB::rollback();
            return redirect('Atestasi/daftar-Atestasi')->with('warning', 'Atestasi gagal di hapus');
        }
    }
}