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
                            <div>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal" id="datatambah"
                                    data-bs-target="#tambahdata" data-bs-target=".bd-example-modal-lg">Tambah</button>
                            </div><br>
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>CIF</th>
                                            <th>NIP</th>
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
                                                <td>{{ $aktivasi->nip }}</td>
                                                <td>{{ $aktivasi->noHp }}</td>
                                                <td>{{ $aktivasi->kodeUnik }}</td>
                                                <td class="text-center">
                                                    @if ($aktivasi->statusAktivasi == 'Aktif')
                                                        <a class="btn btn-pill btn-success btn-air-success btn-sm"
                                                            type="button" title="">
                                                            {{ $aktivasi->statusAktivasi }}</a>
                                                    @elseif ($aktivasi->statusAktivasi == 'Tidak Aktif')
                                                        <a class="btn btn-pill btn-warning btn-air-warning btn-sm"
                                                            type="button" title="">
                                                            {{ $aktivasi->statusAktivasi }}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('aktivasi.destroy', $aktivasi->id) }}"
                                                        method="POST">
                                                        <button type="button" class="detail btn btn-xs"
                                                            data-id="{{ $aktivasi->id }}">
                                                            <a class="btn btn-xs btn-outline-primary"> <i
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
                                    <tfoot>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>CIF</th>
                                            <th>NIP</th>
                                            <th>No HP</th>
                                            <th>Kode Unik</th>
                                            <th>Status Aktivasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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
                                    <input type="text" class="form-control @error('cif') is-invalid @enderror"
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
                                    <label class="form-label" for="noHp">No HP</label>
                                    <input type="number" class="form-control @error('noHp') is-invalid @enderror"
                                        id="noHp" name="noHp" placeholder="Masukkan No HP" required>
                                    @error('noHp')
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
                                    <input type="date" class="form-control @error('ttl') is-invalid @enderror"
                                        id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" required>
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
                            <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatambah').click(function() {
            $('#tambahdata').modal({
                backdrop: 'static'
            });
        });
    });
</script>
