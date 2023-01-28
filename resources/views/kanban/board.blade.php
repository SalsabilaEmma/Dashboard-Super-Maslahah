@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Kanban Board</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item"> Apps</li> --}}
                            <li class="breadcrumb-item active"> Kanban Board</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid jkanban-container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Kanban Board</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal" id="btn-tambahdata"
                                    data-bs-target="#tambahdata" data-whatever="@getbootstrap">Add Issues</button>
                            </div>
                            <br>
                            <div id="demo1"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h5>Custom Board  </h5>
                      <p class="mb-0">| colors, gutter, click on board&apos;s item and restricting which boards to drag items to                         </p>
                    </div>
                    <div class="card-body">
                      <div id="demo2"></div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>API</h5>
                            <p class="mb-0">add item, add board, delete board: </p>
                        </div>
                        <div class="card-body">
                            <div id="demo3"></div>
                            <button class="btn btn-success" id="addDefault">Add &quot;Default&quot; board</button>
                            <button class="btn btn-success" id="addToDo">Add element in &quot;To Do&quot; Board</button>
                            <button class="btn btn-danger" id="removeBoard">Remove &quot;Done&quot; Board</button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card note p-20">jKanban is Pure agnostic Javascript plugin for Kanban boards for more
                        options please refer <a href="http://www.riccardotartaglia.it/jkanban/" target="_blank">jkanban
                            Official site </a>And <a href="https://github.com/riktar/jkanban" target="_blank">githup
                            link</a>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <!-- Tambah Data -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Issues</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kanban.store') }}" method="POST" id="todo-form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
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
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Tanggal Berakhir:</label>
                                <input name="due_date" id="input_duedate" class="form-control" type="date">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Prioritas:</label>
                                <select name="priority" class="form-select" id="input_priority" required="">
                                    <option selected="" disabled="" value="">Pilih Tingkat Prioritas...</option>
                                    <option>Low</option>
                                    <option>Normal</option>
                                    <option>Urgent</option>
                                </select>
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

    <!-- Detail Data -->
    <div class="modal fade" id="viewdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="view-form">
                    <div class="modal-body">
                        <div class="row g3">
                            <input type="hidden" hidden="" name="id" id="id"></input>
                            <div class="col-md-8">
                                <label class="col-form-label" for="recipient-name">Judul:</label>
                                <input name="judul" id="judul" readonly class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="recipient-name">Status:</label>
                                <input name="status" id="status" readonly class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row g3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Tanggal Berakhir:</label>
                                <input name="due_date" id="due_date" readonly class="form-control" type="date">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Prioritas:</label>
                                <input name="priority" id="priority" readonly class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label" for="message-text">Issues:</label>
                                <textarea style="height: 150px;" name="issues" readonly id="issues" class=" form-control"></textarea>
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

    <!-- Edit Data -->
    <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Issues</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kanban.update') }}" method="POST" id="edit-form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row g3">
                            <input type="hidden" hidden="" name="id" id="id"></input>
                            <div class="col-md-8">
                                <label class="col-form-label" for="recipient-name">Judul:</label>
                                <input name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid @enderror" type="text"
                                    placeholder="Masukkan Judul">
                                @error('judul')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="recipient-name">Status:</label>
                                <select name="status" class="form-select" id="status" required="">
                                    <option selected="" disabled="" value="">Pilih Status...</option>
                                    <option value="To Do">To Do</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Done">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Tanggal Berakhir:</label>
                                <input name="due_date" id="due_date" class="form-control" type="date">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Prioritas:</label>
                                <select name="priority" class="form-select" id="priority" required="">
                                    <option selected="" disabled="" value="">Pilih Tingkat Prioritas...
                                    </option>
                                    <option>Low</option>
                                    <option>Normal</option>
                                    <option>Urgent</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label" for="message-text">Issues:</label>
                                <textarea style="height: 120px;" name="issues" id="isu" class=" form-control"></textarea>
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

    {{-- cancel --}}
    <div class="modal fade" id="canceldata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancel Issues</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kanban.cancel') }}" method="POST" id="cancel-form"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" hidden="" name="id" id="id"></input>
                    <div class="modal-body">
                        <p class="text-center">Yakin Akan Dihapus?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    // View Data (Detail)
    function detail() {
        $(document).on('click', '.view_data', function(e) {
            $('#viewdata').modal('show');
            $("#viewdata").find("#id").attr("value", $(this).data('id'));
            $("#viewdata").find("#status").attr("value", $(this).data('status'));
            $("#viewdata").find("#due_date").attr("value", $(this).data('due_date'));
            $("#viewdata").find("#priority").attr("value", $(this).data('priority'));
            $("#viewdata").find("#judul").attr("value", $(this).data('judul'));
            // $("#viewdata").find("#issues").attr("value", $(this).data('issues'));
            $('#issues').text($(this).data('issues'));
        });
    }

    //Create Data
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#todo-form").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('kanban.store') }}",
                data: $("#todo-form").serialize(),
                dataType: "JSON",
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $("#demo1").children().remove();
                    fun_kanban();
                    //close modal
                    $("#input_judul").val('');
                    $("#input_status").val('');
                    $("#input_duedate").val('');
                    $("#input_priority").val('');
                    $("#input_issues").val('');
                    $('#tambahdata').modal('hide');
                },
                // error: function(error) {
                //     //...
                // }
            });
        });
    });

    //  Edit Data Modal
    function edit() {
        $(document).on('click', '.edit_data', function(e) {
            $('#editdata').modal('show');
            $("#editdata").find("#id").attr("value", $(this).data('id'));
            $("#editdata").find("#status").attr("value", $(this).data('status'));
            $("#editdata").find("#due_date").attr("value", $(this).data('due_date'));
            $("#editdata").find("#priority").attr("value", $(this).data('priority'));
            $("#editdata").find("#judul").attr("value", $(this).data('judul'));
            // $("#editdata").find("#issues").attr("value", $(this).data('issues'));
            $('#isu').text($(this).data('issues'));
        });
    }
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#edit-form").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('kanban.update') }}",
                data: $("#edit-form").serialize(),
                dataType: "JSON",
                success: function(response) {

                    $("#demo1").children().remove();
                    fun_kanban();
                    // console.log('dah lewat proses update');

                    //close modal
                    $('#editdata').modal('hide');

                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                // error: function(error) {
                //     //...
                // }
            });
        });
    });

    // Cancel Data
    function cancel() {
        $(document).on('click', '.cancel_data', function(e) {
            $('#canceldata').modal('show');
            $("#canceldata").find("#id").attr("value", $(this).data('id'));
            $("#canceldata").find("#status").attr("value", $(this).data('status'));
            $("#canceldata").find("#due_date").attr("value", $(this).data('due_date'));
            $("#canceldata").find("#priority").attr("value", $(this).data('priority'));
            $("#canceldata").find("#judul").attr("value", $(this).data('judul'));
            $("#canceldata").find("#issues").attr("value", $(this).data('issues'));
        });
    }
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#cancel-form").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('kanban.cancel') }}",
                data: $("#cancel-form").serialize(),
                dataType: "JSON",
                success: function(response) {
                    // console.log('halo');
                    $("#demo1").children().remove();
                    fun_kanban();

                    //close modal
                    $('#canceldata').modal('hide');

                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                // error: function(error) {
                //     //...
                // }
            });
        });
    });

    // Function Drag Status
    function dragstatus(el, boardJSON) {
        /** Ambil Id Value Board Asal */
        var board = boardJSON.id;
        /** Ambil Value Issues */
        var issues = $(el.firstChild).attr('id');
        /** Ambil Id Board Tujuan*/
        var parentissues = $(el.firstChild).parent();
        var boardTujuan = $(parentissues[0].offsetParent).data('id');
        // console.log(dataId);

        var data = {
            idBoardAsal: board,
            idBoardTujuan: boardTujuan,
            idIssues: issues
        };
        // console.log(data);

        /** -------------------------------------------------- */
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "{{ route('kanban.dragstatus') }}" + '?_token=' + '{{ csrf_token() }}',
                data: data,
                dataType: "JSON",
                success: function(response) {
                    console.log('ajax success');

                    // Swal.fire({
                    //     type: 'success',
                    //     icon: 'success',
                    //     title: `${response.message}`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // });
                },
            });
        });
    }
</script>
