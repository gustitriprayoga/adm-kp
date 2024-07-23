@extends('layouts.main')
@section('judul')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Seminar Kerja Praktik</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Pengajuan Seminar Kerja Praktik</h6>
    </nav>
@endsection


@if (auth()->user()->role == 'Admin')
    @section('content')
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Data Pengajauan Seminar KP</div>
            </div>
        </div>

        <div class="card">

            <div class="card-body">
                <form action="{{ route('seminar.verifikasi.update', $seminarkp->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>Nama Mahasiswa</div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" name="mahasiswa_nama" id="mahasiswa_nama"
                            value="{{ $seminarkp->mahasiswa_nama }}" class="form-control" readonly>
                    </div>

                    <div>NIM</div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" name="mahasiswa_nim" id="mahasiswa_nim"
                            value="{{ $seminarkp->mahasiswa_nim }}" class="form-control" readonly>
                    </div>

                    <div>Judul</div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" name="judul" id="judul" value="{{ $seminarkp->judul }}"
                            class="form-control">
                    </div>

                    <div>Nama Pembimbing</div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" name="pembimbing" id="pembimbing" value="{{ $seminarkp->pembimbing }}"
                            class="form-control" readonly>
                    </div>



            </div>


            <div class="card mt-3">
                <div class="card-header bg-dark">
                    <div class="text-white">Bukti Persyaratan Mahasiswa</div>
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        <div>Bukti Acc Pembimbing</div>
                        <div class="input-group input-group-outline mb-3">
                            @if(!empty($seminarkp->acc_pembimbing))
                                <a href="{{ asset('storage/' .$seminarkp->acc_pembimbing) }}" class="btn btn-primary btn-sm">Lihat Document</a>
                            @else
                                <span class="text-muted">File tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>Bukti Hadir Seminar</div>
                        <div class="input-group input-group-outline mb-3">
                            @if(!empty($seminarkp->bukti_hadir_seminar))
                                <a href="{{ asset($seminarkp->bukti_hadir_seminar) }}" class="btn btn-primary btn-sm">Lihat Document</a>
                            @else
                                <span class="text-muted">File tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>Bukti Perbaikan Seminar</div>
                        <div class="input-group input-group-outline mb-3">
                            @if(!empty($seminarkp->bukti_perbaikan_seminar))
                                <a href="{{ asset($seminarkp->bukti_perbaikan_seminar) }}" class="btn btn-primary btn-sm">Lihat Document</a>
                            @else
                                <span class="text-muted">File tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>Bukti Surat Instansi</div>
                        <div class="input-group input-group-outline mb-3">
                            @if(!empty($seminarkp->surat_instansi))
                                <a href="{{ asset($seminarkp->surat_instansi) }}" class="btn btn-primary btn-sm">Lihat Document</a>
                            @else
                                <span class="text-muted">File tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>Bukti Nilai Instansi</div>
                        <div class="input-group input-group-outline mb-3">
                            @if(!empty($seminarkp->nilai_instansi))
                                <a href="{{ asset($seminarkp->nilai_instansi) }}" class="btn btn-primary btn-sm">Lihat Document</a>
                            @else
                                <span class="text-muted">File tidak tersedia</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-dark">
                <div class="text-white">Verifikasi Mahasiswa </div>
            </div>
            <div class="card-body">

                <div>Tentukan Penguji</div>
                <div class="input-group input-group-outline mb-3">
                    <select name="penguji" id="penguji" class="form-control">
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
                        @endforeach
                    </select>
                </div>

                <div>Tentukan Tanggal</div>
                <div class="input-group input-group-outline mb-3">
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>

                <div>Status</div>
                <div class="input-group input-group-outline mb-3">
                    <select name="status" id="status" class="form-control">
                        <option value="diterima">Terima</option>
                        <option value="ditolak">Tolak</option>
                    </select>
                </div>

                <div>Alasan</div>
                <div class="input-group input-group-outline mb-3">
                    <input type="text" name="alasan" id="alasan" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </div>
        </form>
    @endsection
@endif
