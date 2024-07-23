@extends('layouts.main')
@section('judul')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Seminar Kerja Praktik</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Acc Seminar</h6>
    </nav>
@endsection


@if (auth()->user()->role == 'Admin')
    @section('content')
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Data Hasil Ujian Seminar KP</div>
            </div>
        </div>

        <div class="card mb-4 ">
            <div class="card-header m-3 border-radius-bottom-end-2xl bg-gradient-dark pt-4 text-white">
                Data
            </div>
            <div class="card-body d-flex">
                <div>
                    <label for="#"> Nama </label>
                    <input type="#" name="#" id="#" class="form-control" value="{{ $seminarkp->mahasiswa_nama }}" readonly>
                </div>
                <div>
                    <label for="#"> Judul </label>
                    <input type="#" name="#" id="#" class="form-control" value="{{ $seminarkp->judul }}" readonly>
                </div>
                <div>
                    <label for="#"> Pembimbing </label>
                    <input type="#" name="#" id="#" class="form-control" value="{{ $seminarkp->pembimbing }}" readonly>
                </div>
                <div>
                    <label for="#"> Penguji </label>
                    <input type="#" name="#" id="#" class="form-control" value="{{ $seminarkp->penguji }}" readonly>
                </div>
                <div>
                    <label for="#"> Tanggal Seminar </label>
                    <input type="#" name="#" id="#" class="form-control" value="{{ $seminarkp->tanggal }}" readonly>
                </div>
                <div>
                    <label for="#"> Acc Seminar </label>
                    <input type="#" name="#" id="#" class="form-control" value="Belum Ada" readonly>
                </div>

            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('seminar.acc.update', $seminarkp->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>ACC</div>
                    <div class="input-group input-group-outline mb-3">
                        <select name="acc" id="acc" class="form-control">
                            <option value="terima"> Terima </option>
                            <option value="tolak"> Tolak </option>
                        </select>
                    </div>

                    <div>Alasan</div>
                    <div class="input-group input-group-outline mb-3">
                        <textarea name="alasan" id="alasan" class="form-control"></textarea>
                    </div>

                </form>
            </div>
        @endsection
@endif
