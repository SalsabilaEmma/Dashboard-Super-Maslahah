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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#tambahdata" data-whatever="@getbootstrap">Add Issues</button>
                                <br>
                            </div>
                            <div id="demo1"></div>
                            {{-- @forelse ($task as $task2)
                                <p>{{ $task2->status }} | {{ $task2->judul }}</p>

                            @empty
                                <p class="text-center">No Task</p>
                            @endforelse --}}

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
                                <input name="judul" id="todo-input"
                                    class="form-control @error('judul') is-invalid @enderror" type="text"
                                    placeholder="Masukkan Judul">
                                @error('judul')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="recipient-name">Status:</label>
                                <select name="status" class="form-select" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Pilih Status...</option>
                                    <option value="0">To Do</option>
                                    <option value="1">In Progress</option>
                                    <option value="2">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Tanggal Berakhir:</label>
                                <input name="due_date" id="todo-input" class="form-control" type="date">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="recipient-name">Prioritas:</label>
                                <select name="priority" class="form-select" id="validationDefault04" required="">
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
                                <textarea name="issues" id="todo-input" class="form-control"></textarea>
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
                <form action="{{ route('kanban.store') }}" method="POST" id="todo-form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row g3">
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
                                    <option value="0">To Do</option>
                                    <option value="1">In Progress</option>
                                    <option value="2">Done</option>
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
                                <input name="issues" id="issues" class="form-control">
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
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    // $(document).ready(function() {
    function edit() {
        $(document).on('click', '.edit_data', function(e) {
            $('#editdata').modal('show');
            //console.log();
            $("#editdata").find("#id").attr("value", $(this).data('id'));
            $("#editdata").find("#status").attr("value", $(this).data('status'));
            $("#editdata").find("#due_date").attr("value", $(this).data('due_date'));
            $("#editdata").find("#priority").attr("value", $(this).data('priority'));
            $("#editdata").find("#judul").attr("value", $(this).data('judul'));
            $("#editdata").find("#issues").attr("value", $(this).data('issues'));
        });
    }
    // });
</script>
