
$(document).ready(function(){

    EVENT_ATTENDANCE.get_event();

});

const EVENT_ATTENDANCE = (()=>
{

    let  this_event_attendance = {};


    this_event_attendance.get_event = () =>
    {
        $.ajax({
            url : 'get-event-attendance',
            type: 'GET',
            success:data =>
            {
                console.log(data);

                let events_detail = '';

                $.each(data,function(){
                    events_detail += `
                        <tr>
                            <td>${this.title}</td>
                            <td class="text-left">${this.description}</td>
                            <td>${this.event_date}</td>
                            <td>${this.total}</td>
                            <td>
                                <button class="btn btn-sm btn-primary text-nowrap" onclick="EVENT_ATTENDANCE.show_modal()"><i class="fa fa-paper-plane"></i>&nbsp;SEND EMAIL</button>
                            </td>
                        </tr>
                    `;

                });

                $('#tbl_admin_events tbody').html(events_detail);
                $('#tbl_admin_events').DataTable();
            }
        });

    }

    this_event_attendance.show_modal = () =>
    {
        $('#modal_attendance_mail').modal('show');
    }

    return this_event_attendance;

})();