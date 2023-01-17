
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
var html = '';
function get_todo(){
    return new Promise(resolve => {
        $.ajax({
            type: "GET",
            url: "getId-kanban",
            dataType: "json",
            success: function (response) {
                // console.log(response[0].status);
                for (let i = 0; i < response.length; i++) {
                    // const element = array[i];
                    console.log(response[i].status);
                    
                    html += '<a class="kanban-box" href="#">';
                    html += '<span class="date">'+response[i].due_date+'</span>';
                    html += '<span class="badge badge-primary f-right">medium</span>';
                    html += '<h6>Design Dashboard</h6>';
                    html += '<div class="media"><img class="img-20 me-1 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title="">';
                    html += '<div class="media-body">';
                    html += '<p>Themeforest, australia</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="d-flex mt-3">';
                    html += '<ul class="list todo-list">';
                    html += '<li><i class="fa fa-comments-o"></i>2</li>';
                    html += '<li><i class="fa fa-paperclip"></i>2</li>';
                    html += '<li><i class="fa fa-eye"></i></i></li>';
                    html += '</ul>';
                    html += '<div class="customers">';
                    html += '<ul>';
                    html += '<li class="d-inline-block me-3">';
                    html += '<p class="f-12">+10</p>';
                    html += '</li>';
                    html += '<li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>';
                    html += '<li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>';
                    html += '<li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>';
                    html += '</ul>';
                    html += '</div>';
                    html += '</div>';
                    html += '</a>';

                }
                resolve(html);
            }
            
        });
    });

}
async function  aa(){
    var awaitt = await get_todo();
    var kanban1 = new jKanban ({
        element: '#demo1',
        boards: [{
            'id': '_todo',
            'title': 'Todo',
            'item': [{
                'title': html,
              }
            ]
          },
          {
            'id': '_doing',
            'title': 'In Progress',
            'item': [{
                'title': `
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
            ]
          },
          {
            'id': '_done',
            'title': 'Done',
            'item': [{
                'title': `
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
                'title': `
                          <a class="kanban-box" href="#"><span class="date">23/7/20</span><span class="badge badge-primary f-right">medium</span>
                          <h6>Design Dashboard</h6>
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
                                  <p class="f-12">+10</p>
                                  </li>
                                  <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                  <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                  <li class="d-inline-block"><img class="img-20 rounded-circle" src="../cuba/assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                              </ul>
                              </div>
                          </div></a>
                      `,
              }
            ]
          }
        ]
      });
}
aa();

var kanban2 = new jKanban({
  element: '#demo2',
  gutter: '15px',
  click: function (el) {
    alert(el.innerHTML);
  },
  boards: [{
      'id': '_todo',
      'title': 'To Do (Item only in Working)',
      'class': 'bg-info',
      'dragTo': ['_working'],
      'item': [{
          'title': `
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
          'title': `
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
        }
      ]
    },
    {
      'id': '_working',
      'title': 'Working',
      'class': 'bg-warning',
      'item': [{
          'title': `
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
          'title': `
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
        }
      ]
    },
    {
      'id': '_done',
      'title': 'Done (Item only in Working)',
      'class': 'bg-success',
      'dragTo': ['_working'],
      'item': [{
          'title': `
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
          'title': `
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
        }
      ]
    }
  ]
});

var kanban3 = new jKanban({
  element: '#demo3',
  gutter: '15px',
  click: function (el) {
    alert(el.innerHTML);
  },
  boards: [{
      'id': '_todo',
      'title': 'To Do',
      'class': 'info',
      'item': [{
          'title': `
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
          'title': `
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
      ]
    },
    {
      'id': '_working',
      'title': 'Working',
      'class': 'warning',
      'item': [{
          'title': `
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
          'title': `
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
      ]
    },
    {
      'id': '_done',
      'title': 'Done',
      'class': 'success',
      'item': [{
          'title': `
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
          'title': `
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
      ]
    }
  ]
});

var toDoButton = document.getElementById('addToDo');
toDoButton.addEventListener('click', function () {
  kanban3.addElement(
    '_todo', {
      'title': `
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
    }
  );
});

var addBoardDefault = document.getElementById('addDefault');
addBoardDefault.addEventListener('click', function () {
  kanban3.addBoards(
    [{
      'id': '_default',
      'title': 'Kanban Default',
      'item': [{
          'title': `
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
          'title': `
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
        }
      ]
    }]
  )
});

var removeBoard = document.getElementById('removeBoard');
removeBoard.addEventListener('click', function () {
  kanban3.removeBoard('_done');
});
