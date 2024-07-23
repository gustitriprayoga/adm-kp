<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Chat;
use App\Models\Logbook;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LogbookController extends Controller
{
    public function logbookk()
    {
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
            foreach ($dosen as $item)
            $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
            return view('logbook.view', compact('bimbingan'));
    }

    public function logbook()
    {
        if(auth()->user()->role =='Mahasiswa'){
            $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
            foreach($mhs as $mhss)
            $bimbingans=Bimbingan::where('mhs_id', $mhss->id)->get();

           
            if ($bimbingans->isNotEmpty()){
                $bimbingans=Bimbingan::where('mhs_id', $mhss->id)->get();
                foreach($bimbingans as $bimbingan)
                $logbook=Logbook::where('bimbingan_id', $bimbingan->id)->get();
                $chat=Chat::where('bimbingan_id', $bimbingan->id )->get();
                return view('mahasiswa.logbook', compact('logbook','bimbingans','chat')); ///////


            } else{
                return redirect()->route('pengajuan');

            }
        } 
        elseif (auth()->user()->role =='Dospem'){
            $dosen=Dosen::where('id_user',auth()->user()->id)->get();
            foreach ($dosen as $item)
            $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
            return view('mahasiswa.logbook', compact('bimbingan'));
        } 
        elseif (auth()->user()->role =='Ketua Prodi'){
            $bimbingan=Bimbingan::latest()->get();
            foreach ($bimbingan as $BIMBINGAN)
            $logbook=Logbook::where('bimbingan_id', $BIMBINGAN->id)->get();
            return view('mahasiswa.logbook', compact('bimbingan', 'logbook'));
        } 
        elseif (auth()->user()->role =='Admin'){
            $bimbingan=Bimbingan::latest()->get();
            return view('mahasiswa.logbook', compact('bimbingan'));
        }
    }


    public function buatlogbook()
    {
        return view ('mahasiswa.buatlogbook');
    }

    public function detail($id)
    {
        $bimbingan=Bimbingan::find($id);
        $logbook=Logbook::where('bimbingan_id', $bimbingan->id)->get();
        $chat=Chat::where('bimbingan_id', $bimbingan->id )->get();
        return view ('logbook.detail', compact('logbook', 'bimbingan','id','chat'));
    }

    public function detaill($id)
    {
        $bimbingan=Bimbingan::find($id);
        $logbook=Logbook::where('bimbingan_id', $bimbingan->id)->get();
        return view ('logbook.ka_dospem', compact('logbook', 'bimbingan'));
    }
    public function store(Request $request)
    {
        $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
        foreach($mhs as $item)
        $bimbingan =Bimbingan:: where('mhs_id',$item->id)->get();
        foreach($bimbingan as $items)
        // dd($items);


        $new= new Logbook;
        $new->bimbingan_id=$items->id;
        $new->kegiatan=$request->input('kegiatan');
        $new->deskripsi=$request->input('deskripsi');
        $new->tgl=$request->input('tgl');
        // $new->paraf='Belum Diparaf';
        $foto=$request->dokumentasi;
        $random=time().rand(100,999).".".$foto->getClientOriginalExtension();
        $fileName   = 'dokumentasi-'. $random;
        $foto->move('dokumentasi/', $fileName);
        $new->dokumentasi=$fileName;

        $foto=$request->dokumentasi2;
        $random=time().rand(100,999).".".$foto->getClientOriginalExtension();
        $fileName   = 'dokumentasi2-'. $random;
        $foto->move('dokumentasi2/', $fileName);
        $new->dokumentasi2=$fileName;
        
        $new->save();
        return redirect()->route('logbook');

    }

    public function paraf($id)
    {
        $logbook=Logbook::find($id);
        if($logbook==true){
            Logbook::find($id)->update([
                'paraf'=>'Diparaf'
            ]);
        }
        return redirect()->back();

    }

    public function chat(Request $request, $id)
    { 
        // dd($request->all());
        if (auth()->user()->role == "Mahasiswa"){
            $chat = new Chat;
            $chat->dosen_id = $id;
            $chat->mhs_id = auth()->user()->id;
            $chat->user = auth()->user()->id;
            $chat->bimbingan_id = $request->bimbingan_id;
            $chat->chat = $request->chat;
            $chat->save();
            return redirect()->back();
        }
        elseif(auth()->user()->role == "Dospem"){
            $chat = new Chat;
            $chat->dosen_id = auth()->user()->id;
            $chat->mhs_id = $id;
            $chat->user = auth()->user()->id;
            $chat->bimbingan_id = $request->bimbingan_id;
            $chat->chat = $request->chat;
            $chat->save();
            return redirect()->back();
            
        }

    }

    // public function chats(Request $request, $id)
    // { 
        
    //     

    // }
}
