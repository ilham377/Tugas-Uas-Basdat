<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    //
    function index(){
    	$data = DB::table('jurusan')->get();

    	return view('jurusan', ['jurusan' => $data]);
    }

    public function store(Request $request){
	// insert data ke table pegawai
	DB::table('jurusan')->insert([
		'Id_jurusan' => $request->idjurusan,
		'nama_jurusan' => $request->jurusan
		
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/jurusan');

	}

	public function update(Request $request)
    {
        //
         DB::table("jurusan")->where('Id_jurusan', $request->eidjurusan)->update([
         	
            'nama_jurusan' => $request->ejurusan
        ]);
        return redirect('/jurusan');
    }

    public function destroy($id)
    {
        //
        DB::table('jurusan')->where('Id_jurusan', $id)->delete();

        return redirect('/jurusan');
    }

}
