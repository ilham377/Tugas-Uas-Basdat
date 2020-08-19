<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatakuliahController extends Controller
{
    //
    function index(){
    	$data = DB::table('mk')->get();

    	return view('matakuliah', ['mk' => $data]);
    }

    public function store(Request $request){
	// insert data ke table pegawai
	DB::table('mk')->insert([
		'kode_mk' => $request->kode,
		'nama_mk' => $request->matkul,
		'sks' => $request->sks,
		'semester' => $request->smtr
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/mk');
 
	}

    public function update(Request $request)
    {
        //
         DB::table("mk")->where('kode_mk', $request->ekode)->update([
		   	'nama_mk' => $request->ematkul,
			'sks' => $request->esks,
			'semester' => $request->esmtr

        ]);
        return redirect('/mk');
    }

    public function destroy($id)
    {
        //
        DB::table('mk')->where('kode_mk', $id)->delete();

        return redirect('/mk');
    }
    
}
