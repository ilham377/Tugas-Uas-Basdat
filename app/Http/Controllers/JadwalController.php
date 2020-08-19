<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    //
    function index(){
    	$data ['jadwal']= DB::table('jadwal')->get();
    	$data ['dosen']= DB::table('dosen')->get();
    	$data ['mk']= DB::table('mk')->get();
    	return view('jadwal', $data);
    }

    public function store(Request $request){
	// insert data ke table pegawai
	DB::table('jadwal')->insert([
		'Id_jdwl' => $request->id_jdwl,
		'Nip' => $request->nip,
		'kode_mk' => $request->kd_mk,
		'hari' => $request->hari,
		'waktu' => $request->wkt
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/jdw');
 
	}

	public function update(Request $request)
    {
        //
         DB::table("jadwal")->where('Id_jdwl', $request->eid_jdwl)->update([
		   	'Nip' => $request->enip,
			'kode_mk' => $request->ekd_mk,
			'hari' => $request->ehari,
			'waktu' => $request->ewkt

        ]);
        return redirect('/jdw');
    }

    public function destroy($id)
    {
        //
        DB::table('jadwal')->where('Id_jdwl', $id)->delete();

        return redirect('/jdw');
    }
}
