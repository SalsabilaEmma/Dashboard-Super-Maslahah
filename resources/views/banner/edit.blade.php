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
                            <li class="breadcrumb-item"><a href="{{ route('banner') }}">Banner</a></li>
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
                            <h5 class="mb-3">Edit Banner</h5>
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
                            <form action="{{ route('banner.update', $dataBanner->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="judul">Judul</label>
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                name="judul" id="judul" value="{{ $dataBanner->judul }}"
                                                placeholder="{{ $dataBanner->judul }}" required>
                                            @error('judul')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="gambar">Gambar Banner</label>
                                            <div class="input-group">
                                                <input type="file" required name="gambar"
                                                    autocomplete="off" accept="image/*" id="file-input"
                                                    onchange="imageExtensionValidate(this)"
                                                    class="form-control @error('gambar') is-invalid @enderror">
                                                @error('gambar')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3"><label>Preview File Lama</label>
                                            <div class="input-group">
                                                <div class="zoom">
                                                    <img id="file" class="profile-user-img img-responsive"
                                                        style="height: 150px; width: auto; display: block; margin: auto;"
                                                        src="{{ url('public/img/banner/' . $dataBanner->gambar) }}"
                                                        alt="Banner">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit"
                                        class="btn btn-outline-primary m-t-15 waves-effect">Simpan</button>
                                        <a href="{{ route('banner') }}"><button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                        data-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
