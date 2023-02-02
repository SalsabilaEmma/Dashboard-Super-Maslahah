/** Todo */
function get_todo() {
    return new Promise((resolve) => {
      $.ajax({
        type: "GET",
        url: "get-kanban",
        dataType: "json",
        success: function (response) {
          let arr = [];
            for (let i = 0; i < response.length; i++) {
                // console.log(response);
                if (response[i].status == 'To Do') {
              var html = '';
            //   html += '<div class="todos">';
              html += '<a class="kanban-box kanban-card" href="#" id="'+response[i].id+'">';
              html += '<input type="hidden" hidden="" name="id" value="'+response[i].id+'"></input>';
              html += '<input type="hidden" hidden="" name="status" value="'+response[i].status+'"></input>';
              html += '<span class="date">'+response[i].due_date+'</span>';
              if (response[i].priority == 'Low') {
                  html += '<span class="badge badge-success f-right">'+response[i].priority+'</span>';
              } else if (response[i].priority == 'Normal') {
                  html += '<span class="badge badge-primary f-right">'+response[i].priority+'</span>';
              } else {
                  html += '<span class="badge badge-danger f-right">'+response[i].priority+'</span>';
              }
              html += '<h6>'+response[i].judul+'</h6>';
              // html += '<div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">';
              html += '<div class="media-body">';
              html += '<p>'+response[i].issues.substring(0,25)+' ...</p>';
              html += '</div>';
              html += '</div>';
              html += '<div class="d-flex mt-3">';
              html += '<ul class="list todo-list">';
              html += '</ul>';
              html += '<div class="customers">';
              html += '<ul>';
              html += '<li><button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="detail()" class="view_data btn btn-pill btn-outline-info btn-xs" data-toggle="modal" data-target="#viewdata" type="button" title=""><i class="fa fa-eye"></i> Detail</button>';
              html += '<button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="edit()" class="edit_data btn btn-pill btn-outline-warning btn-xs" data-toggle="modal" data-target="#editdata" type="button" title=""><i class="fa fa-paperclip"></i> Edit</button>';
              html += '<button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="cancel()" class="cancel_data btn btn-pill btn-outline-danger btn-xs" data-bs-toggle="modal" data-bs-target="#canceldata" type="button" title=""><i class="fa fa-trash"></i> Hapus</button>';
              html += '</li>';
              html += '</ul>';
              html += '</div>';
              html += '</div>';
              html += '</a>';
            //   html += '</div>';
              let obj = {title:html};
              arr.push(obj);
                }
            }
        //   console.log(arr);
          resolve(arr);
        },
      });
    });
}

/** In Progress */
function get_progres() {
    return new Promise((resolve) => {
      $.ajax({
        type: "GET",
        url: "get-kanban",
        dataType: "json",
        success: function (response) {
          // console.log(response[0].status);
          let arr = [];
            for (let i = 0; i < response.length; i++) {
            if (response[i].status == 'In Progress') {
              var html = '';
              html += '<a class="kanban-box kanban-card" href="#" id="'+response[i].id+'">';
              html += '<input type="hidden" hidden="" name="id" value="'+response[i].id+'"></input>';
              html += '<input type="hidden" hidden="" name="status" value="'+response[i].status+'"></input>';
              html += '<span class="date">'+response[i].due_date+'</span>';
              if (response[i].priority == 'Low') {
                  html += '<span class="badge badge-success f-right">'+response[i].priority+'</span>';
              } else if (response[i].priority == 'Normal') {
                  html += '<span class="badge badge-primary f-right">'+response[i].priority+'</span>';
              } else {
                  html += '<span class="badge badge-danger f-right">'+response[i].priority+'</span>';
              }
              html += '<h6>'+response[i].judul+'</h6>';
              // html += '<div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">';
              html += '<div class="media-body">';
              html += '<p>'+response[i].issues.substring(0,25)+' ...</p>';
              html += '</div>';
              html += '</div>';
              html += '<div class="d-flex mt-3">';
              html += '<ul class="list todo-list">';
              html += '</ul>';
              html += '<div class="customers">';
              html += '<ul>';
              html += '<li><button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="detail()" class="view_data btn btn-pill btn-outline-info btn-xs" data-toggle="modal" data-target="#viewdata" type="button" title=""><i class="fa fa-eye"></i> Detail</button>';
              html += '<button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="edit()" class="edit_data btn btn-pill btn-outline-warning btn-xs" data-toggle="modal" data-target="#editdata" type="button" title=""><i class="fa fa-paperclip"></i> Edit</button>';
              html += '<button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="cancel()" class="cancel_data btn btn-pill btn-outline-danger btn-xs" data-bs-toggle="modal" data-bs-target="#canceldata" type="button" title=""><i class="fa fa-trash"></i> Hapus</button>';
              html += '</li>';
              html += '</ul>';
              html += '</div>';
              html += '</div>';
              html += '</a>';
              let obj = {title:html};
              arr.push(obj);
                }
            }
        //   console.log(arr);
          resolve(arr);
        },
      });
    });
}

