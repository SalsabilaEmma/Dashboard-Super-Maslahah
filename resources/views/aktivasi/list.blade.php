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
                            {{-- <li class="breadcrumb-item">Extension Data Tables</li> --}}
                            <li class="breadcrumb-item active">Aktivasi</li>
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
                            <h5 class="mb-3">Aktivasi</h5>
                            {{-- <span>The Responsive extension for DataTables</span> --}}
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
                                <a href="{{ route('aktivasi.add') }}" class="btn btn-success" type="button" id="datatambah">Tambah Data</a>
                            </div><br>
                            {{-- <div>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal" id="datatambah"
                                    data-bs-target="#tambahdata" data-bs-target=".bd-example-modal-lg">Tambah</button>
                            </div><br> --}}
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>CIF</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Kode Unik</th>
                                            <th>Status Aktivasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel -->
                                        @foreach ($data as $aktivasi)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $aktivasi->cif }}</td>
                                                <td>{{ $aktivasi->pegawai->nama }}</td>
                                                <td>{{ $aktivasi->pegawai->telepon }}</td>
                                                <td>{{ $aktivasi->kodeUnik }}</td>
                                                <td class="text-center">
                                                    @if ($aktivasi->statusAktivasi == 'Aktif')
                                                        <a class="btn btn-pill btn-success btn-air-success btn-sm"
                                                            type="button" title="">
                                                            {{ $aktivasi->statusAktivasi }}</a>
                                                    @elseif ($aktivasi->statusAktivasi == 'Tidak Aktif')
                                                        <a class="btn btn-pill btn-danger btn-air-warning btn-sm"
                                                            type="button" title="">
                                                            {{ $aktivasi->statusAktivasi }}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('aktivasi.destroy', $aktivasi->id) }}"
                                                        method="POST">
                                                        <button type="button" class="view_data detail btn btn-xs"
                                                            data-id="{{ $aktivasi->id }}" data-cif="{{ $aktivasi->cif }}"
                                                            data-nip="{{ $aktivasi->pegawai->nip }}"
                                                            data-ttl="{{ $aktivasi->pegawai->ttl }}"
                                                            data-telepon="{{ $aktivasi->pegawai->telepon }}"
                                                            data-noKtp="{{ $aktivasi->pegawai->noKtp }}"
                                                            data-tipeHp="{{ $aktivasi->tipeHp }}"
                                                            data-statusAktivasi="{{ $aktivasi->statusAktivasi }}"
                                                            data-kodeUnik="{{ $aktivasi->kodeUnik }}"
                                                            data-aksesAbsen="{{ $aktivasi->aksesAbsen }}"
                                                            data-aksesMpay="{{ $aktivasi->aksesMpay }}"
                                                            data-aksesKpai="{{ $aktivasi->aksesKpai }}"
                                                            data-aksesKunKer="{{ $aktivasi->aksesKunKer }}"
                                                            data-aksesListPekerjaan="{{ $aktivasi->aksesListPekerjaan }}"
                                                            onclick="detail()" data-toggle="modal" data-target="#lihatdata">
                                                            <a class="view_data btn btn-xs btn-outline-primary"> <i
                                                                    data-feather="info"></i>
                                                            </a>
                                                        </button>
                                                        <a href="{{ route('aktivasi.edit', $aktivasi->id) }}"
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
                                    {{-- <tfoot>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>CIF</th>
                                            <th>NIP</th>
                                            <th>No HP</th>
                                            <th>Kode Unik</th>
                                            <th>Status Aktivasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
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
                    <form action="{{ route('aktivasi.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="cif">CIF</label>
                                    <input type="number" class="form-control @error('cif') is-invalid @enderror"
                                        id="cif" name="cif" placeholder="Masukkan CIF" required>
                                    @error('cif')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="nip">NIP</label>
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                        id="nip" name="nip" placeholder="Masukkan NIP" required>
                                    @error('nip')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="telepon">No HP</label>
                                    <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                        id="telepon" name="telepon" placeholder="Masukkan No HP" required>
                                    @error('telepon')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="tipeHp">Tipe HP</label>
                                    <input type="text" class="form-control @error('tipeHp') is-invalid @enderror"
                                        id="tipeHp" name="tipeHp" placeholder="Masukkan Tipe HP" required>
                                    @error('tipeHp')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="ttl">Tanggal Lahir</label>
                                    <input class="datepicker-here form-control digits @error('ttl') is-invalid @enderror"
                                        type="text" data-language="en" id="ttl" name="ttl"
                                        placeholder="Masukkan Tanggal Lahir" required>
                                    {{-- <input type="date" class="form-control @error('ttl') is-invalid @enderror"
                                        id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" required> --}}
                                    @error('ttl')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="kodeUnik">Kode Unik</label>
                                    <input type="text" class="form-control @error('kodeUnik') is-invalid @enderror"
                                        id="kodeUnik" name="kodeUnik" placeholder="Masukkan Kode Unik" required>
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
                                    <select class="form-select digits @error('statusAktivasi') is-invalid @enderror"
                                        name="statusAktivasi" id="statusAktivasi">
                                        <option selected hidden value=""> -Pilih Status- </option>
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
                                    <input type="text" class="form-control @error('aksesAbsen') is-invalid @enderror"
                                        id="aksesAbsen" name="aksesAbsen" placeholder="Masukkan Akses Absen" required>
                                    @error('aksesAbsen')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="aksesMpay">Akses M-Pay</label>
                                    <input type="text" class="form-control @error('aksesMpay') is-invalid @enderror"
                                        id="aksesMpay" name="aksesMpay" placeholder="Masukkan Akses M-Pay" required>
                                    @error('aksesMpay')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label" for="aksesKpai">Akses KPAI</label>
                                    <input type="text" class="form-control @error('aksesKpai') is-invalid @enderror"
                                        id="aksesKpai" name="aksesKpai" placeholder="Masukkan Akses KPAI" required>
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
                                    <input type="text" class="form-control @error('aksesKunKer') is-invalid @enderror"
                                        id="aksesKunKer" name="aksesKunKer" placeholder="Masukkan Akses Kunjungan Kerja"
                                        required>
                                    @error('aksesKunKer')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="aksesListPekerjaan">Akses List Pekerjaan</label>
                                    <input type="text"
                                        class="form-control @error('aksesListPekerjaan') is-invalid @enderror"
                                        id="aksesListPekerjaan" name="aksesListPekerjaan"
                                        placeholder="Masukkan Akses List Pekerjaan" required>
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
                    @if (isset($aktivasi))
                        <form action="{{ route('aktivasi.storeStatus', $aktivasi->id) }}" method="POST"
                            id="recaptcha-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="cif">CIF</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="cif"
                                            name="cif" placeholder="Masukkan CIF" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nip">NIP</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="number" class="form-control" readonly id="nip"
                                            name="nip" placeholder="Masukkan NIP" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="noKtp">No KTP</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="number" class="form-control" readonly id="noKtp"
                                            name="noKtp" placeholder="Masukkan No KTP" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="telepon">No HP</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="number" class="form-control" readonly id="telepon"
                                            name="telepon" placeholder="Masukkan No HP" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tipeHp">Tipe HP</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="tipeHp"
                                            name="tipeHp" placeholder="Masukkan Tipe HP" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="ttl">Tanggal Lahir</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="date" class="form-control" readonly id="ttl"
                                            name="ttl" placeholder="Masukkan Tanggal Lahir" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="kodeUnik">Kode Unik</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="kodeUnik"
                                            name="kodeUnik" placeholder="Masukkan Kode Unik" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="statusAktivasi">Ubah Status Aktivasi</label>
                                        <input type="hidden" name="id" id="id">
                                        {{-- <input type="text" class="form-control" readonly id="statusAktivasi"
                                        name="statusAktivasi" placeholder="Masukkan Status Aktivasi" required> --}}
                                        <select class="form-select digits" name="statusAktivasi">
                                            <option selected hidden id="statusAktivasi">{{ $aktivasi->statusAktivasi }}
                                            </option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="aksesAbsen">Akses Absen</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="aksesAbsen"
                                            name="aksesAbsen" placeholder="Masukkan Akses Absen" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="aksesMpay">Akses M-Pay</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="aksesMpay"
                                            name="aksesMpay" placeholder="Masukkan Akses M-Pay" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="aksesKpai">Akses KPAI</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="aksesKpai"
                                            name="aksesKpai" placeholder="Masukkan Akses KPAI" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="aksesKunKer">Akses Kunjungan Kerja</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="aksesKunKer"
                                            name="aksesKunKer" placeholder="Masukkan Akses Kunjungan Kerja" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="aksesListPekerjaan">Akses List Pekerjaan</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" readonly id="aksesListPekerjaan"
                                            name="aksesListPekerjaan" placeholder="Masukkan Akses List Pekerjaan"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                {{-- <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                data-action='submit'>Submit</button> --}}
                                <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Simpan
                                    Status</button>
                                <button class="btn btn-outline-dark m-t-15 waves-effect" type="button"
                                    data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                            </div>
                        </form>
                    {{-- @else --}}
                    @endif
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
            $("#lihatdata").find("#cif").attr("value", $(this).data('cif'));
            $("#lihatdata").find("#nip").attr("value", $(this).data('nip'));
            $("#lihatdata").find("#ttl").attr("value", $(this).data('ttl'));
            $("#lihatdata").find("#telepon").attr("value", $(this).data('telepon'));
            $("#lihatdata").find("#noktp").attr("value", $(this).data('noktp'));
            $("#lihatdata").find("#tipehp").attr("value", $(this).data('tipehp'));
            $("#lihatdata").find("#statusaktivasi").attr("value", $(this).data('statusaktivasi'));
            $("#lihatdata").find("#kodeunik").attr("value", $(this).data('kodeunik'));
            $("#lihatdata").find("#aksesabsen").attr("value", $(this).data('aksesabsen'));
            $("#lihatdata").find("#aksesmpay").attr("value", $(this).data('aksesmpay'));
            $("#lihatdata").find("#akseskpai").attr("value", $(this).data('akseskpai'));
            $("#lihatdata").find("#akseskunker").attr("value", $(this).data('akseskunker'));
            $("#lihatdata").find("#akseslistpekerjaan").attr("value", $(this).data('akseslistpekerjaan'));
            console.log($(this).data());
        })
    }
</script>
{{--
<script>
    $(document).ready(function() {
        $('#datatambah').click(function() {
            $('#tambahdata').modal({
                backdrop: 'static'
            });
        });
    });
</script> --}}
