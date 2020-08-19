<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    //
    function index(){
    	$data = DB::table('dosen')->get();

    	return view('dosen', ['dosen' => $data]);
    }

    public function store(Request $request){
	// insert data ke table pegawai
	DB::table('dosen')->insert([
		'Nip' => $request->nip,
		'nama_dosen' => $request->nama,
		'jk' => $request->jk,
		'ttl' => $request->tgl,
		'alamat' => $request->alamat
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/dosen');
 
	}

	public function update(Request $request)
    {
        //
         DB::table("dosen")->where('Nip', $request->enip)->update([
		   	'nama_dosen' => $request->enama,
			'jk' => $request->ejk,
			'ttl' => $request->etgl,
			'alamat' => $request->ealamat

        ]);
        return redirect('/dosen');
    }

    public function destroy($id)
    {
        //
        DB::table('dosen')->where('Nip', $id)->delete();

        return redirect('/dosen');
    }

}
