<?php

namespace App\Http\Controllers;
use App\Jemaat;
use App\Gereja;
use App\Pernikahan;
use DB;
use Illuminate\Http\Request;

class JemaatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:superadministrator|create jemaat|edit jemaat|read jemaat|delete jemaat']);
    }

    public function Tambah()
    {
        $jemaat = new Jemaat;
        $gereja = Gereja::select('id', 'nama')->get();
        $Pernikahan = Pernikahan::selectRaw('concat(suami.nama_jemaat, " & ", istri.nama_jemaat) as orang_tua')
        ->leftJoin('jemaat as suami', 'suami.id', 'pernikahan.suami')
        ->leftJoin('jemaat as istri', 'istri.id', 'pernikahan.istri')
        ->get();

        return view ('jemaat/form-jemaat', compact('gereja', 'Pernikahan', 'jemaat'));
    }

    public function index(Request $request)
    {
        $data = Jemaat::select('id','nama_jemaat', 'ket');

        if(request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', 'jemaat/jemaat-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('jemaat/index');
    }

    public function Edit (Request $request)
    {
        $gereja = Gereja::select('id', 'nama')->get();
        $jemaat = Jemaat::findOrFail($request->id);
        $Pernikahan = Pernikahan::selectRaw('concat(suami.nama_jemaat, " & ", istri.nama_jemaat) as orang_tua')
        ->leftJoin('jemaat as suami', 'suami.id', 'pernikahan.suami')
        ->leftJoin('jemaat as istri', 'istri.id', 'pernikahan.istri')
        ->where('pernikahan.suami','<>', $request->id)
        ->Where('pernikahan.istri', '<>', $request->id)
        ->get();

        return view('jemaat/form-jemaat', compact('jemaat', 'Pernikahan', 'gereja'));
    }

    public function Simpan (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Jemaat::$validasi);
            if ($validasi == true)
            {
                Jemaat::create($request->except('id'));
                DB::commit();
                return redirect ('jemaat/index')->with('status', 'Jemaat berhasil di simpan');
            }
        }
        catch (Throwable $e) {
            DB::rollback();
        }
    }

    public function Update (Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Jemaat::$validasi);
            if ($validasi == true) {
                Jemaat::find($request->id)->update($request->except('user_input'));
                DB::commit();
                return redirect ('jemaat/daftar-jemaat')->with('status', 'Jemaat berhasil diupdate');
            }
        }
        catch (Throwable $e) {
            DB::rollback();
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try {

            $jemaat = Jemaat::where('id', $request->id)->delete();
            DB::commit();
            return Response()->json($jemaat);
        }
        catch (Exception $e){
            DB::rollback();
        }
    }
}
