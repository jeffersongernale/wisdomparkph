$(document).ready(()=>
{
    EVENTS.get_event();
    EVENTS.get_section();
});

const EVENTS = (()=>
{
    let this_events = {};
    let events_update_id = 0;
    let events_link_update_id = 0;

    this_events.get_event = () =>
    {
        $.ajax({
            url : 'get-events',
            type: 'GET',
            success:data =>
            {
             

                let events_detail = '';
                $.each(data,function(){
                    
                    let event_date = this.event_date.substring(0,10);
                    let event_time = this.event_date.substring(11);
                    events_detail += `<tr>
                                        <td class="text-nowrap">
                                            <button onclick="EVENTS.show_modal_links(${this.id})" title="LINKS" class="btn btn-sm btn-primary"><i class="fa fa-link"></i></button>
                                            <a href="#" onclick="window.open('${_BASE_URL}asset/upload/event/${this.image}')" title="VIEW PICTURE" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            <button onclick="EVENTS.show_modal_events_change_pic(${this.id})" title="CHANGE PICTURE" class="btn btn-sm btn-primary"><i class="fa fa-camera"></i></button>
                                            <button title="SAVE CHANGES" type="button" class="btn btn-sm btn-success" onclick="EVENTS.update_event(${this.id})"><i class="fa fa-save"></i></button>
                                            <button title="DELETE" class="btn btn-sm btn-danger" onclick="EVENTS.delete_event(${this.id})"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="txt_title_${this.id}" value="${this.title}">
                                        </td>
                                        <td style="width:500px">
                                            <textarea class="form-control" rows="5" id="txt_description_${this.id}">${this.description}</textarea>
                                        </td>
                                        <td class="text-nowrap">
                                            <input type="date" class="form-control" id="txt_event_date_${this.id}" value="${event_date}">
                                        </td>
                                       
                                        <td class="text-nowrap">
                                            <input type="text" class="form-control" id="slc_section_${this.id}" value="${this.section}">
                                        </td>
                                      </tr>`;
                });

                $('#tbl_admin_events tbody').html(events_detail);
                $('#tbl_admin_events').DataTable();
            }
        });

    }

    this_events.get_section = () =>
    {
        $.ajax({
            url : 'select-events-section',
            type: 'GET',
            success:data =>
            {
               

                let events_detail = '';
                $.each(data,function(){
                    events_detail += `<option>${this.section}</option>`;
                });

                $('#datalist_section').html(events_detail);
            }
        });

    }

    this_events.insert_event = () =>
    {
        $.ajax({
            url: 'insert-event',
            type: 'post',
            data: new FormData($('#form_event')[0]),
            processData: false,
            contentType: false,
            cache      : false,
            success: data =>
            {
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Record Inserted Successfully!',
                        position: 'center'
                    });
                    $('#form_event')[0].reset();
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: 'Opps Something went wrong. Please try again.',
                        position: 'center'
                    });
                }
                EVENTS.get_event();
            }
        });
    }

    this_events.delete_event = (id) =>
    {

        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to delete this? Deleting this data will delete all confirmed attendees in this event.',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here
                       $.ajax({
                            url: 'delete-event',
                            type: 'post',
                            data: {
                            'id':id
                            },
                            success: data =>
                            {
                                if(data == true)
                                {
                                    iziToast.success({
                                        title: 'OK',
                                        message: 'Record Deleted Successfully!',
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
                                EVENTS.get_event();
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

    this_events.update_event = (id) =>
    {

        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to update this?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here

                       $.ajax({
                            url: 'update-event',
                            type: 'post',
                            data: {
                                title: $(`#txt_title_${id}`).val(),
                                event_date: $(`#txt_event_date_${id}`).val(),
                                description: $(`#txt_description_${id}`).val(),
                                section: $(`#slc_section_${id}`).val(),
                                event_time : $(`#txt_event_time_${id}`).val(),
                                'id':id
                            },
                            success: data =>
                            {
                                if(data == true)
                                {
                                    iziToast.success({
                                        title: 'OK',
                                        message: 'Record Updated Successfully!',
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
                                EVENTS.get_event();
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

    this_events.show_modal_events_change_pic = (id) =>
    {
        events_update_id = id;
        $('#modal_events_change_pic').modal('show');
    }

  

    $('#modal_events_change_pic').on('hidden.bs.modal', function(){
        events_update_id = 0;
        $('#modal_form_events')[0].reset();
    });

    this_events.update_event_modals_submit = () =>
    {
        var form = new FormData($('#modal_form_events')[0]);
        form.append('id',events_update_id);

        $.ajax({
            url        : 'update-events-pic',
            type       : 'POST',
            data       : form,
            processData: false,
            contentType: false,
            cache      : false,
            success: data => 
            {
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Record Updated Successfully!',
                        position: 'center'
                    });
                    $('#modal_events_change_pic').modal('hide');

                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'center'
                    });
                }
                EVENTS.get_event();
            }
        });


      
    }

    this_events.add_lists = () =>
    {
        let link = $('#txt_add_link').val();
        $('#txt_select_links').append(`<option value="${link}">${link}</option>`); 
        $('#txt_select_links').val(link);

    
        $('#txt_add_link').val('');

        let value = '';
        $("#txt_select_links option").each(function()
        {
            value += $(this).val() + "~";
        });

        $('#txt_list_links').html(value);
    }

    this_events.delete_lists = () =>
    {
        let list_val = $('#txt_select_links').val();
        $('select').children(`option[value="${list_val}"]`).remove();
        let value = '';
        $("#txt_select_links option").each(function()
        {
            value += $(this).val() + "~";
        });

        $('#txt_list_links').html(value);
    }

    this_events.show_modal_links = (id) =>
    {
        events_link_update_id = id;
        $('#modal_links').modal('show');
        $('.modal_links_list').html('');
        EVENTS.load_links(id);

    }

    $('#modal_links').on('hidden.bs.modal', function(){
        events_link_update_id = 0;
    });


    this_events.load_links = (id) =>
    {
        $.ajax({
            url : 'get-event-links',
            type: 'GET',
            data : {
                event_id : id
            },
            success : data =>
            {
               
                let table_data = '';
                table_data = ` <input type="text" name="add_new_link" id="add_new_link" placeholder="ADD NEW LINK" class="form-control col-9 float-left"> 
                <button class="btn btn-success btn-sm ml-1 mb-3 col-2 float-right" onclick="EVENTS.add_links(${id})"><i class="fa fa-save"></i>&nbsp;SAVE</button>`;
                table_data += `<table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="width: 30%">CONTROLS</th>
                            <th style="width: 70%">CONTENT</th>
                        </tr>
                    </thead>
                    <tbody>
                    `;
                $.each(data, function(){
                    console.log(this.link);
                    table_data += `
                        <tr>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="EVENTS.update_links(${this.id})"><i class="fa fa-save"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="EVENTS.delete_links(${this.id})"><i class="fa fa-trash"></i></button>
                            </td>
                            <td>
                               <input class="form-control" id="txt_edit_links_${this.id}" value="${this.link}">
                            </td>
                        </tr>`;
    
                });
                table_data += '</tbody></table>';
                $('.modal_links_list').html(table_data);

            }
        });
    }

    this_events.delete_links = (id) =>
    {
        

        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to delete this? ',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here
                      $.ajax({
                            url : 'delete-event-links',
                            type : 'POST',
                            data : {
                                'id' : id 
                            },
                            success: data => {
                                console.log(data);
                                if(data == true)
                                {
                                    iziToast.success({
                                        title: 'OK',
                                        message: 'Record Deleted Successfully!',
                                        position: 'center'
                                    });
                                }
                                else
                                {
                                    iziToast.error({
                                        title: 'OK',
                                        message: data,
                                        position: 'center'
                                    });
                                }
                                EVENTS.load_links(events_link_update_id);
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
    
    this_events.add_links = id =>
    {
        $.ajax({
            url : 'insert-event-links',
            type: 'POST',
            data : 
            {
                event_id : id,
                link : $('#add_new_link').val()
            },
            success : data =>
            {
                 if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Record Deleted Successfully!',
                        position: 'center'
                    });
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data,
                        position: 'center'
                    });
                }
                EVENTS.load_links(events_link_update_id);
            }
        })
    }

    this_events.update_links = id =>
    {
        $.ajax({
            url        : 'update-event-links',
            type       : 'POST',
            data       : {
                'id' : id,
                link : $(`#txt_edit_links_${id}`).val()
            },
           
            success: data => 
            {
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Record Updated Successfully!',
                        position: 'center'
                    });
                    $('#modal_events_change_pic').modal('hide');

                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'center'
                    });
                }
                EVENTS.get_event();
            }
        });
    }

    return this_events;
})();