<?php

namespace App\Http\Controllers;
use App\Gereja;
use DB;
use DataTables;
use Illuminate\Http\Request;

class GerejaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:superadministrator|create gereja|edit gereja|delete gereja|read gereja']);
    }

    public function index(Request $request)
    {
        $data = Gereja::select('id','nama', 'alamat')->orderBy('id', 'asc');

        if(request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', 'gereja/gereja-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('gereja/index');
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $gereja = Gereja::where($where)->first();

        return Response()->json($gereja);
    }

    public function store (Request $request)
    {
        DB::beginTransaction();

        try {

            $id = $request->id;
            $gereja = Gereja::updateOrCreate(['id' => $id],[
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
            ]);

            DB::commit();
            return Response()->json($gereja);
        } catch (Exception $e){
            DB::rollback();
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try {

            $gereja = Gereja::where('id', $request->id)->delete();
            DB::commit();
            return Response()->json($gereja);
        }
        catch (Exception $e){
            DB::rollback();
        }
    }
}
