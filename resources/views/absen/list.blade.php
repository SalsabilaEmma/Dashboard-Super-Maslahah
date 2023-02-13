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
                            <li class="breadcrumb-item active">Absensi</li>
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
                            <h5 class="mb-3">Absensi</h5>
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
                            {{-- <div>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal" id="datatambah"
                                    data-bs-target="#tambahdata" data-bs-target=".bd-example-modal-lg">Tambah</button>
                            </div><br> --}}
                            <div>
                                <a href="{{ route('absensi.add') }}" class="btn btn-success" type="button" id="datatambah">Tambah Data</a>
                            </div><br>
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Status Kehadiran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel -->
                                        @foreach ($data as $absensi)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ date('d/m/Y', strtotime($absensi->tanggal)) }}</td>
                                                <td>{{ $absensi->pegawai->nip }}</td>
                                                <td>{{ $absensi->pegawai->nama }}</td>
                                                <td>{{ $absensi->status }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('absensi.destroy', $absensi->id) }}"
                                                        method="POST">
                                                        <button type="button" class="view_data detail btn btn-xs"
                                                            data-id="{{ $absensi->id }}"
                                                            data-tanggal="{{ $absensi->tanggal }}"
                                                            data-nip="{{ $absensi->pegawai->nip }}"
                                                            data-nama="{{ $absensi->pegawai->nama }}"
                                                            data-status="{{ $absensi->status }}"
                                                            data-jamMasuk="{{ $absensi->jamMasuk }}"
                                                            data-jamPulang="{{ $absensi->jamPulang }}"
                                                            data-long="{{ $absensi->long }}"
                                                            data-lat="{{ $absensi->lat }}" {{-- data-created_at="{{ $absensi->created_at }}"  --}}
                                                            onclick="detail()" data-toggle="modal" data-target="#lihatdata">
                                                            <a class="view_data btn btn-xs btn-outline-primary"> <i
                                                                    data-feather="info"></i>
                                                            </a>
                                                        </button>
                                                        <a href="{{ route('absensi.edit', $absensi->id) }}"
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
    <!-- <div id="tambahdata" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('absensi.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nip">NIP</label>
                                    <input type="text" name="nip" id="nip" required readonly value=""
                                        class="form-control">
                                    @error('nip')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Pegawai</label>
                                    {{-- <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" placeholder="Masukkan Nama Pegawai" required> --}}
                                    {{-- <select class="form-select digits @error('nama') is-invalid @enderror"
                                        data-live-search="true" name="nama" required id="nama">
                                        <option selected hidden value=""> -Pilih Nama Pegawai- </option>
                                        @foreach ($dataPegawai as $pegawai)
                                            <option value="{{ $pegawai->nama }}">{{ $pegawai->nama }}</option>
                                        @endforeach
                                    </select> --}}
                                    <select
                                        class="js-example-disabled-results form-select digits @error('nama') is-invalid @enderror"
                                        required name="nama" required id="nama">
                                        <option selected hidden value=""> -Pilih Nama Pegawai- </option>
                                        @foreach ($dataPegawai as $pegawai)
                                            <option value="{{ $pegawai->nama }}">{{ $pegawai->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    {{-- <input
                                        class="datepicker-here form-control digits @error('tanggal') is-invalid @enderror"
                                        type="text" data-language="en" id="tanggal" name="tanggal" required
                                        placeholder="Masukkan Tanggal"> --}}
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" required>
                                    @error('tanggal')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="status">Status Kehadiran</label>
                                    <select class="form-select digits @error('status') is-invalid @enderror"
                                        name="status" id="status">
                                        <option selected hidden value=""> -Pilih Status Kehadiran- </option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                    </select>
                                    @error('status')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jamMasuk">Jam Masuk</label>
                                    {{-- <div class="input-group clockpicker pull-center" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <input class="form-control" type="text" value=""><span
                                            class="input-group-addon"><span
                                                class="glyphicon glyphicon-time"></span></span>
                                    </div> --}}
                                    <input type="time" class="form-control @error('jamMasuk') is-invalid @enderror"
                                        id="jamMasuk" name="jamMasuk" placeholder="Masukkan Jam Masuk">
                                    @error('jamMasuk')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jamPulang">Jam Pulang</label>
                                    <input type="time" class="form-control @error('jamPulang') is-invalid @enderror"
                                        id="jamPulang" name="jamPulang" placeholder="Masukkan Jam Pulang">
                                    @error('jamPulang')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="long">Longitude</label>
                                    <input type="text" class="form-control @error('long') is-invalid @enderror"
                                        id="long" name="long" placeholder="Masukkan Tanggal Masuk" required>
                                    @error('long')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="lat">Latitude</label>
                                    <input type="text" class="form-control @error('lat') is-invalid @enderror"
                                        id="lat" name="lat" placeholder="Masukkan Latitude" required>
                                    @error('lat')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="text-right">
                            <input type="hidden" name="idPegawai" value="{{ $pegawai->id }}">
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
    </div> -->

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
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="created_at">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" name="tanggal" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="status">Status Kehadiran</label>
                                <input type="text" class="form-control" id="status" name="status" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="jamMasuk">Jam Masuk</label>
                                <input type="text" class="form-control" id="jamMasuk" name="jamMasuk"
                                    value="" required readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" for="jamPulang">Jam Pulang</label>
                                <input type="text" class="form-control" id="jamPulang" name="jamPulang" required
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="long">Longitude</label>
                                <input type="text" class="form-control" id="long" name="long" required
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="lat">Latitude</label>
                                <input type="text" class="form-control" id="lat" name="lat" required
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
            // $("#lihatdata").find("#tanggal").attr("value", $(this).data('tanggal'));
            $("#lihatdata").find("#nip").attr("value", $(this).data('nip'));
            $("#lihatdata").find("#nama").attr("value", $(this).data('nama'));
            $("#lihatdata").find("#status").attr("value", $(this).data('status'));
            $("#lihatdata").find("#jamMasuk").attr("value", $(this).data('jammasuk'));
            $("#lihatdata").find("#jamPulang").attr("value", $(this).data('jampulang'));
            $("#lihatdata").find("#long").attr("value", $(this).data('long'));
            $("#lihatdata").find("#lat").attr("value", $(this).data('lat'));
            var tanggal = $(this).data('tanggal');
            var date = new Date(tanggal);
            console.log(date.toLocaleDateString("id-ID"));
            $("#lihatdata").find("#tanggal").attr("value", date.toLocaleDateString("id-ID"));

        })
    }
</script>

<script>
    $(document).ready(function() {
        $('#nama').on('change', function() {
            var nama = $(this).val();
            // console.log(nama);
            $.ajax({
                url: "{{ route('getDataPegawai') }}",
                type: 'GET',
                data: {
                    nama: nama
                },
                success: function(data) {
                    $('#nip').val(data.nip);
                    // console.log('alo');
                }
            });
        });
    });
</script>
