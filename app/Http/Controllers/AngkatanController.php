<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AngkatanController extends Controller
{
    //
    function index(){
    	$data ['angkatan']= DB::table('angkatan')->get();
    	$data ['mahasiswa']= DB::table('mahasiswa')->get();
    	$data ['jurusan']= DB::table('jurusan')->get();
    	return view('angkatan', $data);
    }

    public function store(Request $request){
	// insert data ke table pegawai
	DB::table('angkatan')->insert([
		'Id_angkatan' => $request->id_akt,
		'Nim' => $request->nim,
		'Id_jurusan' => $request->id_jrs,
		'tahun' => $request->tahun
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/akt');
 
	}

	public function update(Request $request)
    {
        //
         DB::table("angkatan")->where('Id_angkatan', $request->eid_akt)->update([
		   	'Nim' => $request->enim,
			'Id_jurusan' => $request->eid_jrs,
			'tahun' => $request->etahun

        ]);
        return redirect('/akt');
    }

    public function destroy($id)
    {
        //
        DB::table('angkatan')->where('Id_angkatan', $id)->delete();

        return redirect('/akt');
    }
}
