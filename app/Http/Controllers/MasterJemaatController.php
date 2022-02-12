<?php

namespace App\Http\Controllers;
use App\Jemaat;
use App\Pernikahan;
use App\Gereja;
use App\Pekerjaan;
use App\Babtis;
use App\Meninggal;
use DB;
use Illuminate\Http\Request;

class MasterJemaatController extends Controller
{
    public function UlangTahun ()
    {
        $tanggal = date('d');
        $bulan = date('m');
        $Jemaat = Jemaat::select('nama_jemaat', 'tanggal', 'ket')
        ->whereDay('tanggal', $tanggal)
        ->whereMonth('tanggal', $bulan)
        ->paginate(3);

        return view ('master-jemaat/ulang-tahun', compact('Jemaat'));
    }

    public function CariUltah()
    {
        return view('master-jemaat/cari-ulang-tahun');
    }

    public function ListUltah (Request $request)
    {
        $data = DB::table('jemaat')
        ->selectRaw('tanggal,  nama_jemaat, ket')
        ->whereMonth('tanggal', $request->bulan)
        ->whereDay('tanggal', $request->tanggal)
        ->get();
    
        return response()->json($data);
    }

    public function Pernikahan ()
    {
        $tanggal = date('d');
        $bulan = date('m');
        $Pernikahan = Pernikahan::select('suami.nama_jemaat as suami', 'pernikahan.tanggal', 
        'istri.nama_jemaat as istri', 'gereja.nama as gereja', 'suami.ket')
        ->join('jemaat as suami', 'suami.id', 'pernikahan.suami')
        ->join('jemaat as istri', 'istri.id', 'pernikahan.istri')
        ->join('gereja', 'gereja.id', 'pernikahan.id_gereja')
        ->whereDay('pernikahan.tanggal', $tanggal)
        ->whereMonth('pernikahan.tanggal', $bulan)
        ->paginate(3);

        return view ('master-jemaat/pernikahan', compact('Pernikahan'));
    }

    public function CariPernikahan()
    {
        return view('master-jemaat/cari-pernikahan');
    }

    public function ListPernikahan (Request $request)
    {
        $data = Pernikahan::selectRaw("concat(suami.nama_jemaat, '', istri.nama_jemaat) as pasangan, pernikahan.tanggal, gereja.nama as gereja, suami.ket")
        ->join('jemaat as suami', 'suami.id', 'pernikahan.suami')
        ->join('jemaat as istri', 'istri.id', 'pernikahan.istri')
        ->join('gereja', 'gereja.id', 'pernikahan.id_gereja')
        ->whereDay('pernikahan.tanggal', $request->tanggal)
        ->whereMonth('pernikahan.tanggal', $request->bulan)
        ->get();
    
        return response()->json($data);
    }

    public function Meninggal ()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $Meninggal = Meninggal::select('jemaat.nama_jemaat', 'jemaat.tanggal as tanggal_lahir', 'sebab', 'ket')
        ->join('jemaat', 'jemaat.id', 'meninggal.id_jemaat')
        ->whereMonth('meninggal.tanggal', $bulan)
        ->whereYear('meninggal.tanggal', $tahun)
        ->paginate(3);

        return view ('master-jemaat/meninggal', compact('Meninggal'));
    }

    public function DetailJemaat ()
    {
        $Jemaat = DB::table('jemaat')->select('id', 'id_jemaat', 'nama_jemaat')->paginate(20);

        return view('master-jemaat/detail-jemaat', compact('Jemaat'));
    }

    public function DetailInformasi (Request $request)
    {
        $datadiri = Jemaat::select('ket as wilayah', 'id_jemaat', 'status', 'nama_jemaat',  'jkel', 'ttl', 'tanggal', 'gol_darah', 'alamat', 'no_hp')
        ->where('id', $request->id)
        ->first();

        $datakerja = Pekerjaan::select('jenis_pekerjaan', 'tempat_kerja', 'alamat_kerja', 'jabatan')
        ->where('id_jemaat', $request->id)
        ->first();

        $datababtis = Babtis::select('tanggal_babtis', 'no_surat_babtis', 'pendeta_babtis', 'baptis.nama as gereja',
        'tanggal_sidi', 'no_surat_sidi', 'pendeta_sidi', 'sidi.nama as gereja_sidi')
        ->join('gereja as sidi', 'sidi.id', 'babtis.gereja_sidi')
        ->join('gereja as baptis', 'babtis.id', 'babtis.gereja_atestasi')
        ->where('id_jemaat', $request->id)
        ->first();

        return view ('master-jemaat/detail-informasi-jemaat', compact('datadiri', 'datakerja', 'datababtis'));
    }

    public function KepalaKeluarga ()
    {
        $Jemaat = DB::table('jemaat')
        ->selectRaw('id_jemaat, nama_jemaat, alamat, no_kk, ket')
        ->where('hub_keluarga', 'KK')
        ->paginate(20);

        return view('master-jemaat/kepala-keluarga', compact('Jemaat'));
    }

    public function DetailKepalaKeluarga (Request $request)
    {
        $Jemaat = Jemaat::selectRaw('jemaat.id_jemaat, nama_jemaat, alamat, no_kk, ket, hub_keluarga, jkel, ttl, tanggal, no_surat_babtis')
        ->join('babtis', 'babtis.id_jemaat', 'jemaat.id')
        ->where('hub_keluarga', 'KK')
        ->get();

        return view('master-jemaat/detail-kepala-keluarga', compact('Jemaat'));
    }
}