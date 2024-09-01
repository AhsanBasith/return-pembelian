@extends('layout.layout')
@section('content')
    <main>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Admin</h3>

                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="list-group flex-column me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="list-group-item list-group-item-action active" id="v-pills-home-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">Laporan Kerusakan</button>
                            <button class="list-group-item list-group-item-action" id="v-pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">Nota Retur</button>
                        </div>

                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab" tabindex="0">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Laporan Kerusakan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-bordered">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kode Barang</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Kualitas</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                        $ada_data = false;
                                                    @endphp
                                                    @foreach ($data_barang as $data)
                                                        @if ($data->kualitas == 'Rusak')
                                                            <tr>
                                                                <th scope="row">{{ $no++ }}</th>
                                                                <td>{{ $data->nama_barang }}</td>
                                                                <td>{{ $data->kode_barang }}</td>
                                                                <td>{{ $data->harga }}</td>
                                                                <td>{{ $data->kualitas }}</td>
                                                                <td>
                                                                    <button class="btn btn-success" data-bs-toggle="modal"
                                                                        data-bs-target="#ModalAddNota{{ $data->id }}">Add
                                                                        Nota Retur</button>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $ada_data = true;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if (!$ada_data)
                                                        <tr>
                                                            <td colspan="4" align="center">Laporan barang rusak tidak ada
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
                                        <h5>Nota Retur</h5>
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
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalEditNota{{ $data->id }}">Edit</button>
                                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalHapusNota{{ $data->id }}">Delete</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $ada_data = true;
                                                        @endphp
                                                    @endforeach
                                                    @if (!$ada_data)
                                                        <tr>
                                                            <td colspan="4" align="center">Data Nota Retur Kosong
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



    <!-- Modal Tambah Barang-->
    <div class="modal fade" id="ModalTambahBarang" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/gudang/storebarang" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="InputBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="InputBarang"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="InputKode" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" id="InputKode">
                        </div>
                        <div class="mb-3">
                            <label for="InputKategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="InputKategori">
                        </div>
                        <div class="mb-3">
                            <label for="InputHarga" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="InputHarga">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="InputStok" class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" id="InputStok">
                        </div> --}}
                        <div class="mb-3">
                            <label for="InputSupplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" name="supplier" id="InputSupplier">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Add Nota-->
    @foreach ($data_barang as $db)
        <div class="modal fade" id="ModalAddNota{{ $db->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Nota Retur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/tambahnota/{{ $db->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="InputBarang" class="form-label">Nama Barang</label> --}}
                                <input type="text" class="form-control" name="barang_id" id="InputBarang"
                                    aria-describedby="emailHelp" value="{{ $db->id }}" hidden>
                            </div>
                            <div class="mb-3">
                                <label for="InputKode" class="form-label">Tanggal Nota</label>
                                <input type="date" class="form-control" name="tanggal_nota" id="InputKode" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputKategori" class="form-label">Total Harga</label>
                                <input type="text" class="form-control" name="total_harga" id="InputKategori"
                                    value="{{ $db->harga }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputHarga" class="form-label">Status Nota</label>
                                <input type="text" class="form-control" name="status_nota" id="InputStatus" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Edit Nota-->
    @foreach ($data_nota as $edn)
        <div class="modal fade" id="ModalEditNota{{ $edn->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nota</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/updatenota/{{ $edn->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="InputBarang" class="form-label">Tanggal Nota</label>
                                <input type="date" class="form-control" name="tanggal_nota" id="InputBarang"
                                    aria-describedby="emailHelp" value="{{ $edn->tanggal_nota }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputKode" class="form-label">Total Harga</label>
                                <input type="text" class="form-control" name="total_harga" id="InputKode"
                                    value="{{ $edn->total_harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputKategori" class="form-label">Satatus</label>
                                <input type="text" class="form-control" name="status_nota" id="Inputstatus"
                                    value="{{ $edn->status_nota }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal hapus Nota-->
    @foreach ($data_nota as $hdn)
        <div class="modal fade" id="ModalHapusNota{{ $hdn->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/destroynota/{{ $hdn->id }}" method="POST">
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