/** Done */
function get_done() {
    return new Promise((resolve) => {
      $.ajax({
        type: "GET",
        url: "get-kanban",
        dataType: "json",
        success: function (response) {
          // console.log(response[0].status);
          let arr = [];
            for (let i = 0; i < response.length; i++) {
            if (response[i].status == 'Done') {
                // console.log(response);
              var html = '';
              html += '<a class="kanban-box kanban-card" href="#" id="'+response[i].id+'">';
              html += '<input type="hidden" hidden="" name="id" value="'+response[i].id+'"></input>';
              html += '<input type="hidden" hidden="" name="status" value="'+response[i].status+'"></input>';
              html += '<span class="date">'+response[i].due_date+'</span>';
              if (response[i].priority == 'Low') {
                  html += '<span class="badge badge-success f-right">'+response[i].priority+'</span>';
              } else if (response[i].priority == 'Normal') {
                  html += '<span class="badge badge-primary f-right">'+response[i].priority+'</span>';
              } else {
                  html += '<span class="badge badge-danger f-right">'+response[i].priority+'</span>';
              }
              html += '<h6>'+response[i].judul+'</h6>';
              // html += '<div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">';
              html += '<div class="media-body">';
              html += '<p>'+response[i].issues.substring(0,25)+' ...</p>';
              html += '</div>';
              html += '</div>';
              html += '<div class="d-flex mt-3">';
              html += '<ul class="list todo-list">';
              html += '</ul>';
              html += '<div class="customers">';
              html += '<ul>';
              html += '<li><button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="detail()" class="view_data btn btn-pill btn-outline-info btn-xs" data-toggle="modal" data-target="#viewdata" type="button" title=""><i class="fa fa-eye"></i> Detail</button>';
              html += '<button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="edit()" class="edit_data btn btn-pill btn-outline-warning btn-xs" data-toggle="modal" data-target="#editdata" type="button" title=""><i class="fa fa-paperclip"></i> Edit</button>';
              html += '<button data-id="'+response[i].id+'" data-status="'+response[i].status+'" data-judul="'+response[i].judul+'" data-priority="'+response[i].priority+'" data-due_date="'+response[i].due_date+'" data-issues="'+response[i].issues+'"  onclick="cancel()" class="cancel_data btn btn-pill btn-outline-danger btn-xs" data-bs-toggle="modal" data-bs-target="#canceldata" type="button" title=""><i class="fa fa-trash"></i> Hapus</button>';
              html += '</li>';
              html += '</ul>';
              html += '</div>';
              html += '</div>';
              html += '</a>';
              let obj = {title:html};
              arr.push(obj);
                }
            }
        //   console.log(arr);
          resolve(arr);
        },
      });
    });
}

async function fun_kanban() {
var await_todo = await get_todo();
var await_progres = await get_progres();
var await_done = await get_done();
var kanban1 = new jKanban({
    element: "#demo1",
    boards: [

    /** Todo */
    {
        id: "_todo",
        title: "Todo",
        item: await_todo,

    },

    /** In progress */
    {
        id: "_doing",
        title: "In Progress",
        item: await_progres,
    },

    /** Done */
    {
        id: "_done",
        title: "Done",
        item: await_done,
    },

    ],
});
}
fun_kanban();

/** -------------------- End ---------------------------- */
  var kanban2 = new jKanban({
    element: "#demo2",
    gutter: "15px",
    click: function (el) {
      alert(el.innerHTML);
    },
    boards: [
      {
        id: "_todo",
        title: "To Do (Item only in Working)",
        class: "bg-info",
        dragTo: ["_working"],
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-info f-right">medium</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-success f-right">Low</span>
                                  <h6>Dashboard issue</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Pixelstrap, New york</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
      {
        id: "_working",
        title: "Working",
        class: "bg-warning",
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-success f-right">Low</span>
                                  <h6>Dashboard issue</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Pixelstrap, New york</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
      {
        id: "_done",
        title: "Done (Item only in Working)",
        class: "bg-success",
        dragTo: ["_working"],
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-success f-right">Low</span>
                                  <h6>Dashboard issue</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Pixelstrap, New york</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
    ],
  });

  var kanban3 = new jKanban({
    element: "#demo3",
    gutter: "15px",
    click: function (el) {
      alert(el.innerHTML);
    },
    boards: [
      {
        id: "_todo",
        title: "To Do",
        class: "info",
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
      {
        id: "_working",
        title: "Working",
        class: "warning",
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <img class="mt-2 img-fluid" src="../cuba/assets/images/other-images/maintenance-bg.jpg" alt="" data-original-title="" title="">
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
      {
        id: "_done",
        title: "Done",
        class: "success",
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <img class="mt-2 img-fluid" src="../cuba/assets/images/other-images/sidebar-bg.jpg" alt="" data-original-title="" title="">
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
    ],
  });

  var toDoButton = document.getElementById("addToDo");
  toDoButton.addEventListener("click", function () {
    kanban3.addElement("_todo", {
      title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <img class="mt-2 img-fluid" src="../cuba/assets/images/other-images/sidebar-bg.jpg" alt="" data-original-title="" title="">
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
    });
  });

  var addBoardDefault = document.getElementById("addDefault");
  addBoardDefault.addEventListener("click", function () {
    kanban3.addBoards([
      {
        id: "_default",
        title: "Kanban Default",
        item: [
          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },

          {
            title: `
                                 <a class="kanban-box" href="#"><span class="date">24/7/20</span><span class="badge badge-danger f-right">Argent</span>
                                  <img class="mt-2 img-fluid" src="../cuba/assets/images/other-images/maintenance-bg.jpg" alt="" data-original-title="" title="">
                                  <h6>Test Sidebar</h6>
                                  <div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                    <div class="media-body">
                                      <p>Themeforest, australia</p>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-3">
                                    <ul class="list">
                                      <li><i class="fa fa-comments-o"></i>2</li>
                                      <li><i class="fa fa-paperclip"></i>2</li>
                                      <li><i class="fa fa-eye"></i></i></li>
                                    </ul>
                                    <div class="customers">
                                      <ul>
                                        <li class="d-inline-block me-3">
                                          <p class="f-12">+5</p>
                                        </li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                        <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                      </ul>
                                    </div>
                                  </div></a>
                              `,
          },
        ],
      },
    ]);
  });

  var removeBoard = document.getElementById("removeBoard");
  removeBoard.addEventListener("click", function () {
    kanban3.removeBoard("_done");
  });
