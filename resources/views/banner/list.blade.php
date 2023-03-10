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
                            <li class="breadcrumb-item active">Banner</li>
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
                            <h5 class="mb-3">Banner</h5>
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
                                <button class="btn btn-success" type="button" data-bs-toggle="modal" id="datatambah"
                                    data-bs-target="#tambahdata" data-bs-target=".bd-example-modal-lg">Tambah</button>
                            </div><br>
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel -->
                                        @foreach ($data as $banner)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $banner->judul }}</td>
                                                <td>
                                                    <div class="zoom">
                                                        <img id="file" class="profile-user-img img-responsive"
                                                            style="height: 150px; width: auto; display: block; margin: auto;"
                                                            src="{{ url('public/img/banner/' . $banner->gambar) }}"
                                                            alt="Banner">
                                                    </div>
                                                </td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('banner.destroy', $banner->id) }}" method="POST">
                                                        {{-- <button type="button" class="view_data detail btn btn-xs"
                                                            data-id="{{ $banner->id }}" data-judul="{{ $banner->judul }}"
                                                            data-gambar="{{ $banner->gambar }}" onclick="detail()"
                                                            data-toggle="modal" data-target="#lihatdata">
                                                            <a class="view_data btn btn-xs btn-outline-primary"> <i
                                                                    data-feather="info"></i>
                                                            </a>
                                                        </button> --}}
                                                        <a href="{{ route('banner.edit', $banner->id) }}"
                                                            class="btn btn-xs btn-outline-warning"
                                                            style="margin-right: -10px;margin-left: -10px"><i
                                                                data-feather="edit"></i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-xs" type="submit"><a
                                                                class="btn btn-xs btn-outline-danger"><i
                                                                    data-feather="trash-2"></i></a></button>
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

    <!-- Modal tambah data -->
    <div id="tambahdata" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('banner.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" name="judul" placeholder="Masukkan Judul" required>
                                    @error('judul')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="gambar">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" id="file-input"
                                        onchange="imageExtensionValidate(this)" id="gambar" name="gambar"
                                        placeholder="Masukkan Gambar" required>
                                    @error('gambar')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            {{-- <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                            data-action='submit'>Submit</button> --}}
                            <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Submit</button>
                            <button class="btn btn-outline-dark m-t-15 waves-effect" type="button"
                                data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View Detail data -->
    <div id="lihatdata" class="lihatdata modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Detail Data</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="gambar">Gambar</label>
                                <input type="text" class="form-control" id="gambar" name="gambar"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        {{-- <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                            data-action='submit'>Submit</button> --}}
                        <button class="btn btn-outline-dark m-t-15 waves-effect" type="button" data-bs-dismiss="modal"
                            data-bs-original-title="" title="">Close</button>
                    </div>
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
            $("#lihatdata").find("#judul").attr("value", $(this).data('judul'));
            $("#lihatdata").find("#gambar").attr("value", $(this).data('gambar'));
        })
    }
</script>
