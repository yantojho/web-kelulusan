<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seting;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting = seting::find(1);
        return view('admin.setting.index_setting', compact('setting'));
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'kop' => 'required',
            'no_surat' => 'required',
            'tgl' => 'required',
            'nm_kepsek' =>'required',
            'nip_kepsek' =>'required',
            'isi_awal' =>'required',
            'isi_akhir' =>'required',
        ]);
        if($request->file('kop')){
            $request->file('kop')->move('kop/', $request->file('kop')->getClientOriginalName());
            $data['kop'] = $request->file('kop')->getClientOriginalName();
            $setting = Seting::updateOrCreate(['id' => $request->id], $data);
        }

        if($setting){
            return redirect()->route('admin.setting')->with('success', 'Pengaturan berhasil diupdate');
        }else{
            return redirect()->route('admin.setting')->with('error', 'Pengaturan gagal diupdate');
        }
    }

}
