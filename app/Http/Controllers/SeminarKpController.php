<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Mahasiswa;
use App\Models\SeminarKp;
use App\Models\Dosen;

class SeminarKpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminarkp = SeminarKp::all();

        return view('seminarkp.index', compact('seminarkp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();

        return view('seminarkp.create', compact('mahasiswas', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validasi request
            $request->validate([
                'mahasiswa_nama' => 'required',
                'mahasiswa_nim' => 'required',
                'judul' => 'required',
                'pembimbing' => 'required',
                'bukti_hadir_seminar' => 'required|file|mimes:pdf,doc,docx|max:4096',
                // 'bukti_perbaikan_seminar' => 'required|file|mimes:pdf,doc,docx|max:4096',
                'acc_pembimbing' => 'required|file|mimes:pdf,doc,docx|max:4096',
                'surat_instansi' => 'required|file|mimes:pdf,doc,docx|max:4096',
                'nilai_instansi' => 'required|file|mimes:pdf,doc,docx|max:4096',
            ]);

            // Ambil nama pengguna (misalnya dari session atau model pengguna terautentikasi)
            $user = auth()->user(); // Misalnya ini dari user yang sedang login
            $username = $user->name; // Misalnya menggunakan atribut nama pengguna

            // Proses penyimpanan file dengan nama yang berbeda untuk setiap jenis file
            $bukti_hadir_seminar_file = $request->file('bukti_hadir_seminar');
            $bukti_hadir_seminar_path = $bukti_hadir_seminar_file->storeAs(
                'seminar',
                $username . '_' . $bukti_hadir_seminar_file->hashName()
            );

            // $bukti_perbaikan_seminar_file = $request->file('bukti_perbaikan_seminar');
            // $bukti_perbaikan_seminar_path = $bukti_perbaikan_seminar_file->storeAs(
            //     'seminar',
            //     $username . '_' . $bukti_perbaikan_seminar_file->hashName()
            // );

            $acc_pembimbing_file = $request->file('acc_pembimbing');
            $acc_pembimbing_path = $acc_pembimbing_file->storeAs(
                'seminar',
                $username . '_' . $acc_pembimbing_file->hashName()
            );

            $surat_instansi_file = $request->file('surat_instansi');
            $surat_instansi_path = $surat_instansi_file->storeAs(
                'seminar',
                $username . '_' . $surat_instansi_file->hashName()
            );

            $nilai_instansi_file = $request->file('nilai_instansi');
            $nilai_instansi_path = $nilai_instansi_file->storeAs(
                'seminar',
                $username . '_' . $nilai_instansi_file->hashName()
            );

            // Simpan data seminar ke dalam database
            SeminarKp::create([
                'mahasiswa_nama' => $request->mahasiswa_nama,
                'mahasiswa_nim' => $request->mahasiswa_nim,
                'judul' => $request->judul,
                'pembimbing' => $request->pembimbing,
                'bukti_hadir_seminar' => $bukti_hadir_seminar_path,
                // 'bukti_perbaikan_seminar' => $bukti_perbaikan_seminar_path,
                'status' => 'pending',
                'acc_pembimbing' => $acc_pembimbing_path,
                'surat_instansi' => $surat_instansi_path,
                'nilai_instansi' => $nilai_instansi_path,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('seminar')->with('success', 'Data Seminar KP Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            dd($th->getMessage()); // Debugging, bisa dihapus setelah selesai debugging

            // return redirect()->back()->with('error', 'Gagal menambahkan data Seminar KP');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function verifikasi($id)
    {
        $seminarkp = SeminarKp::find($id);
        $dosens = Dosen::all();

        return view('seminarkp.verifikasi', compact('seminarkp', 'dosens'));
    }

    public function verifikasiUpdate(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input dari request
        $request->validate([
            'judul' => 'required|string|max:255',
            'penguji' => 'required|exists:dosens,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:diterima,ditolak',
            'alasan' => 'nullable|string|max:255',
        ]);

        try {
            // Ambil data Seminar berdasarkan $id
            $seminar = SeminarKp::findOrFail($id);

            // Update data berdasarkan input dari request
            $seminar->judul = $request->input('judul');
            $seminar->penguji = $request->input('penguji');
            $seminar->tanggal = $request->input('tanggal');
            $seminar->status = $request->input('status');
            $seminar->alasan = $request->input('alasan');

            // Simpan perubahan
            $seminar->save();


            // dd($seminar);
            // Beri respons atau kembalikan sesuatu jika diperlukan
            return redirect()->route('seminar')->with('success', 'Data seminar berhasil diperbarui');
        } catch (\Exception $e) {
            // Tangani kesalahan
            dd($e->getMessage());
            // return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data seminar: ' . $e->getMessage());
        }
    }

    public function acc($id)
    {
        $seminarkp = SeminarKp::find($id);

        return view('seminarkp.acc', compact('seminarkp'));
    }

    public function accUpdate(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input dari request
        $request->validate([
            'acc' => 'required|in:acc,tolak',
            'alasan_acc' => 'nullable|string|max:255',
        ]);
        // Ambil data Seminar berdasarkan $id
        $seminar = SeminarKp::findOrFail($id);

        // Update data berdasarkan input dari request
        $seminar->acc = $request->input('acc');
        $seminar->alasan = $request->input('alasan');

        // Simpan perubahan
        $seminar->save();

        return redirect()->route('seminar')->with('success', 'Data seminar berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
