@extends('layout.layout')
@section('content')
    <main class="contetnt">
        <div class="container">
            <div class="content-header mt-3 mb-3">
                <h3>Halaman Dashboard</h3>
            </div>
            <div class="row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gudang</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="/gudang" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Admin</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="/admin" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pengiriman</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="/pengiriman" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
