@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>M-Pay</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    {{-- <div class="breadcrumb-item"><a href="#">M-Pay</a></div> --}}
                    <div class="breadcrumb-item">M-Pay</div>
                    <div class="breadcrumb-item">Master Rekening</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Master Rekening</h2>
                <p class="section-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Master Rekening</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr class="text-center">
                                                {{-- <th class="text-center">No</th> --}}
                                                <th>Cabang</th>
                                                <th>CIF</th>
                                                <th>Rekening</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Kode Kolektor</th>
                                                <th>Saldo</th>
                                                {{-- <th>Status</th>
                                                <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                {{-- <td> 1 </td> --}}
                                                <td>001</td>
                                                <td>0000288</td>
                                                <td>9487302857</td>
                                                <td>17-07-1999</td>
                                                <td class="text-left">Ciki Ganteng</td>
                                                <td class="text-left">Lorem ipsum dolor sit amet</td>
                                                <td class="align-middle text-center">
                                                    <div class="badge badge-secondary">14</div>
                                                </td>
                                                <td class="text-left">Rp. 17.700.000</td>
                                                {{-- <td>
                                                    <img alt="image" src="assets/img/avatar/avatar-5.png"
                                                        class="rounded-circle" width="35" data-toggle="tooltip"
                                                        title="Wildan Ahdian">
                                                </td>
                                                <td>
                                                    <div class="badge badge-success">Completed</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
