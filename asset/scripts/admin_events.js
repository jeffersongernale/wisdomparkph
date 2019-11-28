$(document).ready(()=>
{
    EVENTS.get_event();
    EVENTS.get_section();
});

const EVENTS = (()=>
{
    let this_events = {};

    this_events.get_event = () =>
    {
        $.ajax({
            url : 'get-events',
            type: 'GET',
            success:data =>
            {
                console.log(data);

                let events_detail = '';
                $.each(data,function(){
                    events_detail += `<tr>
                                        <td class="text-nowrap">
                                            <button type="button" class="btn btn-sm btn-primary" onclick="EVENTS.update_event(${this.id})"><i class="fa fa-save"></i></button>
                                            <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-sm btn-success"><i class="fa fa-image"></i></button>
                                            <button class="btn btn-sm btn-danger" onclick="EVENTS.delete_event(${this.id})"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="txt_title_${this.id}" value="${this.title}">
                                        </td>
                                        <td style="width:500px">
                                            <textarea class="form-control" rows="5" id="txt_description_${this.id}"> ${this.description}</textarea>
                                       </td>
                                        <td class="text-nowrap">
                                        <input type="date" class="form-control" id="txt_event_date_${this.id}" value="${this.event_date}">
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
                    
                    events_detail += `<tr>
                                        <td>
                                            <input type="text" class="form-control" id="txt_title_${this.id}" value="${this.section}">
                                        </td>
                                        <td class="text-nowrap">
                                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                      </tr>`;
                });

                $('#tbl_event_section tbody').html(events_detail);
            }
        });

    }

    this_events.insert_event = () =>
    {
        $.ajax({
            url: 'insert-event',
            type: 'post',
            data: {
                title: $('#txt_title').val(),
                event_date: $('#txt_date_event').val(),
                description: $('#txt_description').val(),
                section: $('#slc_section').val(),
            },
            success: data =>
            {
                console.log(data);
                EVENTS.get_event();
            }
        });
    }

    this_events.delete_event = (id) =>
    {
        $.ajax({
            url: 'delete-event',
            type: 'post',
            data: {
               'id':id
            },
            success: data =>
            {
                console.log(data);
                EVENTS.get_event();
            }
        });
    }

    this_events.update_event = (id) =>
    {
        $.ajax({
            url: 'update-event',
            type: 'post',
            data: {
                title: $(`#txt_title_${id}`).val(),
                event_date: $(`#txt_event_date_${id}`).val(),
                description: $(`#txt_description_${id}`).val(),
                section: $(`#slc_section_${id}`).val(),
                'id':id
            },
            success: data =>
            {
                console.log(data);
                EVENTS.get_event();
            }
        });
    }

    return this_events;
})();