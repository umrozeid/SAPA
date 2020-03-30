$(document).ready(function () {
    let renderBooleanData = (data) => {
        if (data === 1)
            return "Yes";
        else if (data === 0)
            return "No";
        else
            return data;
    }
  let usersTable = $("#usersTable").DataTable({
      columns: [
          {"name": "id"},
          {"name": "username"},
          {"name": "password"},
          {"name": "isAdmin", "render": renderBooleanData},
          {"name": "canViewMembers", "render": renderBooleanData},
          {"name": "canEditMembers", "render": renderBooleanData},
          {"name": "canAddAnnouncements", "render": renderBooleanData},
          {"name": "canAddEvents", "render": renderBooleanData},
          {"name": "creationTime"},
          {"name": "update", "orderable": false},
          {"name": "delete", "orderable": false},
      ],
      order: [[0, "desc"]],
      pageLength: 10,
      processing: true,
      serverSide: true,
      serverMethod: 'post',
      responsive: true,
      ajax: {
          url: "assets/php/usersRequests.php",
          type: "POST",
          data: {action: "getUsers"},
          dataType: "json"
      }
  });

  $("#addUser").click(function () {
      $("#usersModal").modal('show');
      $("#username").prop("readonly", false);
      $("#usersForm").get(0).reset();
      $("#action").val("addUser");
      $("#save").val("Add");
      $(".modal-title").html("Add User");
  });
  $("#usersTable").on("click", ".update", function () {
      let id = $(this).attr("data-row-id");
      $.ajax({
         url: "assets/php/usersRequests.php",
         method: "POST",
         data: {id: id, action: "getUser"},
          dataType: "json",
          success: function (data) {
             $("#usersModal").modal('show');
             $("#username").prop("readonly", true);
             $("#id").val(data.id);
             $("#username").val(data.username);
             $("#password").val(data.password);
             $("#isAdmin").val(data.isAdmin);
             $("#canViewMembers").val(data.canViewMembers);
             $("#canEditMembers").val(data.canEditMembers);
             $("#canAddAnnouncements").val(data.canAddAnnouncements);
             $("#canAddEvents").val(data.canAddEvents);
             $("#action").val("updateUser");
             $("#save").val("Save");
             $(".modal-title").html("Edit User");
          }
      });
  });
  $("#usersModal").on("submit", "#usersForm", function (event) {
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        let userData = $(this).serialize();
        $.ajax({
            url: "assets/php/usersRequests.php",
            method: "POST",
            data: userData,
            success: function (data) {
                $("#usersForm").get(0).reset();
                $("#usersModal").modal("hide");
                $("#save").attr('disabled', false);
                usersTable.ajax.reload();
            }
        });
  });
  $("#usersTable").on("click", ".delete", function () {
      let id = $(this).attr("data-row-id");
      if(confirm("Are you sure you want to delete this user?")) {
          $.ajax({
              url: "assets/php/usersRequests.php",
              method: "POST",
              data: {id: id, action: "deleteUser"},
              success: function(data) {
                  usersTable.ajax.reload();
              },
              error: function (jqXHR, textStatus, errorThrown) {
                    alert("An error Occurred");
              }
          })
      }
  });
});
