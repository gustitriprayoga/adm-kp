@extends('layouts.main')
@section('judul')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Seminar Kerja Praktik</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Form Pengajuan Seminar Kerja Peraktik</h6>
    </nav>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-header bg-warning my-3 border-radius-bottom-end-lg">
            <div class="card-title text-white">
                Syarat Pengajuan Seminar Kerja Praktik
            </div>
        </div>
        <div class="card-body">
            <ul>
                <li>Upload Bukti Acc Pembimbing</li>
                <li>Upload Bukti Surat Selesai Dari Instansi</li>
                <li>Upload Bukti Nilai Dari Instansi</li> <a href="{{ asset('format_surat/format_nilai_instansi.docx') }}" class="btn btn-warning btn-sm">Download
                    Format Nilai Instansi</a>
                <li>Upload Bukti Menghadiri Seminar (-5)</li> <a href="{{ asset('format_surat/format_hadir_seminar.docx') }}" class="btn btn-warning btn-sm">Download
                    Format Hadir Seminar</a>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-center  bg-gradient-dark">
            <h5 class="text-white">Form Pengajuan</h5>
        </div>

        <div class="card-body my-4">
            <form action="{{ route('seminar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-group-outline mb-3">
                    <label for="mahasiswa_nama" class="form-label">Nama</label>
                    @foreach ($mahasiswas as $mahasiswa)
                        <input type="text" class="form-control" id="mahasiswa_nama" name="mahasiswa_nama"
                            value="{{ $mahasiswa->nama_mhs }}" required>
                    @endforeach
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label for="mahasiswa_nim" class="form-label">Nama</label>
                    @foreach ($mahasiswas as $mahasiswa)
                        <input type="text" class="form-control" id="mahasiswa_nim" name="mahasiswa_nim"
                            value="{{ $mahasiswa->nim }}" required>
                    @endforeach
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label for="judul" class="form-label"> Judul Seminar </label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <select for="pembimbing" name="pembimbing" id="pembimbing" class="form-control">
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->nama_dosen }}"> {{ $dosen->nama_dosen }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header text-center  bg-gradient-dark">
            <h5 class="text-white">Upload Bukti Persyaratan</h5>
        </div>
        <div class="card-body">
            <div class="text-md">
                Bukti Acc Pembimbing
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="acc_pembimbing" class="form-label"> </label>
                <input type="file" class="form-control" name="acc_pembimbing" id="acc_pembimbing" required>
            </div>
            <div class="text-md">
                Bukti Surat Instansi
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="surat_instansi" class="form-label"> </label>
                <input type="file" class="form-control" name="surat_instansi" id="surat_instansi" required>
            </div>
            <div class="text-md">
                Bukti Nilai Instansi
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="nilai_instansi" class="form-label"> </label>
                <input type="file" class="form-control" name="nilai_instansi" id="nilai_instansi" required>
            </div>
            <div class="text-md">
                Bukti Hadir Seminar
            </div>
            {{-- <div class="input-group input-group-outline mb-3">
                <label for="bukti_hadir_seminar" class="form-label"> </label>
                <input type="file" class="form-control" name="bukti_hadir_seminar" id="bukti_hadir_seminar" required>
            </div>
            <div class="text-md">
                Bukti Perbaikan Seminar
            </div> --}}
            <div class="input-group input-group-outline mb-3">
                <label for="bukti_perbaikan_seminar" class="form-label"> </label>
                <input type="file" class="form-control" name="bukti_perbaikan_seminar" id="bukti_perbaikan_seminar"
                    required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
