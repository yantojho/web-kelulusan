<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenismapel;

class JenisMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenismapel = jenismapel::all();
        return view('admin.jenismapel.index_jenismapel', compact('jenismapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.jenismapel.create_jenismapel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nm_jenis' => 'required',
        ]);
        $jenismapel = jenismapel::create($data);
        if($jenismapel){
            return redirect()->route('admin.jenismapel')->with('success', 'Jenis Mapel berhasil ditambahkan');
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
        $jenismapel = jenismapel::find($id);
        return view('admin.jenismapel.edit_jenismapel', compact('jenismapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $jenismapel = jenismapel::find($id);
        $jenismapel->nm_jenis = $request->nm_jenis;
        $jenismapel->save();
        if($jenismapel){
            return redirect()->route('admin.jenismapel')->with('success', 'Jenis Mapel berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = jenismapel::find($id)->delete();
        if($delete){
            return redirect()->route('admin.jenismapel')->with('success', 'Jenis Mapel berhasil dihapus');
        }
    }
}
