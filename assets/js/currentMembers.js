$(document).ready(function () {
    let membersTable = $("#membersTable").DataTable({
        columns: [
            {"name": "id", "visible": false},
            {"name": "name"},
            {"name": "email"},
            {"name": "faculty"},
            {"name": "program"},
            {"name": "universityID"},
            {"name": "address"},
            {"name": "facebook"},
            {"name": "phoneNumber"},
            {"name": "isApproved", "visible": false},
            {"name": "creationTime"},
            {"name": "update", "orderable": false},
            {"name": "delete", "orderable": false},
        ],
        order: [[10, "desc"]],
        pageLength: 10,
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        responsive: true,
        ajax: {
            url: "assets/php/membersRequests.php",
            type: "POST",
            data: {action: "getCurrentMembers"},
            dataType: "json"
        }
    });

    $("#addMember").click(function () {
        $("#membersModal").modal('show');
        $("#membersForm").get(0).reset();
        $("#action").val("addMember");
        $("#save").val("Add");
        $(".modal-title").html("Add Member");
    });
    $("#membersTable").on("click", ".update", function () {
        let id = $(this).attr("data-row-id");
        $.ajax({
            url: "assets/php/membersRequests.php",
            method: "POST",
            data: {id: id, action: "getMember"},
            dataType: "json",
            success: function (data) {
                $("#membersModal").modal('show');
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#faculty").val(data.faculty);
                $("#program").val(data.program);
                $("#universityID").val(data.universityID);
                $("#address").val(data.address);
                $("#phoneNumber").val(data.phoneNumber);
                $("#facebook").val(data.facebook);
                $("#action").val("updateMember");
                $("#save").val("Save");
                $(".modal-title").html("Edit Member");
            }
        });
    });
    $("#membersModal").on("submit", "#membersForm", function (event) {
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        let memberData = $(this).serialize();
        $.ajax({
            url: "assets/php/membersRequests.php",
            method: "POST",
            data: memberData,
            success: function (data) {
                $("#membersForm").get(0).reset();
                $("#membersModal").modal("hide");
                $("#save").attr('disabled', false);
                membersTable.ajax.reload();
            }
        });
    });
    $("#membersTable").on("click", ".delete", function () {
        let id = $(this).attr("data-row-id");
        if(confirm("Are you sure you want to delete this Member?")) {
            $.ajax({
                url: "assets/php/membersRequests.php",
                method: "POST",
                data: {id: id, action: "deleteMember"},
                success: function(data) {
                    membersTable.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("An error Occurred");
                }
            })
        }
    });
});
