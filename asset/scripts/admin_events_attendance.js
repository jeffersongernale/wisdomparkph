
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
                                <button class="btn btn-sm btn-primary text-nowrap" onclick="EVENT_ATTENDANCE.show_modal('${this.email}')"><i class="fa fa-paper-plane"></i>&nbsp;SEND EMAIL</button>
                            </td>
                        </tr>
                    `;

                });

                $('#tbl_admin_events tbody').html(events_detail);
                $('#tbl_admin_events').DataTable();
            }
        });

    }

    this_event_attendance.show_modal = (email) =>
    {
        $('#modal_attendance_mail').modal('show');
        $('#event_attendance_send_mail').attr('recipient',email);
    }

    this_event_attendance.send_mail = () =>
    {
        $('#event_attendance_send_mail').attr('disabled',true);
        $.ajax({
            url: 'send-announcement',
            type: 'POST',
            data:
            {
                subject: $('#txt_subject').val(),
                message: $('#txt_message').val(),
                recipient:  $('#event_attendance_send_mail').attr('recipient');
            },
            success: data =>
            {
                console.log(data);
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Message sent! Thank you',
                        position: 'center'
                    });
                    
                    $('#txt_subject').val('');
                    $('#txt_message').val('');
                    $('#btn_message_submit').attr('disabled',false);
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: 'Opps Something went wrong. Please try again.',
                        position: 'center'
                    });
                    $('#event_attendance_send_mail').attr('disabled',false);
                }
            },
            error: data => {
                // console.log(data);
                iziToast.error({
                    title: 'OK',
                    message: 'Opps Something went wrong. Please try again.',
                    position: 'center'
                });
                $('#event_attendance_send_mail').attr('disabled',false);
            }
        });
    }
    return this_event_attendance;

})();