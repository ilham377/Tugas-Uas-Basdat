<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    function index(){
    	$data['mahasiswa'] = DB::table('mahasiswa')->get();
    	$data['jurusan'] = DB::table('jurusan')-> get();
    	return view('mahasiswa', $data);
    }

    public function store(Request $request){
	// insert data ke table pegawai
	DB::table('mahasiswa')->insert([
		'Nim' => $request->nim,
		'nama_mhs' => $request->nama,
		'Id_jurusan' => $request->id_jrs,
		'jk' => $request->jk,
		'ttl' => $request->tgl,
		'alamat' => $request->alamat
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/mhs');
 
	}

	public function update(Request $request)
    {
        //
         DB::table("mahasiswa")->where('Nim', $request->enim)->update([
		   	'nama_mhs' => $request->enama,
			'Id_jurusan' => $request->eid_jrs,
			'jk' => $request->ejk,
			'ttl' => $request->etgl,
			'alamat' => $request->ealamat

        ]);
        return redirect('/mhs');
    }

    public function destroy($id)
    {
        //
        DB::table('mahasiswa')->where('Nim', $id)->delete();

        return redirect('/mhs');
    }

}
