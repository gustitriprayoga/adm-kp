@extends('layouts.main')
@section('judul')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Pengajuan</h6>
    </nav>
@endsection

@if (auth()->user()->role == 'Admin')
    @section('content')
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-4">Pengajuan Kerja Praktik</h5>
                                </div>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table align-items-center mb-0 display nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder ">
                                                NO
                                            </th>

                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Nama
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                NIM
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Tempat Kerja Praktik
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Tanggal Pengajuan Kerja Praktik
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder">
                                                Dosen Pembimbingan
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kp_admin as $item)
                                            <tr>
                                                <td class="text-xs">
                                                    <p>{{ $loop->iteration }}</p>
                                                </td>

                                                <td class="text-left text-xs">
                                                    <p>{{ $item->mhs->nama_mhs }}</p>
                                                </td>
                                                <td class="text-left text-xs">
                                                    <p>{{ $item->mhs->nim }}</p>
                                                </td>
                                                <td class="text-left text-xs">
                                                    <p>{{ $item->tmpt }}</p>
                                                </td>
                                                <td class="text-left text-xs">
                                                    <p>{{ $item->tgl }}</p>
                                                </td>
                                                <td class="text-left text-xs">
                                                    <p>
                                                        @if ($item->bimbingan($item->mhs_id) && $item->bimbingan($item->mhs_id)['dosen_id'])
                                                            {{ $item->bimbingan($item->mhs_id)->dosen->nama_dosen }}
                                                        @else
                                                        @endif
                                                    </p>
                                                </td>


                                                <td class="">
                                                    @if ($item->status == 'Pending')
                                                        <a href="{{ route('pengajuan.status', $item->id) }}"
                                                            class="btn btn-outline-success badge badge-sm bg-gradient-success">Terima</a>
                                                        <a href="{{ route('pengajuan.status_tolak', $item->id) }}"
                                                            class="btn btn-outline-danger badge badge-sm bg-gradient-danger">Tolak</a>
                                                    @elseif ($item->status == 'Diterima')
                                                        <a href="#"
                                                            class="btn btn-outline-info badge badge-sm bg-gradient-info"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewsurat{{ $item->id }}"
                                                            title="View">Detail</a>

                                                        @include('admin.modalviewsurat')


                                                        {{-- <a class="btn btn-outline-success badge badge-sm bg-gradient-success">Diterima</a> --}}
                                                        @if ($item->bimbingan($item->mhs_id) && $item->bimbingan($item->mhs_id)['dosen_id'])
                                                        @else
                                                            <a class="btn btn-outline-primary badge badge-sm bg-gradient-primary"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal">Pilih
                                                                Dospem</a>
                                                        @endif
                                                        <!-- Modal -->
                                                        <form action="{{ route('bimbingan.store', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Pilih Dosen Pembimbing</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div
                                                                            class="modal-body input-group input-group-outline mb-3">
                                                                            <select name="dosen_id"
                                                                                class="form-control bg-transparent"
                                                                                id="inlineFormCustomSelectPref" required>
                                                                                <option value="">Pilih Prodi</option>
                                                                                @foreach ($dosens as $dosen)
                                                                                    <option value="{{ $dosen->id }}">
                                                                                        {{ $dosen->nama_dosen }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <a
                                                            class="btn btn-outline-danger badge badge-sm bg-gradient-danger">Ditolak</a>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif

@if (auth()->user()->role == 'Mahasiswa')
    @section('content')

    <h1>halaman mahasiswa</h1>
        <div>
            {{-- <div class="alert alert-dark mx-4" role="alert">
        <span class="text-white ">
            <strong>Ini Untuk MHS  </strong>
        </span>
    </div> --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Pengajuan Kerja Praktik</h5>
                                </div>
                                <a href="{{ route('pengajuankp') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                    type="button">+&nbsp; Pengajuan Kerja Praktik</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">

                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder ">
                                                NO
                                            </th>
                                            <th class="text-left text-uppercase text-dark text-xs font-weight-bolder">
                                                Tempat Kerja Praktik
                                            </th>
                                            <th class="text-left text-uppercase text-dark text-xs font-weight-bolder">
                                                Tanggal Pengajuan Kerja Praktik
                                            </th>
                                            <th class="text-left text-uppercase text-dark text-xs font-weight-bolder">
                                                Status
                                            </th>

                                            <th class="text-left text-uppercase text-dark text-xs font-weight-bolder">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kp as $item)
                                            <tr>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                </td>
                                                <td class="text-left">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->tmpt }}</p>
                                                </td>
                                                <td class="text-left">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->tgl }}</span>
                                                </td>
                                                <td class="text-left">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->status }}</span>
                                                </td>

                                                <td class="align-middle text-left text-sm">
                                                    @if ($item->status == 'Pending')
                                                    @elseif ($item->status == 'Diterima')
                                                        @if ($item->kondisi == '1')
                                                            <a href="#" data-bs-toggle="modal"
                                                                class="btn btn-outline-success badge badge-sm bg-gradient-success"
                                                                type="button"
                                                                data-bs-target="#viewsurat{{ $item->id }}">Detail</a>

                                                            @include('admin.modalviewsurat')
                                                        @else
                                                            <a class="btn btn-outline-warning badge badge-sm bg-gradient-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $item->id }}">+&nbsp;
                                                                Surat KP</a>
                                                            <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content ">

                                                                        <form
                                                                            action="{{ route('suratkp.store', $item->id) }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Upload Surat
                                                                                    Kerja Praktik</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div
                                                                                class="modal-body input-group input-group-outline mb-3">
                                                                                <div
                                                                                    class="input-group input-group-outline mb-3">
                                                                                    <label class="form-label"></label>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        name="s_kp">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif

                                                    @if ($item->kondisi == '1')
                                                        @if ($item->upload($item->id) && $item->upload($item->id)['s_kp_balas'] == null)
                                                            <a class="btn btn-outline-info badge badge-sm bg-gradient-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">+&nbsp; Surat Balasan KP</a>
                                                        @else
                                                        @endif
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <form
                                                                        action="{{ route('suratbalasan.store', $item->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Upload Surat Balasan
                                                                                Kerja Praktik</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div
                                                                            class="modal-body input-group input-group-outline mb-3">
                                                                            <div
                                                                                class="input-group input-group-outline mb-3">
                                                                                <label class="form-label"></label>
                                                                                <input type="file" class="form-control"
                                                                                    name="s_kp_balas">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif

