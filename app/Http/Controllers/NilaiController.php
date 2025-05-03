<?php

namespace App\Http\Controllers;

use App\Imports\NilaiImport;
use App\Models\nilai;
use File;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = DB::table('nilais')
                ->join('siswas','nilais.nis','siswas.nis')
                ->join('mapels','nilais.mapel_id','mapels.id')
                ->select('nilais.*', 'siswas.nm_siswa','mapels.nm_mapel')
                ->get();
        return view('admin.nilai.index_nilai', compact('nilai'));
    }

    public function import_excel(Request $request) 
	{
		$file = $request->file('file');

        // membuat nama file unik
        
        if($request->hasFile('file')){
            $nama_file = $file->getClientOriginalName();
            $file_path = $file->move('excel/',$nama_file);
            $import = Excel::import(new NilaiImport(), $file_path);

            if($import){
                File::delete($file_path);
                return redirect()->route('admin-nilai')->with('success', 'Berhasil mengimport data');
            }
        }
	}
}
