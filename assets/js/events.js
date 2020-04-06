$(document).ready(function() {
    let calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events: 'load.php',
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay)
        {
            let title = prompt("Enter Event Title");
            if(title)
            {
                let start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                let end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url:"insert.php",
                    type:"POST",
                    data:{title:title, start:start, end:end},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Added Successfully");
                    }
                })
            }
        },
        eventResize:function(event)
        {
            let start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            let end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            let title = event.title;
            let id = event.id;
            $.ajax({
                url:"update.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function(){
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Update');
                }
            })
        },

        eventDrop:function(event)
        {
            let start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            let end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            let title = event.title;
            let id = event.id;
            $.ajax({
                url:"update.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            });
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                let id = event.id;
                $.ajax({
                    url:"delete.php",
                    type:"POST",
                    data:{id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Removed");
                    }
                })
            }
        }
    });
});