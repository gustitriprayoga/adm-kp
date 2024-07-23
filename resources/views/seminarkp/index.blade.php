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
        <div class="container">
            <div class="card-header bg-gradient-dark pt-4 justify-content-between d-flex">
                <h6 class="text-white">Pengajuan Kerja Praktik</h6>
                <a href="{{ route('seminar.create') }}" class="btn btn-primary btn-sm">Ajukan</a>
            </div>
            <div class="card">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pembimbing</th>
                            <th scope="col">Penguji</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminarkp as $kp)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kp->mahasiswa_nim }}</td>
                                <td>{{ $kp->mahasiswa_nama }}</td>
                                <td>{{ $kp->judul }}</td>
                                <td>{{ $kp->pembimbing }}</td>
                                <td>{{ $kp->penguji ?? 'Belum Di Tetapkan' }}</td>
                                <td>{{ $kp->tanggal ?? 'Belum Di Tetapkan' }}</td>
                                <td>
                                    @if ($kp->status == 'diterima')
                                        <span class="badge bg-success">{{ $kp->status }}</span>
                                    @elseif ($kp->status == 'ditolak')
                                        <span class="badge bg-danger">{{ $kp->status }}</span>
                                    @elseif ($kp->status == 'pending')
                                        <span class="badge bg-warning">{{ $kp->status }}</span>
                                    @endif
                                <td>
                                    @if ($kp->status == 'pending')
                                        <a href="{{ route('seminar.verifikasi', $kp->id) }}"
                                            class="btn btn-primary btn-sm">Verifikasi
                                        </a>
                                    @elseif ($kp->status == 'diterima')
                                        <a href="{{ route('seminar.acc', $kp->id) }}" class="badge bg-warning btn-sm"> ACC </a>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
@endif

@if (auth()->user()->role == 'Mahasiswa')
    @section('content')
        <div class="container">
            <div class="card-header bg-gradient-dark pt-4 justify-content-between d-flex">
                <h6 class="text-white">Pengajuan Kerja Praktik</h6>
                <a href="{{ route('seminar.create') }}" class="btn btn-primary btn-sm">Ajukan</a>
            </div>
            <div class="card">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pembimbing</th>
                            <th scope="col">Penguji</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminarkp as $kp)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kp->mahasiswa_nim }}</td>
                                <td>{{ $kp->mahasiswa_nama }}</td>
                                <td>{{ $kp->judul }}</td>
                                <td>{{ $kp->pembimbing }}</td>
                                <td>{{ $kp->penguji ?? 'Belum Di Tetapkan' }}</td>
                                <td>{{ $kp->tanggal ?? 'Belum Di Tetapkan' }}</td>
                                <td>
                                    @if ($kp->status == 'diterima')
                                        <span class="badge bg-success">{{ $kp->status }}</span>
                                    @elseif ($kp->status == 'ditolak')
                                        <span class="badge bg-danger">{{ $kp->status }}</span>
                                    @elseif ($kp->status == 'pending')
                                        <span class="badge bg-warning">{{ $kp->status }}</span>
                                    @endif
                                <td>
                                    @if ($kp->status == 'pending')
                                        <a href="{{ route('seminar.edit', $kp->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @elseif ($kp->status == 'diterima')
                                        <form action="{{ route('seminar.delete', $kp->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- APABILA SEMINAR ACC UNDANGAN KELUAR --}}
            @foreach ($seminarkp as $seminar)
                @if ($seminar->status == 'diterima')
                    <div class="card mt-4">
                        <div class="card-header bg-gradient-dark pt-4 justify-content-between d-flex">
                            Undangan Seminar KP
                        </div>
                        <div class="card-body items-center">
                            <p>Seminar Di Terima : Pada Tanggal </p>
                            <a href="#" class="btn btn-primary btn-sm"> Download Undangan</a>
                        </div>
                    </div>
                @else

                @endif
            @endforeach



            {{-- ABAILA SEMINAR KP SELESAi --}}

            @foreach ($seminarkp as $seminar)
                @if ($seminar->acc == 'selesai')
                <div class="card mt-4">
                    <div class="card-header bg-gradient-dark pt-4 justify-content-between d-flex">
                        Bukti Menyelesaikan Seminar Kerja Praktik
                    </div>
                    <div class="card-body items-center">
                        <p>Apabila Telah Menyelesaikan Seminar Kerja Praktik Maka Uplod Bukti Pada Form Di Bawah Ini :</p>
                        <ul>
                            <li>Bukti Selesai Berbaikan Seminar KP</li><a href="{{ asset('format_surat/format_bukti_penyerahan.docx') }}" class="btn btn-warning btn-sm">Download
                        Format Bukti Penyerahan</a>
                            <li>Bukti Penyerahan Laporan KP ( Cover Depan Halaman Laporan )</li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-sm"> Bukti Menyelesaikan KP</a>
                    </div>
                </div>
                @else

                @endif
            @endforeach


        </div>
    @endsection
@endif
