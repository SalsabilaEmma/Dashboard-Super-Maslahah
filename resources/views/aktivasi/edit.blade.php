@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        {{-- <h3 class="mb-3">Aktivasi</h3> --}}
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('aktivasi') }}">Aktivasi</a></li>
                            <li class="breadcrumb-item active">Edit Aktivasi</li>
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
                            <h5 class="mb-3">Edit Aktivasi</h5>
                            {{-- <span>The Responsive extension for DataTables</span> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('aktivasi.update', $dataAktivasi->id) }}" method="POST"
                                id="recaptcha-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="cif">CIF</label>
                                            <input type="number" class="form-control @error('cif') is-invalid @enderror"
                                                id="cif" name="cif" value="{{ $dataAktivasi->cif }}" required>
                                            @error('cif')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nip">NIP</label>
                                            <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                                id="nip" name="nip" value="{{ $dataAktivasi->pegawai->nip }}" required readonly>
                                            @error('nip')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama Pegawai</label>
                                            <select
                                                class="js-example-disabled-results form-select digits @error('nama') is-invalid @enderror"
                                                required name="nipPegawai" required id="nama">
                                                <option selected hidden value="{{ $dataAktivasi->pegawai->nama }}" disabled="disabled"> {{ $dataAktivasi->pegawai->nama }} - {{ $dataAktivasi->pegawai->nip }}</option>
                                                @foreach ($dataPegawai as $pegawai)
                                                    <option value="{{ $pegawai->nip }}">{{ $pegawai->nama }} -
                                                        {{ $pegawai->nip }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="noKtp">No KTP</label>
                                            <input type="number" class="form-control @error('noKtp') is-invalid @enderror"
                                                id="noKtp" name="noKtp" value="{{ $dataAktivasi->pegawai->noKtp }}" required
                                                readonly>
                                            @error('noKtp')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="telepon">No HP</label>
                                            <input type="number"
                                                class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                                name="telepon" value="{{ $dataAktivasi->pegawai->telepon }}" required readonly>
                                            @error('telepon')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="tglLahir">Tanggal Lahir</label>
                                            {{-- <input
                                                class="datepicker-here form-control digits @error('tglLahir') is-invalid @enderror"
                                                type="text" data-language="en" id="tglLahir" name="tglLahir"
                                                placeholder="Masukkan Tanggal Lahir" required readonly> --}}
                                            <input type="text"
                                                class="form-control @error('tglLahir') is-invalid @enderror" id="tglLahir"
                                                name="tglLahir" readonly value="{{ $dataAktivasi->pegawai->tglLahir }}" required>
                                            @error('tglLahir')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="tipeHp">Tipe HP</label>
                                            <input type="text" class="form-control @error('tipeHp') is-invalid @enderror"
                                                id="tipeHp" name="tipeHp" value="{{ $dataAktivasi->tipeHp }}" required>
                                            @error('tipeHp')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="kodeUnik">Kode Unik</label>
                                            <input type="text"
                                                class="form-control @error('kodeUnik') is-invalid @enderror" id="kodeUnik"
                                                name="kodeUnik" value="{{ $dataAktivasi->kodeUnik }}" required>
                                            @error('kodeUnik')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="statusAktivasi">Status Aktivasi</label>
                                            {{-- <input type="text" class="form-control @error('statusAktivasi') is-invalid @enderror"
                                                id="statusAktivasi" name="statusAktivasi" placeholder="Masukkan Status Aktivasi"
                                                required> --}}
                                            <select
                                                class="form-select digits @error('statusAktivasi') is-invalid @enderror"
                                                name="statusAktivasi" id="statusAktivasi">
                                                <option selected hidden value="{{ $dataAktivasi->statusAktivasi }}">{{ $dataAktivasi->statusAktivasi }}
                                                </option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                            @error('statusAktivasi')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="aksesAbsen">Akses Absen</label>
                                            <input type="text"
                                                class="form-control @error('aksesAbsen') is-invalid @enderror"
                                                id="aksesAbsen" name="aksesAbsen"
                                                value="{{ $dataAktivasi->aksesAbsen }}" required>
                                            @error('aksesAbsen')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="aksesMpay">Akses M-Pay</label>
                                            <input type="text"
                                                class="form-control @error('aksesMpay') is-invalid @enderror"
                                                id="aksesMpay" name="aksesMpay" value="{{ $dataAktivasi->aksesMpay }}"
                                                required>
                                            @error('aksesMpay')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="aksesKpai">Akses KPAI</label>
                                            <input type="text"
                                                class="form-control @error('aksesKpai') is-invalid @enderror"
                                                id="aksesKpai" name="aksesKpai" value="{{ $dataAktivasi->aksesKpai }}"
                                                required>
                                            @error('aksesKpai')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="aksesKunKer">Akses Kunjungan Kerja</label>
                                            <input type="text"
                                                class="form-control @error('aksesKunKer') is-invalid @enderror"
                                                id="aksesKunKer" name="aksesKunKer"
                                                value="{{ $dataAktivasi->aksesKunKer }}" required>
                                            @error('aksesKunKer')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="aksesListPekerjaan">Akses List
                                                Pekerjaan</label>
                                            <input type="text"
                                                class="form-control @error('aksesListPekerjaan') is-invalid @enderror"
                                                id="aksesListPekerjaan" name="aksesListPekerjaan"
                                                value="{{ $dataAktivasi->aksesListPekerjaan }}" required>
                                            @error('aksesListPekerjaan')
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
                                        data-dismiss="modal"><a href="{{ route('aktivasi') }}">Kembali</a></button>
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
        $('#nama').on('change', function() {
            var nip = $(this).val();
            // console.log(nip);
            $.ajax({
                url: "{{ route('getDataPegawai') }}",
                type: 'GET',
                data: {
                    nip: nip
                },
                success: function(data) {
                    $('#nip').val(data.nip);
                    $('#noKtp').val(data.noKtp);
                    $('#telepon').val(data.telepon);
                    // $('#tglLahir').val(data.tglLahir);
                    var date = new Date(data.tglLahir);
                    var formattedDate = date.getDate() + "-" + (date.getMonth() + 1) + "-" +
                        date.getFullYear();
                    $('#tglLahir').val(formattedDate);
                }
            });
        });
    });
</script>
