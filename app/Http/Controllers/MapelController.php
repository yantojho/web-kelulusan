<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;
use App\Models\jenismapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = mapel::all();
        return view('admin.mapel.index_mapel', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenismapel = jenismapel::all();
        return view('admin.mapel.create_mapel', compact('jenismapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'jenismapel_id' => 'required',
            'nm_mapel' => 'required',
        ]);

        $insert = mapel::create($data);
        if($insert){
            return redirect()->route('admin.mapel')->with('success', 'Data Berhasil Ditambahkan');
        }else{
            return redirect()->route('admin.mapel')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $mapel = mapel::find($id);
        $jenismapel = jenismapel::all();
        return view('admin.mapel.edit_mapel', compact('mapel', 'jenismapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'jenismapel_id' =>'required',
            'nm_mapel' =>'required',
        ]);
        $update = mapel::find($id)->update($data);
        if($update){
            return redirect()->route('admin.mapel')->with('success', 'Data Berhasil Diubah');
        }else{
            return redirect()->route('admin.mapel')->with('error', 'Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $delete = mapel::find($id);
        $delete->delete();
        return redirect()->route('admin.mapel')->with('success', 'Data Berhasil Dihapus');
    }
}
