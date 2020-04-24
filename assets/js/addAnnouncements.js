$(document).ready(function () {
    let announcementsTable = $("#announcementsTable").DataTable({
        columns: [
            {"name": "id", "visible": false},
            {"name": "url"},
            {"name": "image", "orderable": false},
            {"name": "creationTime"},
            {"name": "delete", "orderable": false}
        ],
        order: [[3, "desc"]],
        pageLength: 10,
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        responsive: true,
        ajax: {
            url: "assets/php/announcementsRequests.php",
            type: "POST",
            data: {action: "getAnnouncements"},
            dataType: "json"
        }
    });

    $("#addAnnouncement").click(function () {
        $("#announcementsModal").modal('show');
        $("#announcementsForm").get(0).reset();
    });

    $("#announcementsTable").on("click", ".delete", function () {
        let id = $(this).attr("data-row-id");
        if (confirm("Are you sure you want to delete this announcement?")) {
            $.ajax({
                url: "assets/php/announcementsRequests.php",
                method: "POST",
                data: {id: id, action: "deleteAnnouncement"},
                success: function (data) {
                    announcementsTable.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("An error Occurred");
                }
            })
        }
    });

    $("#announcementsForm").on("submit", function (event) {
        event.preventDefault();
        let imageExtension = $("#image").val().split('.').pop().toLowerCase();
        if ($.inArray(imageExtension, ['png', 'jpg', 'jpeg']) === -1) {
            alert("Invalid File Type. Must be png,jpg,jpeg.");
            $("#image").val("");
        } else {
            $('#add').attr('disabled', 'disabled');
            let announcementData = $(this).serialize();
            $.ajax({
                url: "assets/php/announcementsRequests.php",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
                    $("#announcementsModal").modal("hide");
                    $("#add").attr('disabled', false);
                    announcementsTable.ajax.reload();
                }
            });
        }
    });
});