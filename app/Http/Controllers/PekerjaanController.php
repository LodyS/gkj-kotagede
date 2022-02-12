<?php

namespace App\Http\Controllers;
use App\Jemaat;
use App\Pekerjaan;
use DB;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role_or_permission:superadministrator|create pekerjaan|delete pekerjaan|update pekerjaan|read pekerjaan']);
    }

    public function DaftarPekerjaan()
    {
        $pekerjaan = Pekerjaan::select('pekerjaan.id', 'jemaat.nama_jemaat', 'jabatan', 'tempat_kerja')
        ->join('jemaat', 'jemaat.id', 'pekerjaan.id_jemaat')
        ->paginate(15);

        return view('pekerjaan/daftar-pekerjaan', compact('pekerjaan'));
    }

    public function TambahPekerjaan ()
    {
        $jemaat = Jemaat::whereNotIn('id', Pekerjaan::select('id_jemaat'))->get();

        return view ('pekerjaan/tambah-pekerjaan', compact('jemaat'));
    }

    public function CariPekerjaan ()
    {
        $jemaat = Jemaat::all();
        return view ('pekerjaan/cari-pekerjaan', compact('jemaat'));
    }

    public function ListPekerjaan (Request $request)
    {    
        $data = DB::table('pekerjaan')->selectRaw('pekerjaan.id, nama_jemaat, jabatan, tempat_kerja')
        ->join('jemaat', 'jemaat.id', 'pekerjaan.id_jemaat')
        ->where('pekerjaan.id_jemaat', $request->id_jemaat)
        ->get();
    
        return response()->json($data);
    }

    public function SimpanPekerjaan (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Pekerjaan::$validasi);

            if ($validasi == true){
                Pekerjaan::create($request->all());
                DB::commit();
                return redirect ('pekerjaan/daftar-pekerjaan')->with('status', 'Pekerjaan Jemaat berhasil disimpan');
            }
        }
        catch (Exception $e){
            DB::rollback();
            return redirect('pekerjaan/daftar-pekerjaan')->with('warning', 'Pekerjaan gagal di simpan');
        }
    }

    public function EditPekerjaan(Request $request)
    {
        $pekerjaan = Pekerjaan::selectRaw('pekerjaan.id,jenis_pekerjaan,pekerjaan.id_jemaat,jemaat.nama_jemaat,tempat_kerja,alamat_kerja,jabatan,no_telp')
        ->join('jemaat', 'jemaat.id', 'pekerjaan.id_jemaat')
        ->where('pekerjaan.id',$request->id)
        ->first();

        return view('pekerjaan/edit-pekerjaan', compact('pekerjaan'));
    }

    public function UpdatePekerjaan (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Pekerjaan::$validasi);
            if ($validasi == true){
                Pekerjaan::find($request->id)->update($request->all());
                DB::commit();
                return redirect ('pekerjaan/daftar-pekerjaan')->with('status', 'Pekerjaan berhasil diupdate');
            }
        } 
        catch (Exception $e) {
            DB::rollback();
            return redirect('pekerjaan/daftar-pekerjaan')->with('warning', 'Pekerjaan gagal di update');
        }
    }

    public function HapusPekerjaan (Request $request)
    {
        $pekerjaan = Pekerjaan::find($request->id);

        return view('pekerjaan/hapus-pekerjaan', compact('pekerjaan'));
    }

    public function DeletePekerjaan (Request $request)
    {
        DB::beginTransaction();
        try{
            Pekerjaan::find($request->id)->delete();
        }
        catch (Exception $e){
            DB::rollback();
            return redirect('pekerjaan/daftar-pekerjaan')->with('warning', 'Pekerjaan gagal di hapus');
        }
        DB::commit();
        return redirect('pekerjaan/daftar-pekerjaan')->with('status', 'Pekerjaan berhasil dihapus');
    }
}