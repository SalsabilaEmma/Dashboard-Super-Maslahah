@extends('layout.app')
@section('content')

<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Master Rekening</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">M-Pay</li>
              <li class="breadcrumb-item active">Master Rekening</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Master Rekening</h5>
              {{-- <span>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</span> --}}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display" id="basic-1">
                  <thead>
                    <tr class="text-center">
                        {{-- <th class="text-center">No</th> --}}
                        <th>Cabang</th>
                        <th>Faktur</th>
                        <th>Rekening</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Saldo Mutasi</th>
                        <th>Username</th>
                        <th>Date Time</th>
                        {{-- <th>Status</th>
                        <th>Action</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                        <td>001</td>
                        <td>0000288</td>
                        <td>9487302857</td>
                        <td>17-07-1999</td>
                        <td class="text-left">Ciki Ganteng</td>
                        <td>Rp. 17.700.000</td>
                        <td class="align-middle text-center">
                            <div class="badge badge-secondary">14</div>
                        </td>
                        <td class="text-left">17/07/1999 12:22:10</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Zero Configuration  Ends-->
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  @endsection
