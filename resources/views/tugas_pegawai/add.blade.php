@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        {{-- <h3 class="mb-3">Tugas Pegawai</h3> --}}
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('absensi') }}">Tugas Pegawai</a></li>
                            <li class="breadcrumb-item active">Tambah Tugas Pegawai</li>
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
                            <h5 class="mb-3">Tambah Tugas Pegawai</h5>
                            {{-- <span>The Responsive extension for DataTables</span> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tugasPegawai.store') }}" method="POST" id="todo-form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row g3">
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="recipient-name">NIP:</label>
                                        <input type="text" name="userRequest" id="userRequest" required readonly value=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="recipient-name">Nama Pegawai:</label>
                                        <select class="js-example-disabled-results form-select digits @error('namaUserRequest') is-invalid @enderror"
                                            required name="userRequest" required id="namaUserRequest">
                                            <option selected hidden value="" disabled="disabled">- Pilih Nama Pegawai -</option>
                                            @foreach ($dataPegawai as $pegawai)
                                            <option value="{{ $pegawai->nip }}">{{ $pegawai->nama }} - {{ $pegawai->nip }}</option>
                                            @endforeach
                                        </select>
                                        @error('namaUserRequest')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g3">
                                    <div class="col-md-8">
                                        <label class="col-form-label" for="recipient-name">Judul:</label>
                                        <input name="judul" id="input_judul"
                                            class="form-control @error('judul') is-invalid @enderror" type="text"
                                            placeholder="Masukkan Judul">
                                        @error('judul')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="recipient-name">Status:</label>
                                        <select name="status" class="form-select" id="input_status" required="">
                                            <option selected="" disabled="" value="">Pilih Status...</option>
                                            <option value="To Do">To Do</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g3">
                                    <div class="col-md-5">
                                        <label class="col-form-label" for="recipient-name">Tanggal Berakhir:</label>
                                        <input name="due_date" id="input_duedate" class="form-control" type="date">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-form-label" for="recipient-name">Prioritas:</label>
                                        <select name="priority" class="form-select" id="input_priority" required="">
                                            <option selected="" disabled="" value="">Pilih Tingkat Prioritas...
                                            </option>
                                            <option>Low</option>
                                            <option>Normal</option>
                                            <option>Urgent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label" for="recipient-name">Sprint Point:</label>
                                        <input name="sprintpoint" id="input_sprintpoint" class="form-control" type="number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-form-label" for="message-text">Issues:</label>
                                        <textarea name="issues" id="input_issues" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Submit</button>
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
        $('#namaUserRequest').on('change', function() {
            var nip = $(this).val();
            // console.log(namaUserRequest);
            $.ajax({
                url: "{{ route('getDataPegawai2') }}",
                type: 'GET',
                data: {
                    nip: nip
                },
                success: function(data) {
                    $('#nip').val(data.nip);
                }
            });
        });
    });
</script>
