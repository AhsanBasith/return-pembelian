@extends('layout.layout')
@section('content')
    <main>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Gudang</h3>

                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="list-group flex-column me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="list-group-item list-group-item-action active" id="v-pills-home-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">Input Barang</button>
                            <button class="list-group-item list-group-item-action" id="v-pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">Kualitas Barang</button>
                        </div>

                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab" tabindex="0">
                                <div class="card">
                                    <div class="card-header">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ModalTambahBarang">
                                            Tambah Data
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-bordered">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kode Barang</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col">Harga</th>
                                                        {{-- <th scope="col">Stok</th> --}}
                                                        <th scope="col">Supplier</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data_barang as $data)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            <td>{{ $data->nama_barang }}</td>
                                                            <td>{{ $data->kode_barang }}</td>
                                                            <td>{{ $data->kategori }}</td>
                                                            <td>{{ $data->harga }}</td>
                                                            {{-- <td>{{ $data->stok }}</td> --}}
                                                            <td>{{ $data->supplier }}</td>
                                                            <td>
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalEditBarang{{ $data->id }}">Edit</button>
                                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalHapusBarang{{ $data->id }}">Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                                        <h5>Kualitas Barang</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-bordered">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kode Barang</th>
                                                        <th scope="col">Kualitas</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data_barang as $data)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            <td>{{ $data->nama_barang }}</td>
                                                            <td>{{ $data->kode_barang }}</td>
                                                            <td>{{ $data->kualitas }}</td>
                                                            <td>
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    data-bs-target="#ModalTambahKualitas{{ $data->id }}">Set
                                                                    Kualitas</button>
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

    <!-- Modal Kualitas-->
    @foreach ($data_barang as $edb)
        <div class="modal fade" id="ModalTambahKualitas{{ $edb->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/gudang/updatekualitas/{{ $edb->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="InputBarang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="InputBarang"
                                    aria-describedby="emailHelp" value="{{ $edb->nama_barang }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputKode" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="InputKode"
                                    value="{{ $edb->kode_barang }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputKualitas" class="form-label">Kualitas</label>
                                <select class="form-select" name="kualitas" id="inputGroupSelect01">
                                    <option selected>Pilih...</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                                {{-- <input type="text" class="form-control" name="kualitas" id="InputKualitas"
                                    value="{{ $edb->kualitas }}"> --}}
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach



    <!-- Modal Edit Barang-->
    @foreach ($data_barang as $edb)
        <div class="modal fade" id="ModalEditBarang{{ $edb->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/gudang/updatebarang/{{ $edb->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="InputBarang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="InputBarang"
                                    aria-describedby="emailHelp" value="{{ $edb->nama_barang }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputKode" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="InputKode"
                                    value="{{ $edb->kode_barang }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputKategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="InputKategori"
                                    value="{{ $edb->kategori }}">
                            </div>
                            <div class="mb-3">
                                <label for="InputHarga" class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" id="InputHarga"
                                    value="{{ $edb->harga }}">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="InputStok" class="form-label">Stok</label>
                                <input type="text" class="form-control" name="stok" id="InputStok"
                                    value="{{ $edb->stok }}">
                            </div> --}}
                            <div class="mb-3">
                                <label for="InputSupplier" class="form-label">Supplier</label>
                                <input type="text" class="form-control" name="supplier" id="InputSupplier"
                                    value="{{ $edb->supplier }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal hapus Barang-->
    @foreach ($data_barang as $hdb)
        <div class="modal fade" id="ModalHapusBarang{{ $hdb->id }}" tabindex="-1" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/gudang/destroybarang/{{ $hdb->id }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-goup">
                                <h5>Apakah kamu ingin menghapus data ini?</h5>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
