@extends('layout.layout')
@section('content')
    <main>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Pengiriman</h3>

                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="list-group flex-column me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="list-group-item list-group-item-action active" id="v-pills-home-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">Laporan Retur</button>
                            <button class="list-group-item list-group-item-action" id="v-pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">Pengiriman Retur</button>
                        </div>

                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab" tabindex="0">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Laporan Retur</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-bordered">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Tanggal Nota</th>
                                                        <th scope="col">Total Harga</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                        $ada_data = false;
                                                    @endphp
                                                    @foreach ($data_nota as $data)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            <td>{{ $data->nama_barang }}</td>
                                                            <td>{{ $data->tanggal_nota }}</td>
                                                            <td>{{ $data->total_harga }}</td>
                                                            <td>{{ $data->status_nota }}</td>
                                                            <td>
                                                                @if ($data->status_pengiriman !== 'dikirim')
                                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                                        data-bs-target="#ModalRetur{{ $data->id }}">Retur</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $ada_data = true;
                                                        @endphp
                                                    @endforeach
                                                    @if (!$ada_data)
                                                        <tr>
                                                            <td colspan="4" align="center">Data Laporan Retur Kosong
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab" tabindex="0">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Pengiriman Retur</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-bordered">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        {{-- <th scope="col">Nama Barang</th> --}}
                                                        <th scope="col">Tanggal Pengiriman</th>
                                                        <th scope="col">Status Pengiriman</th>
                                                        <th scope="col">Catatan</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                        $ada_data = false;
                                                    @endphp
                                                    @foreach ($data_pengiriman as $data)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            {{-- <td>{{ $data->barang->nama_barang }}</td> --}}
                                                            <td>{{ $data->tanggal_pengiriman }}</td>
                                                            <td>{{ $data->status_pengiriman }}</td>
                                                            <td>{{ $data->catatan }}</td>
                                                            <td>
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalEditPengiriman{{ $data->id }}">Edit</button>
                                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalHapusPengiriman{{ $data->id }}">Delete</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $ada_data = true;
                                                        @endphp
                                                    @endforeach
                                                    @if (!$ada_data)
                                                        <tr>
                                                            <td colspan="4" align="center">Data Pengiriman Kosong
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>



    {{-- Modal  Retur --}}
    @foreach ($data_nota as $dn)
        <div class="modal fade" id="ModalRetur{{ $dn->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Nota Retur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pengiriman/tambahpengiriman/{{ $dn->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="InputBarang" class="form-label">Nama Barang</label> --}}
                                <input type="text" class="form-control" name="nota_retur_id" id="InputBarang"
                                    aria-describedby="emailHelp" value="{{ $dn->id }}" hidden>
                            </div>
                            <div class="mb-3">
                                <label for="InputKode" class="form-label">Tanggal Pengiriman</label>
                                <input type="date" class="form-control" name="tanggal_pengiriman" id="InputKode">
                            </div>
                            <div class="mb-3">
                                <label for="InputStatus" class="form-label">Status Pengiriman</label>
                                <select class="form-select" name="status_pengiriman" id="inputGroupSelect01">
                                    <option selected>Pilih...</option>
                                    <option value="dikirim">Dikirim</option>
                                    <option value="diterima">Diterima</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="InputHarga" class="form-label">Catatan</label>
                                <input type="text" class="form-control" name="catatan" id="InputHarga">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal  Edit Pengiriman --}}
    @foreach ($data_pengiriman as $dp)
        <div class="modal fade" id="ModalEditPengiriman{{ $dp->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Nota Retur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pengiriman/updatepengiriman/{{ $dp->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="InputBarang" class="form-label">Nama Barang</label> --}}
                                <input type="text" class="form-control" name="nota_retur_id" id="InputBarang"
                                    aria-describedby="emailHelp" value="{{ $dp->id }}" hidden>
                            </div>
                            <div class="mb-3">
                                <label for="InputKode" class="form-label">Tanggal Pengiriman</label>
                                <input type="date" class="form-control" name="tanggal_pengiriman" id="InputKode"
                                    value="{{ $dp->tanggal_pengiriman }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputStatus" class="form-label">Status Pengiriman</label>
                                <select class="form-select" name="status_pengiriman" id="inputGroupSelect01">
                                    <option selected>{{ $dp->status_pengiriman }}</option>
                                    <option value="dikirim">Dikirim</option>
                                    <option value="diterima">Diterima</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="InputHarga" class="form-label">Catatan</label>
                                <input type="text" class="form-control" name="catatan" id="InputHarga"
                                    value="{{ $dp->catatan }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal hapus Pengiriman-->
    @foreach ($data_pengiriman as $hdp)
        <div class="modal fade" id="ModalHapusPengiriman{{ $hdp->id }}" tabindex="-1"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/pengiriman/destroypengiriman/{{ $hdp->id }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-goup">
                                <h5>Apakah kamu ingin menghapus nota ini?</h5>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
