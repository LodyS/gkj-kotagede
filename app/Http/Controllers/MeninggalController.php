<?php

namespace App\Http\Controllers;
use App\Meninggal;
use App\Jemaat;
use DataTables;
use DB;
use Illuminate\Http\Request;

class MeninggalController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role_or_permission:superadministrator|create meninggal|edit meninggal|delete meninggal|read meninggal']);
    }

    public function DaftarMeninggal()
    {
        $Meninggal = Meninggal::selectRaw('meninggal.id, jemaat.nama_jemaat, meninggal.tanggal, sebab')
        ->join('jemaat', 'jemaat.id', 'meninggal.id_jemaat')
        ->paginate(15);

        return view ('meninggal/daftar-Meninggal', compact('Meninggal'));
    }

    public function TambahMeninggal ()
    {
        $jemaat = Jemaat::whereNotIn('id', Meninggal::select('id_jemaat'))->get();

        return view ('meninggal/tambah-meninggal', compact('jemaat'));
    }

    public function EditMeninggal(Request $request)
    {
        $Meninggal = Meninggal::selectRaw('meninggal.id, meninggal.id_jemaat, jemaat.nama_jemaat, meninggal.tanggal, sebab')
        ->join('jemaat', 'jemaat.id', 'meninggal.id_jemaat')
        ->where('meninggal.id', $request->id)
        ->first();
        
        return view('meninggal/edit-meninggal', compact('Meninggal'));
    }

    public function CariMeninggal ()
    {
        $jemaat = DB::table('meninggal')->selectRaw('meninggal.id, nama_jemaat, meninggal.tanggal')
        ->join('jemaat', 'jemaat.id', 'meninggal.id_jemaat')
        ->get();

        return view ('meninggal/cari-meninggal', compact('jemaat'));
    }

    public function ListMeninggal (Request $request)
    {
        $data = DB::table('meninggal')->selectRaw('meninggal.id, nama_jemaat, meninggal.tanggal')
        ->join('jemaat', 'jemaat.id', 'meninggal.id_jemaat')
        ->where('meninggal.id_jemaat', $request->id_jemaat)
        ->get();
    
        return response()->json($data);
    }

    public function UpdateMeninggal(Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Meninggal::$validasi);
            if($validasi == true){
                Meninggal::find($request->id)->update($request->all());
                DB::commit();
                return redirect ('meninggal/daftar-meninggal')->with('status', 'Meninggal berhasil diupdate');
            }    
        } 
        catch (Exception $e) {
            DB::rollback();
        }
    }

    public function SimpanMeninggal (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Meninggal::$validasi);
            if($validasi == true){
                Meninggal::create($request->all());
                Jemaat::find($request->id_jemaat)->update(['status' => 'tidak aktif']);
                DB::commit();
                return redirect ('meninggal/daftar-meninggal')->with('status', 'Meninggal berhasil disimpan');
            }    
        }
        catch (Exception $e){
            DB::rollback();
        }
    }

    public function HapusMeninggal (Request $request)
    {
        $Meninggal = Meninggal::find($request->id);

        return view('meninggal/hapus-meninggal', compact('Meninggal'));
    }

    public function DeleteMeninggal (Request $request)
    {
        DB::beginTransaction();
        try{
            Meninggal::find($request->id)->delete();
            DB::commit();
            return redirect('meninggal/daftar-meninggal')->with('status', 'Meninggal berhasil dihapus');
        }
        catch (Exception $e){
            DB::rollback();
        }
    }
}