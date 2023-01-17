// ISSUES BOARD HANDLER marspro
$(function () {
    //"use strict";
    //jQuery UI sortable for the todo list
    $(".todo-list").sortable({
      placeholder: "sort-highlight",
      connectWith: ".todo-list",
      handle: ".handle",
      forcePlaceholderSize: true,
      zIndex: 999999,
      update: function (event, ui) {
          var issueid = ui.item.context.id;
          //var newstatus = ui.item.context.closest('.todo-list').id;
          var newstatus = ui.item.context.parentElement.id;
          var formData = {issueid:issueid,status:newstatus};
          //alert(newstatus);
          $.ajax({
              data: formData,
              type: 'POST',
              url: 'index.php?qa=updateIssueStatus'
          });

      }
    });
});
