<?php

namespace App\Http\Controllers;
use App\Pendidikan;
use App\Jemaat;
use DB;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:superadministrator|create pendidikan|edit pendidikan|delete pendidikan|read pendidikan']);
    }

    public function index()
    {
        $data = Pendidikan::selectRaw('pendidikan.id, jemaat.nama_jemaat, nama_sekolah')
        ->join('jemaat', 'jemaat.id', 'pendidikan.id_jemaat');

        if(request()->ajax()){
            return datatables()->of($data)
            ->addColumn('action', 'pendidikan/pendidikan-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('pendidikan/index');
    }

    public function create()
    {
        $aksi = "create";
        $pendidikan = new Pendidikan;
        $jemaat = Jemaat::whereNotIn('id', Pendidikan::select('id_jemaat'))->get();

        return view('pendidikan/form', compact('jemaat', 'pendidikan', 'aksi'));
    }

    public function edit(Request $request)
    {
        $aksi = "update";
        $pendidikan = Pendidikan::selectRaw('pendidikan.id, pendidikan.id_jemaat, jemaat.nama_jemaat, nama_sekolah,
        jenjang_pendidikan, nama_sekolah, tahun_lulus, tempat, gelar, pendidikan_khusus')
        ->join('jemaat', 'jemaat.id', 'pendidikan.id_jemaat')
        ->where('pendidikan.id', $request->id)
        ->first();

        $jemaat = Jemaat::select('id','nama_jemaat')->get();

        return view('pendidikan/form', compact('pendidikan', 'jemaat', 'aksi'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $validasi = $request->validate(Pendidikan::$validasi);
            if ($validasi == true) {
                Pendidikan::find($request->id)->update($request->except('user_input'));
                DB::commit();
                return redirect ('pendidikan/index')->with('status', 'Pendidikan berhasil diupdate');
            }
        }
        catch (Exception $e) {
            DB::rollback();
            return redirect('pendidikan/index')->with('warning', 'Pendidikan gagal di update');
        }
    }

    public function store (Request $request)
    {
        DB::beginTransaction();

        try {

            $validasi = $request->validate(Pendidikan::$validasi);
            if ($validasi == true){
                Pendidikan::create($request->except('user_update', 'id'));
                DB::commit();
                return redirect('pendidikan/index');
            }
        }
        catch (Exception $e){
            DB::rollback();
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try {

            $pendidikan = Pendidikan::where('id', $request->id)->delete();
            DB::commit();
            return Response()->json($pendidikan);
        }
        catch (Exception $e){
            DB::rollback();
        }
    }
}
