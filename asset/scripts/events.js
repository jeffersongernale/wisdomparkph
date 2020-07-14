$(document).ready(()=>{
    EVENTS.httpGet();
    EVENTS.get_details();
    EVENTS.check_url();
});

const EVENTS = (()=>
{
    let this_events = {};
    let _section ='';

    this_events.get_details = () =>
    {
        $.ajax({
            url : 'get-events',
            type: 'GET',
            data:
            {
                section: _section
            },
            success:data =>
            {
                console.log(data);

                let events_detail = '';
                $.each(data,function(){
                    console.log(this.event_date)
                    events_detail += `<div class="col-md-12 col-lg-12 mb-12 mb-lg-12 mb-5 mt-5" data-aos="fade-up">
                                            <div class="unit-4">
                                            <img class="image-size" src="${_BASE_URL}asset/upload/event/${this.image}">
                                            <div class="mt-5">
                                                <h3>${this.title}</h3>
                                                <p><b>EVENT DATE:</b> ${this.event_date}</p>
                                                <p>${this.description}</p>
                                            </div>
                                            </div>
                                            <button class="btn btn-xs btn-success" onclick="EVENTS.openModal(${this.id})">CONFIRM ATTENDANCE</button>
                                        </div>`;
                });

                $('#facilities_data').html(events_detail);
            }
        });

    }
    this_events.httpGet = () =>
    {
        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);
        var section = url.searchParams.get("section");
        _section = section;
        console.log(_section);
    }

    this_events.openModal = (id) =>
    {
        $('#modal_event_confirm').modal('show');
        $('#modal_event_confirm').attr('data-id',id);
    }

    this_events.save_attendance = () =>
    {
        


        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to submit this information?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here
                       $.ajax({
                        url: 'insert-event-attendance',
                        type: 'POST',
                        data:
                        {
                            event_id : $('#modal_event_confirm').attr('data-id'),
                            name : $('#txt_name').val(),
                            email : $('#txt_email').val(),
                            head_count : $('#txt_attendees').val()
                        },
                        success: data => 
                        {
                            console.log(data);
                            $('#modal_event_confirm').modal('hide');
                            if(data == true)
                            {
                                iziToast.success({
                                    title: 'OK',
                                    message: 'Attendance Submitted!',
                                    position: 'center'
                                });
                            }
                            else
                            {
                                iziToast.error({
                                    title: 'OK',
                                    message: 'Opps Something went wrong. Please try again.',
                                    position: 'center'
                                });
                            }
                        }
                    });
                        instance.hide({
                            transitionOut: 'fadeOutUp'
                        }, toast, 'buttonName');
                    }, true], // true to focus
                    ['<button>CLOSE</button>', function (instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp'
                        }, toast, 'buttonName');
                    }]
                ]
        });
    }
    this_events.check_url = () =>
    {
        let curr_url = window.location.href;

        if(curr_url.substring(0,5) =='http')
        {
            path = 'https' + curr_url.substring('5');
            window.location.href = path;
        }
    }

    $('#modal_event_confirm').on('hidden.bs.modal', function (e) {
        $('#modal_event_confirm').attr('data-id',0);
    });

    return this_events; 
})();

