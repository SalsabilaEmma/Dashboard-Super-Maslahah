@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item">Extension Data Tables</li> --}}
                            <li class="breadcrumb-item active">Data Tugas Pegawai</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-3">Data Tugas Pegawai</h5>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success, </strong> {{ $message }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                                        data-bs-original-title="" title=""></button>
                                </div>
                            @elseif ($message = Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div>
                                <a href="{{ route('tugasPegawai.add') }}" class="btn btn-success" type="button" id="datatambah">Tambah Data</a>
                            </div><br>
                            <br>
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Judul</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel -->
                                        @foreach ($data as $tugasPegawai)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $tugasPegawai->namaUserRequest }}</td>
                                                <td>{{ $tugasPegawai->judul }}</td>
                                                <td>{{ $tugasPegawai->priority }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('tugasPegawai.destroy', $tugasPegawai->id) }}"
                                                        method="POST">
                                                        <button type="button" class="view_data detail btn btn-xs"
                                                            data-id="{{ $tugasPegawai->id }}"
                                                            data-status="{{ $tugasPegawai->status }}" onclick="detail()"
                                                            data-toggle="modal" data-target="#lihatdata">
                                                            <a class="view_data btn btn-xs btn-outline-warning"> <i
                                                                    data-feather="edit"></i>
                                                            </a>
                                                        </button>
                                                        {{-- <a href="{{ route('tugasPegawai.edit', $tugasPegawai->id) }}"
                                                                class="btn btn-xs btn-outline-warning"
                                                                style="margin-right: -10px;margin-left: -10px"><i
                                                                    data-feather="edit"></i>
                                                            </a> --}}
                                                        {{-- @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-xs" type="submit"><a
                                                                    class="btn btn-xs btn-outline-danger"><i
                                                                        data-feather="trash-2"></i></a></button> --}}
                                                    </form>
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
        <!-- Container-fluid Ends-->
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    function detail() {
        $(document).on('click', '.view_data', function(e) {
            $('#lihatdata').modal('show');
            $("#lihatdata").find("#id").attr("value", $(this).data('id'));
            $("#lihatdata").find("#status").attr("value", $(this).data('status'));
            console.log($(this).data('id'));
        })
    }
</script>
