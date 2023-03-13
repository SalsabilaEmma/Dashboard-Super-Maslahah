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
                            <li class="breadcrumb-item active">User Super Maslahah</li>
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
                            <h5 class="mb-3">User Super Maslahah</h5>
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
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>NIP</th>
                                            <th>Telepon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel -->
                                        @foreach ($data as $userSuma)
                                            {{-- @if ($userSuma->role == 'Admin') --}}
                                                <tr class="text-center">
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $userSuma->name }}</td>
                                                    @if ($userSuma->status == 1)
                                                        <td>Aktif</td>
                                                    @else
                                                        <td>Tidak Aktif</td>
                                                    @endif
                                                    <td>{{ $userSuma->nip }}</td>
                                                    <td>{{ $userSuma->telepon }}</td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('userSuma.destroy', $userSuma->id) }}"
                                                            method="POST">
                                                            <button type="button" class="view_data detail btn btn-xs"
                                                                data-id="{{ $userSuma->id }}"
                                                                data-status="{{ $userSuma->status }}" onclick="detail()"
                                                                data-toggle="modal" data-target="#lihatdata">
                                                                <a class="view_data btn btn-xs btn-outline-warning"> <i
                                                                        data-feather="edit"></i>
                                                                </a>
                                                            </button>
                                                            {{-- <a href="{{ route('userSuma.edit', $userSuma->id) }}"
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
                                            {{-- @endif --}}
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

    <!-- Modal View Detail data -->
    <div id="lihatdata" class="lihatdata modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Status</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('userSuma.update', $userSuma->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <input type="hidden" name="id" id="id">
                                    <select class="form-select digits" name="status">
                                        <option selected hidden id="status">
                                            @if ($userSuma->status == '1')
                                                Aktif
                                            @elseif ($userSuma->status == '0')
                                                Tidak Aktif
                                            @endif
                                        </option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            {{-- <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                            data-action='submit'>Submit</button> --}}
                            <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Simpan</button>
                            <button class="btn btn-outline-dark m-t-15 waves-effect" type="button" data-bs-dismiss="modal"
                                data-bs-original-title="" title="">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
