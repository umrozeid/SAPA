$(document).ready(function () {
    let renderBooleanData = (data) => {
        if (data === 1)
            return "Yes";
        else if (data === 0)
            return "No";
        else
            return data;
    };
  let usersTable = $("#usersTable").DataTable({
      columns: [
          {"name": "id", "visible": false},
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
      order: [[1, "asc"]],
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
      $("#isAdmin").change();
      $("#canEditMembers").change();
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
             $("#isAdmin").val(data.isAdmin).change();
             $("#canViewMembers").val(data.canViewMembers).change();
             $("#canEditMembers").val(data.canEditMembers).change();
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
                $("#isAdmin").change();
                $("#canEditMembers").change();
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
  $("#isAdmin").change(function () {
      if ($(this).val() === "1"){
          $("#canViewMembers").val("1");
          $("#canEditMembers").val("1").change();
          $("#canAddAnnouncements").val("1");
          $("#canAddEvents").val("1");
          $('#canViewMembers').attr('disabled','disabled');
          $('#canEditMembers').attr('disabled','disabled');
          $('#canAddAnnouncements').attr('disabled','disabled');
          $('#canAddEvents').attr('disabled','disabled');
      }else {
          $('#canEditMembers').attr('disabled',false);
          $('#canAddAnnouncements').attr('disabled',false);
          $('#canAddEvents').attr('disabled',false);
      }
  });
  $("#canEditMembers").change(function () {
      if ($(this).val() === "1"){
          $("#canViewMembers").val("1");
          $('#canViewMembers').attr('disabled','disabled');
      }else {
          $('#canViewMembers').attr('disabled',false);
      }
  });
});