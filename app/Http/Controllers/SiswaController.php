<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function import_excel(Request $request) 
	{
		$file = $request->file('file');

        // membuat nama file unik
        
        if($request->hasFile('file')){
            $nama_file = $file->getClientOriginalName();
            $file_path = $file->move('excel/',$nama_file);
            $import = Excel::import(new  SiswaImport(), $file_path);

            if($import){
                File::delete($file_path);
                return redirect()->route('admin-siswa')->with('success', 'Berhasil mengimport data');
            }
        }
	}
}
