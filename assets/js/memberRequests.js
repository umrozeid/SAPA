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
            {"name": "approve", "orderable": false}
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
            data: {action: "getMemberRequests"},
            dataType: "json"
        }
    });

    $("#membersTable").on("click", ".approve", function () {
        console.log("aaa");
        let id = $(this).attr("data-row-id");
        if(confirm("Are you sure you want to approve this member request?")) {
            $.ajax({
                url: "assets/php/membersRequests.php",
                method: "POST",
                data: {id: id, action: "approveMember"},
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
