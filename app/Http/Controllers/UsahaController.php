<?php

namespace App\Http\Controllers;
use App\Usaha;
use App\Jemaat;
use DB;
use Illuminate\Http\Request;

class usahaController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role_or_permission:superadministrator|create usaha|edit usaha|delete usaha|read usaha']);
    }

    public function DaftarUsaha()
    {
        $usaha = Usaha::selectRaw('usaha.id, jemaat.nama_jemaat, usaha')
        ->join('jemaat', 'jemaat.id', 'usaha.id_jemaat')
        ->paginate(5);

        return view('usaha/daftar-usaha', compact('usaha'));
    }

    public function TambahUsaha ()
    {
        $jemaat = Jemaat::whereNotIn('id', Usaha::select('id_jemaat'))->get();
        return view ('usaha/tambah-usaha', compact('jemaat'));
    }

    public function CariUsaha ()
    {
        $usaha = Usaha::selectRaw('usaha.id_jemaat, nama_jemaat, usaha')
        ->join('jemaat', 'jemaat.id', 'usaha.id_jemaat')
        ->get();
        
        return view ('usaha/cari-usaha', compact('usaha'));
    }

    public function ListUsaha (Request $request)
    {
        $data = Usaha::selectRaw('usaha.id, usaha.id_jemaat, nama_jemaat, usaha')
        ->join('jemaat', 'jemaat.id', 'usaha.id_jemaat')
        ->where('usaha.id_jemaat', $request->id_jemaat)
        ->get();
    
        return response()->json($data);
    }

    public function EditUsaha(Request $request)
    {
        $jemaat = Jemaat::all();
        $usaha = Usaha::selectRaw('usaha.id, usaha, nama_jemaat, usaha.id_jemaat')
        ->join('jemaat', 'jemaat.id', 'usaha.id_jemaat')
        ->find($request->id);
    
        return view('usaha/edit-usaha', compact('usaha', 'jemaat'));
    }

    public function UpdateUsaha(Request $request)
    {
        DB::beginTransaction();
        try {
            $validate = $request->validate(Usaha::$validasi);
            if ($validate == true){
                Usaha::find($request->id)->update($request->all());
                DB::commit();
                return redirect ('usaha/daftar-usaha')->with('status', 'Usaha berhasil diupdate');
            }
        } 
        catch (Exception $e) {
            DB::rollback();
        }
    }

    public function SimpanUsaha (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Usaha::$validasi);
            if ($validasi == true){
                Usaha::create($request->all());
                DB::commit();
                return redirect ('usaha/daftar-usaha')->with('status', 'Usaha berhasil disimpan');
            }
        }
        catch (Exception $e){
            DB::rollback();
        }
    }

    public function HapusUsaha (Request $request)
    {
        $usaha = usaha::find($request->id);

        return view('usaha/hapus-usaha', compact('usaha'));
    }

    public function Deleteusaha (Request $request)
    {
        DB::beginTransaction();
        try{
            Usaha::find($request->id)->delete();
            DB::commit();
        }
        catch (Exception $e){
            DB::rollback();
        }
        return redirect('usaha/daftar-usaha')->with('status', 'Usaha berhasil dihapus');
    }
}