@if (auth()->user()->role == 'Staf')
    @section('content')
        <div>



            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 mx-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-4">Pengajuan Kerja Praktik</h5>
                                </div>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table align-items-center mb-0 display nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder ">
                                                NO
                                            </th>

                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Nama
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                NIM
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Tempat Kerja Praktik
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Tanggal Pengajuan Kerja Praktik
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder">
                                                Dosen Pembimbingan
                                            </th>
                                            <th class=" text-uppercase text-dark text-xs font-weight-bolder ">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($kp_admin as $item)
                                            @if ($item->viewprodi($item->mhs_id) && $item->viewprodi($item->mhs_id))
                                                <?php $no++; ?>
                                                <tr>
                                                    <td class="text-xs">
                                                        <p>{{ $no }}</p>
                                                    </td>

                                                    <td class="text-left text-xs">
                                                        <p>{{ $item->mhs->nama_mhs }}</p>
                                                    </td>
                                                    <td class="text-left text-xs">
                                                        <p>{{ $item->mhs->nim }}</p>
                                                    </td>
                                                    <td class="text-left text-xs">
                                                        <p>{{ $item->tmpt }}</p>
                                                    </td>
                                                    <td class="text-left text-xs">
                                                        <p>{{ $item->tgl }}</p>
                                                    </td>
                                                    <td class="text-left text-xs">
                                                        <p>
                                                            @if ($item->bimbingan($item->mhs_id) && $item->bimbingan($item->mhs_id)['dosen_id'])
                                                                {{ $item->bimbingan($item->mhs_id)->dosen->nama_dosen }}
                                                            @else
                                                            @endif
                                                        </p>
                                                    </td>


                                                    <td class="">
                                                        @if ($item->status == 'Pending')
                                                            <a href="{{ route('pengajuan.status', $item->id) }}"
                                                                class="btn btn-outline-success badge badge-sm bg-gradient-success">Terima</a>
                                                            <a href="{{ route('pengajuan.status_tolak', $item->id) }}"
                                                                class="btn btn-outline-danger badge badge-sm bg-gradient-danger">Tolak</a>
                                                        @elseif ($item->status == 'Diterima')
                                                            <a href="#"
                                                                class="btn btn-outline-info badge badge-sm bg-gradient-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewsurat{{ $item->id }}"
                                                                title="View">Detail</a>

                                                            @include('admin.modalviewsurat')


                                                            {{-- <a class="btn btn-outline-success badge badge-sm bg-gradient-success">Diterima</a> --}}
                                                            @if ($item->bimbingan($item->mhs_id) && $item->bimbingan($item->mhs_id)['dosen_id'])
                                                            @else
                                                                <a class="btn btn-outline-primary badge badge-sm bg-gradient-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal">Pilih Dospem</a>
                                                            @endif
                                                            <!-- Modal -->
                                                            <form action="{{ route('bimbingan.store', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Pilih Dosen
                                                                                    Pembimbing</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div
                                                                                class="modal-body input-group input-group-outline mb-3">
                                                                                <select name="dosen_id"
                                                                                    class="form-control bg-transparent"
                                                                                    id="inlineFormCustomSelectPref"
                                                                                    required>
                                                                                    <option value="">Pilih Prodi
                                                                                    </option>
                                                                                    @foreach ($dosens as $dosen)
                                                                                        <option
                                                                                            value="{{ $dosen->id }}">
                                                                                            {{ $dosen->nama_dosen }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @else
                                                            <a
                                                                class="btn btn-outline-danger badge badge-sm bg-gradient-danger">Ditolak</a>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
