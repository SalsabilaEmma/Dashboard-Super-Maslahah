@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        {{-- <h3 class="mb-3">Pegawai</h3> --}}
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Pegawai</a></li>
                            <li class="breadcrumb-item active">Edit Pegawai</li>
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
                            <h5 class="mb-3">Edit Pegawai</h5>
                            {{-- <span>The Responsive extension for DataTables</span> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pegawai.update', $dataPegawai->id) }}" method="POST"
                                id="recaptcha-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nip">NIP</label>
                                            <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                                id="nip" name="nip" placeholder="Masukkan NIP" required value="{{ $dataPegawai->nip }}">
                                            @error('nip')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="noKtp">No KTP</label>
                                            <input type="number" class="form-control @error('noKtp') is-invalid @enderror"
                                                id="noKtp" name="noKtp" placeholder="Masukkan No KTP" required value="{{ $dataPegawai->noKtp }}">
                                            @error('noKtp')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama Pegawai</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" placeholder="Masukkan Nama Pegawai" required value="{{ $dataPegawai->nama }}">
                                            @error('nama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="ttl">Tanggal Lahir</label>
                                            <input type="date" class="form-control @error('ttl') is-invalid @enderror"
                                                id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" required value="{{ $dataPegawai->ttl }}">
                                            @error('ttl')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
                                            <select class="form-select digits @error('jenisKelamin') is-invalid @enderror"
                                                name="jenisKelamin" id="jenisKelamin" value="{{ $dataPegawai->jenisKelamin }}">
                                                <option selected hidden value="">{{ $dataPegawai->jenisKelamin }}</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenisKelamin')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="statusPerkawinan">Status Perkawinan</label>
                                            <select class="form-select digits @error('statusPerkawinan') is-invalid @enderror"
                                                name="statusPerkawinan" id="statusPerkawinan" value="{{ $dataPegawai->statusPerkawinan }}">
                                                <option selected hidden value="">{{ $dataPegawai->statusPerkawinan }}</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                            </select>
                                            @error('statusPerkawinan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="telepon">Telepon</label>
                                            <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                                id="telepon" name="telepon" placeholder="Masukkan Telepon" required value="{{ $dataPegawai->telepon }}">
                                            @error('telepon')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" placeholder="Masukkan Alamat" required value="{{ $dataPegawai->alamat }}">
                                            @error('alamat')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="tglMasuk">Tanggal Masuk</label>
                                            <input type="date" class="form-control @error('tglMasuk') is-invalid @enderror"
                                                id="tglMasuk" name="tglMasuk" placeholder="Masukkan Tanggal Masuk" required value="{{ $dataPegawai->tglMasuk }}">
                                            @error('tglMasuk')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="penempatan">Penempatan</label>
                                            <input type="text" class="form-control @error('penempatan') is-invalid @enderror"
                                                id="penempatan" name="penempatan" placeholder="Masukkan Penempatan" required value="{{ $dataPegawai->penempatan }}">
                                            @error('penempatan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                                id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" required value="{{ $dataPegawai->jabatan }}">
                                            @error('jabatan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="kantor">Kantor</label>
                                            <input type="text" class="form-control @error('kantor') is-invalid @enderror"
                                                id="kantor" name="kantor" placeholder="Masukkan Kantor" required value="{{ $dataPegawai->kantor }}">
                                            @error('kantor')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="statusPegawai">Status Pegawai</label>
                                            <select class="form-select digits @error('statusPegawai') is-invalid @enderror"
                                                name="statusPegawai" id="statusPegawai" value="{{ $dataPegawai->statusPegawai }}">
                                                <option selected hidden value="">{{ $dataPegawai->statusPegawai }}</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                                {{-- <option value="PKWT">Perjanjian Kerja Waktu Tertentu (PKWT)</option>
                                                <option value="PKWTT">Perjanjian Kerja Waktu Tak Tertentu (PKWTT)</option> --}}
                                            </select>
                                            @error('statusPegawai')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="rekeningTabungan">Rekening Tabungan</label>
                                            <input type="text"
                                                class="form-control @error('rekeningTabungan') is-invalid @enderror"
                                                id="rekeningTabungan" name="rekeningTabungan"
                                                placeholder="Masukkan Rekening Tabungan" required value="{{ $dataPegawai->rekeningTabungan }}">
                                            @error('rekeningTabungan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    {{-- <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                    data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                    data-action='submit'>Submit</button> --}}
                                    <button type="submit"
                                        class="btn btn-outline-primary m-t-15 waves-effect">Simpan</button>
                                    <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                        data-dismiss="modal"><a href="{{ route('pegawai') }}">Kembali</a></button>
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
