<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    //
    function index(){
    	$mk = DB::table('mk')->get();
    	$mhs = DB::table('mahasiswa')->get();
    	$data = DB::table('mahasiswa')->join('nilai', 'mahasiswa.Nim', '=', 'nilai.Nim')->join('mk', 'nilai.kode_mk', 'mk.kode_mk')->get();

    	return view('nilai', ['mk'=> $mk, 'mahasiswa'=> $mhs, 'nilai' => $data]);
    }

     public function store(Request $request){
	// insert data ke table pegawai
	DB::table('nilai')->insert([
		'Nim' => $request->nim,
		'kode_mk' => $request->mk,
		'uts' => $request->uts,
		'uas' => $request->uas,
		'na' => $request->na,
		'hm' => $request->hm
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/nilai');
 
	}

	public function update(Request $request)
    {
        //
         DB::table("nilai")->where('Nim', $request->enim)->update([
		   	'kode_mk' => $request->emk,
			'uts' => $request->euts,
			'uas' => $request->euas,
			'na' => $request->ena,
			'hm' => $request->ehm

        ]);
        return redirect('/nilai');
    }

    public function destroy($id)
    {
        //
        DB::table('nilai')->where('Nim', $id)->delete();

        return redirect('/nilai');
    }

}
