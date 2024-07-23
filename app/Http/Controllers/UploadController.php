<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pengajuankp;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request, $id)
    {
        $mhs =Mahasiswa:: where('user_id', auth()->user()->id)->get();
        foreach($mhs as $item)
        $mhs =Pengajuankp:: where('mhs_id',$item->id)->get();
        foreach($mhs as $items)
        $request->validate([
            's_kp'  => 'mimes:jpg,jpeg',
        ]);

        $upload = new Upload;

        $file = $request->file('s_kp');
        $fileName   = 'suratpengajuan-'. $file->getClientOriginalName();
        $file->move('surat_pengajuan/', $fileName);
        $upload->s_kp = $fileName;
        $upload->mhs_id = $item->id; 
        $upload->pengajuan_id = $items->id; 
        $upload->save();

        $p_kp = Pengajuankp::where('id',$id)->get();
        foreach($p_kp as $itm)
        // dd($itm->kondisi);
        if ($itm->kondisi == null){
            Pengajuankp::find($id)->update([
                'kondisi'=>'1'
            ]);
        }
        return redirect()->back();
    }

    public function store_balasan(Request $request, $id)
    {
    
        $request->validate([
            's_kp_balas'  => 'mimes:jpg,jpeg',
        ]);

        $caridata= Upload::where('pengajuan_id', $id)->get();
        foreach ($caridata as $item)
        $idupload=$item->id;
        $suratbalas=Upload::find($idupload);
        
        
        if($request->hasFile('s_kp_balas')){
            $request->file('s_kp_balas')->move('surat_balasan/','suratbalasan-'. $request->file('s_kp_balas')->getClientOriginalName());
            $suratbalas->s_kp_balas='suratbalasan-'. $request->file('s_kp_balas')->getClientOriginalName();
            $suratbalas->update();
        }

        
        return redirect()->back();

        
    }
}
