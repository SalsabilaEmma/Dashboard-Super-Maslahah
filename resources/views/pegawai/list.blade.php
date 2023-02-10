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
                            <li class="breadcrumb-item active">Pegawai</li>
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
                            <h5 class="mb-3">Pegawai</h5>
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
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Penempatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel -->
                                        @foreach ($data as $pegawai)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $pegawai->nip }}</td>
                                                <td>{{ $pegawai->nama }}</td>
                                                <td>{{ $pegawai->jabatan }}</td>
                                                <td>{{ $pegawai->penempatan }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('pegawai.destroy', $pegawai->id) }}"
                                                        method="POST">
                                                        <button type="button" class="view_data detail btn btn-xs"
                                                            data-id="{{ $pegawai->id }}" data-nip="{{ $pegawai->nip }}"
                                                            data-nama="{{ $pegawai->nama }}"
                                                            data-jeniskelamin="{{ $pegawai->jenisKelamin }}"
                                                            data-noKtp="{{ $pegawai->noKtp }}"
                                                            data-ttl="{{ $pegawai->ttl }}"
                                                            data-statusperkawinan="{{ $pegawai->statusPerkawinan }}"
                                                            data-alamat="{{ $pegawai->alamat }}"
                                                            data-telepon="{{ $pegawai->telepon }}"
                                                            data-tglmasuk="{{ $pegawai->tglMasuk }}"
                                                            data-rekeningtabungan="{{ $pegawai->rekeningTabungan }}"
                                                            data-penempatan="{{ $pegawai->penempatan }}"
                                                            data-statuspegawai="{{ $pegawai->statusPegawai }}"
                                                            data-jabatan="{{ $pegawai->jabatan }}"
                                                            data-kantor="{{ $pegawai->kantor }}" onclick="detail()"
                                                            data-toggle="modal" data-target="#lihatdata">
                                                            <a class="view_data btn btn-xs btn-outline-primary"> <i
                                                                    data-feather="info"></i>
                                                            </a>
                                                        </button>
                                                        <a href="{{ route('pegawai.edit', $pegawai->id) }}"
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
                    <form action="{{ route('pegawai.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nip">NIP</label>
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                        id="nip" name="nip" placeholder="Masukkan NIP" required>
                                    @error('nip')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="noKtp">No KTP</label>
                                    <input type="number" class="form-control @error('noKtp') is-invalid @enderror"
                                        id="noKtp" name="noKtp" placeholder="Masukkan No KTP" required>
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
                                        id="nama" name="nama" placeholder="Masukkan Nama Pegawai" required>
                                    @error('nama')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="ttl">Tanggal Lahir</label>
                                    <input class="datepicker-here form-control digits @error('ttl') is-invalid @enderror" type="text" data-language="en" id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" required>
                                    {{-- <input type="date" class="form-control @error('ttl') is-invalid @enderror"
                                        id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" required> --}}
                                    @error('ttl')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="tipeHp">Jenis Kelamin</label>
                                    <select class="form-select digits @error('jenisKelamin') is-invalid @enderror"
                                        name="jenisKelamin" id="jenisKelamin">
                                        <option selected hidden value=""> -Pilih Jenis Kelamin- </option>
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
                                        name="statusPerkawinan" id="statusPerkawinan">
                                        <option selected hidden value=""> -Pilih Status- </option>
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
                                        id="telepon" name="telepon" placeholder="Masukkan Telepon" required>
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
                                        id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
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
                                    <input class="datepicker-here form-control digits @error('tglMasuk') is-invalid @enderror" type="text" data-language="en" id="tglMasuk" name="tglMasuk" placeholder="Masukkan Tanggal Masuk" required>
                                    {{-- <input type="date" class="form-control @error('tglMasuk') is-invalid @enderror"
                                        id="tglMasuk" name="tglMasuk" placeholder="Masukkan Tanggal Masuk" required> --}}
                                    @error('tglMasuk')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="penempatan">Penempatan</label>
                                    <input type="text" class="form-control @error('penempatan') is-invalid @enderror"
                                        id="penempatan" name="penempatan" placeholder="Masukkan Penempatan" required>
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
                                        id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" required>
                                    @error('jabatan')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="kantor">Kantor</label>
                                    <input type="text" class="form-control @error('kantor') is-invalid @enderror"
                                        id="kantor" name="kantor" placeholder="Masukkan Kantor" required>
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
                                        name="statusPegawai" id="statusPegawai">
                                        <option selected hidden value=""> -Pilih Status Pegawai- </option>
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
                                        placeholder="Masukkan Rekening Tabungan" required>
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
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="noKtp">No KTP</label>
                                <input type="text" class="form-control" id="noKtp" name="noKtp" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama" name="nama" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="ttl">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="ttl" name="ttl" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenisKelamin" name="jenisKelamin" value="" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="statusPerkawinan">Status Perkawinan</label>
                                <input type="text" class="form-control" id="statusPerkawinan" name="statusPerkawinan" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="tglMasuk">Tanggal Masuk</label>
                                <input type="text" class="form-control" id="tglMasuk" name="tglMasuk" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="penempatan">Penempatan</label>
                                <input type="text" class="form-control" id="penempatan" name="penempatan" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="kantor">Kantor</label>
                                <input type="text" class="form-control" id="kantor" name="kantor" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="statusPegawai">Status Pegawai</label>
                                <input type="text" class="form-control" id="statusPegawai" name="statusPegawai" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="rekeningTabungan">Rekening Tabungan</label>
                                <input type="text" class="form-control" id="rekeningTabungan" name="rekeningTabungan" required readonly>
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
            $("#lihatdata").find("#nip").attr("value", $(this).data('nip'));
            $("#lihatdata").find("#nama").attr("value", $(this).data('nama'));
            $("#lihatdata").find("#ttl").attr("value", $(this).data('ttl'));
            $("#lihatdata").find("#jenisKelamin").attr("value", $(this).data('jeniskelamin'));
            $("#lihatdata").find("#noktp").attr("value", $(this).data('noktp'));
            $("#lihatdata").find("#statusPerkawinan").attr("value", $(this).data('statusperkawinan'));
            $("#lihatdata").find("#alamat").attr("value", $(this).data('alamat'));
            $("#lihatdata").find("#telepon").attr("value", $(this).data('telepon'));
            $("#lihatdata").find("#tglMasuk").attr("value", $(this).data('tglmasuk'));
            $("#lihatdata").find("#rekeningTabungan").attr("value", $(this).data('rekeningtabungan'));
            $("#lihatdata").find("#penempatan").attr("value", $(this).data('penempatan'));
            $("#lihatdata").find("#statusPegawai").attr("value", $(this).data('statuspegawai'));
            $("#lihatdata").find("#jabatan").attr("value", $(this).data('jabatan'));
            $("#lihatdata").find("#kantor").attr("value", $(this).data('kantor'));
            // console.log($(this).data('datastatusperkawinan'));
            // console.log($(this).data());
        })
    }
</script>
