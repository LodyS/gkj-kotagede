<?php

namespace App\Http\Controllers;
use App\Jemaat;
use App\PerjamuanKudus;
use DB;
use Illuminate\Http\Request;

class PerjamuanKudusController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role_or_permission:superadministrator|create perjamuan kudus|delete perjamuan kudus|update perjamuan kudus|read perjamuan kudus']);
    }

    public function DaftarPerjamuanKudus()
    {
        $PerjamuanKudus = PerjamuanKudus::select('perjamuan_kudus.id', 'jemaat.nama_jemaat', 'jam_ibadah', 'perjamuan_kudus.tanggal')
        ->join('jemaat', 'jemaat.id', 'perjamuan_kudus.id_jemaat')
        ->paginate(15);

        return view('perjamuan-kudus/daftar-perjamuan-kudus', compact('PerjamuanKudus'));
    }

    public function TambahPerjamuanKudus ()
    {
        $jemaat = Jemaat::all();

        return view ('perjamuan-kudus/tambah-perjamuan-kudus', compact('jemaat'));
    }

    public function CariPerjamuanKudus ()
    {
        $jemaat = DB::table('perjamuan_kudus')->selectRaw('perjamuan_kudus.id_jemaat as id, nama_jemaat')
        ->join('jemaat', 'jemaat.id', 'perjamuan_kudus.id_jemaat')
        ->get();

        return view ('perjamuan-kudus/cari-perjamuan-kudus', compact('jemaat'));
    }

    public function ListPerjamuanKudus (Request $request)
    {    
        $data = DB::table('perjamuan_kudus')->selectRaw('perjamuan_kudus.id, nama_jemaat, concat(tanggal, " ",jam_ibadah) as waktu')
        ->join('jemaat', 'jemaat.id', 'perjamuan_kudus.id_jemaat')
        ->where('perjamuan_kudus.id_jemaat', $request->id_jemaat)
        ->get();
    
        return response()->json($data);
    }

    public function SimpanPerjamuanKudus (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(PerjamuanKudus::$validasi);
            if($validasi == true ){
                PerjamuanKudus::create($request->all());
                DB::commit();
                return redirect ('perjamuan-kudus/daftar-perjamuan-kudus')->with('status', 'Perjamuan Kudus berhasil disimpan');
            }
        }
        catch (Exception $e){
            DB::rollback();
            return back();
        }
    }

    public function EditPerjamuanKudus(Request $request)
    {
        $PerjamuanKudus = PerjamuanKudus::selectRaw('perjamuan_kudus.id, perjamuan_kudus.id_jemaat, perjamuan_kudus.tanggal,
        jam_ibadah, jemaat.nama_jemaat, keterangan')
        ->join('jemaat', 'jemaat.id', 'perjamuan_kudus.id_jemaat')
        ->findOrFail($request->id);
   
        return view('perjamuan-kudus/edit-perjamuan-kudus', compact('PerjamuanKudus'));
    }

    public function UpdatePerjamuanKudus (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(PerjamuanKudus::$validasi);
            if($validasi == true ){
                PerjamuanKudus::find($request->id)->update($request->all());
                DB::commit();
                return redirect ('perjamuan-kudus/daftar-perjamuan-kudus')->with('status', 'Perjamuan Kudus berhasil diupdate');
            }    
        } 
        catch (Exception $e) {
            DB::rollback();
            return back();
        }
    }

    public function HapusPerjamuanKudus (Request $request)
    {
        $PerjamuanKudus = PerjamuanKudus::find($request->id);

        return view('perjamuan-kudus/hapus-perjamuan-kudus', compact('PerjamuanKudus'));
    }

    public function DeletePerjamuanKudus (Request $request)
    {
        DB::beginTransaction();
        try{
            PerjamuanKudus::find($request->id)->delete();
            DB::commit();
            return redirect('perjamuan-kudus/daftar-perjamuan-kudus')->with('status', 'Perjamuan Kudus berhasil dihapus');
        }
        catch (Exception $e){
            DB::rollback();
            return redirect('perjamuan-kudus/daftar-perjamuan-kudus')->with('warning', 'Perjamuan Kudus gagal di hapus');
        }
    }
}