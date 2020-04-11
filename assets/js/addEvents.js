$(document).ready(function() {

    let showAddModal = function(start , end) {
        start = start || new Date().toJSON().slice(0,16);
        end = end || new Date().toJSON().slice(0,16);
        $("#eventsModal").modal('show');
        $("#eventsForm").get(0).reset();
        $("#action").val("addEvent");
        $("#start").val(start);
        $("#end").val(end);
        $("#save").val("Add");
        $(".modal-title").html("Add Event");
        $("#delete").addClass("d-none");
    };

    let showUpdateModal = function(id) {
        $.ajax({
            url: "assets/php/eventsRequests.php",
            method: "POST",
            data: {id: id, action: "getEvent"},
            dataType: "json",
            success: function (data) {
                $("#eventsModal").modal('show');
                $("#id").val(data.id);
                $("#title").val(data.title);
                $("#start").val(new Date(data.start).toJSON().slice(0,16));
                $("#end").val(new Date(data.end).toJSON().slice(0,16));
                $("#action").val("updateEvent");
                $("#save").val("Save");
                $(".modal-title").html("Edit Event");
                $("#delete").removeClass("d-none");
            }
        });
    };
    let calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events: 'assets/php/eventsRequests.php',
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay)
        {
            showAddModal(start.toDate().toJSON().slice(0,16), end.toDate().toJSON().slice(0,16));
        },
        eventResize:function(event)
        {
            let start = event.start.toDate().toJSON().slice(0,16);
            let end;
            if ( event.end == null){
                end = start;
            }else {
                end = event.end.toDate().toJSON().slice(0,16);
            }
            let title = event.title;
            let id = event.id;
            $.ajax({
                url:"assets/php/eventsRequests.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id, action:"updateEvent"},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            });
        },

        eventDrop:function(event)
        {
            let start = event.start.toDate().toJSON().slice(0,16);
            let end;
            if ( event.end == null){
                end = start;
            }else {
                end = event.end.toDate().toJSON().slice(0,16);
            }
            let title = event.title;
            let id = event.id;
            $.ajax({
                url:"assets/php/eventsRequests.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id, action:"updateEvent"},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            });
        },

        eventClick:function(event)
        {
            showUpdateModal(event.id);
        }
    });

    $("#addEvent").click(function () {
        showAddModal();
    });

    $("#eventsModal").on("submit", "#eventsForm", function (event) {
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        let eventData = $(this).serialize();
        $.ajax({
            url: "assets/php/eventsRequests.php",
            method: "POST",
            data: eventData,
            success: function (data) {
                $("#eventsForm").get(0).reset();
                $("#eventsModal").modal("hide");
                $("#save").attr('disabled', false);
                alert("Done Successfully");
                calendar.fullCalendar('refetchEvents');
            }
        });
    });

    $("#delete").on("click", function () {
        let id = $("#id").val();
        if(confirm("Are you sure you want to delete this user?")) {
            $.ajax({
                url: "assets/php/eventsRequests.php",
                method: "POST",
                data: {id: id, action: "deleteEvent"},
                success: function(data) {
                    calendar.fullCalendar('refetchEvents');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("An error Occurred");
                }
            })
        }
    });
});