@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        {{-- <h3 class="mb-3">Absensi</h3> --}}
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('absensi') }}">Absensi</a></li>
                            <li class="breadcrumb-item active">Tambah Absensi</li>
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
                            <h5 class="mb-3">Tambah Absensi</h5>
                            {{-- <span>The Responsive extension for DataTables</span> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('absensi.store') }}" method="POST" id="recaptcha-form"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nip">NIP</label>
                                            <input type="text" id="nip" required readonly value=""
                                                class="form-control">
                                            @error('nip')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama Pegawai</label>
                                            <select
                                                class="js-example-disabled-results form-select digits @error('nama') is-invalid @enderror"
                                                required name="nip" required id="pegawai">
                                                <option selected hidden value="" disabled="disabled"> -Pilih Nama
                                                    Pegawai- </option>
                                                @foreach ($dataPegawai as $pegawai)
                                                    <option value="{{ $pegawai->nip }}">{{ $pegawai->nama }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="namaPegawai" id="pegawaiNama" value="">
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
                                                placeholder="{{ $today->format('d-m-Y') }}"> --}}
                                            <input type="date"
                                                class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                                name="tanggal" placeholder="YYYY-MM-DD" value="{{ $timezone }}"
                                                required>
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
                                                <option value="Cuti">Cuti</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                            </select>
                                            @error('status')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="formJam">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="jamMasuk">Jam Masuk</label>
                                            {{-- <div class="input-group clockpicker pull-center" data-placement="bottom"
                                                    data-align="top" data-autoclose="true">
                                                    <input class="form-control" type="text" value="" id="jamMasuk"
                                                        name="jamMasuk" placeholder="Masukkan Jam Masuk"><span
                                                        class="input-group-addon"><span
                                                            class="glyphicon glyphicon-time"></span></span>
                                                </div> --}}
                                            <input type="time"
                                                class="form-control @error('jamMasuk') is-invalid @enderror" id="jamMasuk"
                                                name="jamMasuk" placeholder="{{ $time }}"
                                                value="{{ $time }}">
                                            @error('jamMasuk')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="jamPulang">Jam Pulang</label>
                                            {{-- <div class="input-group clockpicker pull-center" data-placement="bottom"
                                                    data-align="top" data-autoclose="true">
                                                    <input class="form-control" type="text" value="" id="jamPulang"
                                                        name="jamPulang" placeholder="Masukkan Jam Pulang"><span
                                                        class="input-group-addon"><span
                                                            class="glyphicon glyphicon-time"></span></span>
                                                </div> --}}
                                            <input type="time"
                                                class="form-control @error('jamPulang') is-invalid @enderror" id="jamPulang"
                                                name="jamPulang" placeholder="Masukkan Jam Pulang" readonly>
                                            @error('jamPulang')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="formKet">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="ket">Keterangan</label>
                                            <input type="text" class="form-control @error('ket') is-invalid @enderror"
                                                id="ket" name="ket" placeholder="Masukkan Alasan / Keterangan">
                                            @error('ket')
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
                                    {{-- <input type="hidden" name="nipPegawai" value="{{ $pegawai->nip }}"> --}}
                                    {{-- <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                        data-action='submit'>Submit</button> --}}
                                    <button type="submit"
                                        class="btn btn-outline-primary m-t-15 waves-effect">Submit</button>
                                    <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                        data-dismiss="modal"><a href="{{ route('absensi') }}">Kembali</a></button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pegawai').on('change', function() {
            var nip = $(this).val();
            $('#nip').val(nip);

            var namaPegawai = $('#pegawai option:selected').text();
            $('#pegawaiNama').val(namaPegawai);
        });
    });
</script>
<script type='text/javascript'>
    $(window).on('load', function() {
        $('#formJam').hide();
        $("#status").change(function() {
            // console.log($("#status option:selected").val());
            if ($("#status option:selected").val() == 'Hadir') {
                $('#formJam').prop('hidden', false);
                $('#formJam').show();
            } else {
                $('#formJam').prop('hidden', 'true');
            }
        });
    });

    // Keterangan
    $(window).on('load', function() {
        $('#formKet').hide();
        $("#status").change(function() {
            // console.log($("#status option:selected").val());
            if ($("#status option:selected").val() == 'Izin' || $("#status option:selected").val() ==
                'Tanpa Keterangan' || $("#status option:selected").val() == 'Cuti') {
                $('#formKet').prop('hidden', false);
                $('#formKet').show();
            } else {
                $('#formKet').prop('hidden', 'true');
            }
        });
    });
</script>
