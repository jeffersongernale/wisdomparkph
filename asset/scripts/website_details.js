
$(document).ready(()=>{
    DETAILS.get_data();
    DETAILS.get_facilities();
    DETAILS.get_orgchart();
   
});



const DETAILS = (()=>
{

    let this_details = {};
    let facilities_update_id = 0;
    let org_chart_update_id = 0;


    this_details.get_data = () =>
    {
        $.ajax({
            url: 'get-details',
            type: 'GET',
            success:data =>
            {
                console.log(data);
                let mission_text = '';
                let vision_text = '';
                let goals = '';
                let faqs_text = '';
                let about_text = ` <thead>
                                    <th>TITLE</th>
                                    <th>DESCRIPTION</th>
                                    <th>SEQUENCE</th>
                                    <th>CONTROLS</th>
                                </thead><tbody>`;
                $.each(data,function(){
                    if (this.section === 'mission')
                    {
                        mission_text = `&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${this.description}`;
                    }

                    if (this.section === 'vision')
                    {
                        vision_text = `&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${this.description}`;
                    }

                    if (this.section === 'goals')
                    {
                        goals+=`<tr>
                                    <td>
                                        <textarea id="txt_description_${this.id}" class="form-control">${this.description}</textarea>
                                    </td>
                                    <td class="pt-4 text-nowrap"  style="width: 20px;">
                                        <button type="button" class="btn btn-sm btn-secondary text-nowrap" onclick="DETAILS.update_goals(${this.id})"><i class="fa fa-save"></i>&nbsp;SAVE</button>
                                        <button type="button" class="btn btn-sm btn-danger" title="DELETE" onclick="DETAILS.delete_details(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                    </td>
                                </tr>`;
                    }

                    if (this.section === 'faqs')
                    {
                        faqs_text+=`<tr>
                        
                        <td>
                            <textarea id="txt_description_${this.id}" class="form-control">${this.description}</textarea>
                        </td>
                        <td>
                            <textarea id="txt_answer_${this.id}" class="form-control">${this.answer}</textarea>
                        </td>
                        <td class="pt-4 text-nowrap"  style="width: 20px;">
                            <button type="button" class="btn btn-sm btn-secondary text-nowrap" onclick="DETAILS.update_faqs(${this.id})"><i class="fa fa-save"></i>&nbsp;SAVE</button>
                            <button type="button" class="btn btn-sm btn-danger" title="DELETE" onclick="DETAILS.delete_details(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                        </td>
                    </tr>`;
                    }

                    if(this.section === 'about')
                    {
                        about_text+=`<tr>
                                        <td><input type="text" class="form-control" value="${this.title}" id="txt_about_title_${this.id}"></td>
                                        <td><textarea class="form-control" rows="5" id="txt_about_desc_${this.id}">${this.description}</textarea></td>
                                        <td><input type="number" class="form-control" value="${this.sequence_number}" id="txt_about_seq_${this.id}"></td>
                                        <td class="pt-4 text-nowrap"  style="width: 20px;">
                                            <button type="button" class="btn btn-sm btn-secondary text-nowrap" onclick="DETAILS.update_about(${this.id})"><i class="fa fa-save"></i>&nbsp;SAVE</button>
                                            <button type="button" class="btn btn-sm btn-danger" title="DELETE" onclick="DETAILS.delete_details(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                        </td>
                                    </tr>` 
                    }
                });
                about_text+='</tbody>';

                $('#current_mission').html(mission_text);
                $('#current_vision').html(vision_text);
                $('#current_goals tbody').html(goals);
                $('#current_faqs tbody').html(faqs_text);
                $('#tbl_admin_about').html(about_text);

               
                
            },
            complete: () =>
            {
                if ($.fn.DataTable.isDataTable( '#current_faqs' ) ) {
                    $('#current_faqs').dataTable().destroy();
                }
                $('#current_faqs').dataTable();

                if ($.fn.DataTable.isDataTable( '#current_goals' ) ) {
                    $('#current_goals').dataTable().destroy();
                }
                $('#current_goals').dataTable();
                $('#tbl_admin_about').dataTable();
            }
        });
    }

    this_details.update_mission = () =>
    {

        if($('#txt_mission').val() == '')
        {
            iziToast.error({
                title: 'OK',
                message: 'Please Complete all fields',
                position: 'center'
            });
        }
        else
        {
            $.ajax({
                url:'update-mission',
                type:'post',
                data:{
                    description : $('#txt_mission').val()
                },
                success: data =>
                {
                    console.log(data);
                    if(data == true)
                    {
                        iziToast.success({
                            title: 'OK',
                            message: 'Record Updated Successfully!',
                            position: 'center'
                        });
                        $('#txt_mission').val('');
                    }
                    else
                    {
                        iziToast.error({
                            title: 'OK',
                            message: 'Opps Something went wrong. Please try again.',
                            position: 'center'
                        });
                    }
                    DETAILS.get_data();
                }
            });
        }
       
    }

    this_details.update_vision = () =>
    {

        if($('#txt_vision').val() == '')
        {
            iziToast.error({
                title: 'OK',
                message: 'Please Complete all fields',
                position: 'center'
            });
        }
        else
        {
            $.ajax({
                url:'update-vision',
                type:'post',
                data:{
                    description : $('#txt_vision').val()
                },
                success: data =>
                {
                    console.log(data);
                    if(data == true)
                    {
                        iziToast.success({
                            title: 'OK',
                            message: 'Record Updated Successfully!',
                            position: 'center'
                        });
                        $('#txt_vision').val('');
                    }
                    else
                    {
                        iziToast.error({
                            title: 'OK',
                            message: 'Opps Something went wrong. Please try again.',
                            position: 'center'
                        });
                    }
                    DETAILS.get_data();
                }
            });
        }
    }

    this_details.update_goals = (id) =>
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
                        url:'update-goals',
                        type:'post',
                        data:{
                            'description' : $(`#txt_description_${id}`).val(),
                            'id'          : id
                        },
                        success: data =>
                        {
                            console.log(data);
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
                            DETAILS.get_data();
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

    this_details.insert_goals = () =>
    {
        $.ajax({
            url:'insert-details',
            type:'post',
            data:{
                'section'     : 'goals',
                'description' : $(`#txt_goals`).val()
            },
            success: data =>
            {
                console.log(data);
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Record Inserted Successfully!',
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
                DETAILS.get_data();
                $(`#txt_goals`).val('');
            }
        });
    }
    
    this_details.delete_details = (id) =>
    {
        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to delete this?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here
                       $.ajax({
                        url:'delete-details',
                        type:'post',
                        data:{
                            'id': id
                        },
                        success: data =>
                        {
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
                                    message: 'Opps Something went wrong. Please try again.',
                                    position: 'center'
                                });
                            }
            
                            DETAILS.get_data();
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

    this_details.update_faqs = (id) =>
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
                        url:'update-faqs',
                        type:'post',
                        data:{
                            'description' : $(`#txt_description_${id}`).val(),
                            'answer'      : $(`#txt_answer_${id}`).val(),
                            'id'          : id
                        },
                        success: data =>
                        {
                            console.log(data);
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

    this_details.insert_faqs = () =>
    {
        $.ajax({
            url:'insert-details',
            type:'post',
            data:{
                'section'     : 'faqs',
                'description' : $(`#txt_question`).val(),
                'answer'      : $(`#txt_answer`).val()
            },
            success: data =>
            {
                console.log(data);
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Record Inserted Successfully!',
                        position: 'center'
                    }); 
                    
                    $(`#txt_question`).val('');
                    $(`#txt_answer`).val('');
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: 'Opps Something went wrong. Please try again.',
                        position: 'center'
                    });
                }
                DETAILS.get_data();
            }
        });
    }

    this_details.insert_facilities = () =>
    {
        $.ajax({
            url        : 'insert-facilities',
            type       : 'POST',
            data       : new FormData($('#form_facilities')[0]),
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

                    DETAILS.get_facilities();
                    $('#form_facilities')[0].reset();
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'center'
                    });
                }
             
            }
        });
    }

    this_details.get_facilities = () => 
    {
        $.ajax({
            url: 'get-facilities-details',
            type: 'GET',
            success:data => 
            {
                console.log(data);

                let tbody = `<thead>
                <th class="text-nowrap text-center" style="width:20vw;">CONTROLS</th>
                <th  class="text-nowrap">TITLE</th>
                <th>DESCRIPTION</th>
                </thead> <tbody>`;
                
                $.each(data,function(){
                    tbody += `<tr class="text-center">
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm"  onclick="window.open('${_BASE_URL}asset/upload/facilities/${this.image}')" title="View Picture"><i class="fa fa-eye"></i></a>
                                    <button type="button"  class="btn btn-primary btn-sm" onclick="DETAILS.show_modal_facilities_change_pic(${this.id})"" title="Change Picture"><i class="fa fa-camera"></i></button>
                                    <button type="button" class="btn btn-success btn-sm" onclick="DETAILS.update_facilities(${this.id})" title="Save Updated Details"><i class="fa fa-save"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="DETAILS.delete_facilities(${this.id})" title="Delete"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="txt_facilities_name_${this.id}" value="${this.facilities_name}">
                                </td>
                                <td>
                                    <textarea rows="5" class="form-control" id="txt_facilities_desc_${this.id}">${this.description}</textarea>
                                </td>
                            </tr>`;
                });
                tbody+='</tbody>';
                $('#tbl_admin_facilities').html(tbody);
                $('#tbl_admin_facilities').DataTable().destroy();
                $('#tbl_admin_facilities').DataTable({
                    pageLength: 10
                });
               

            }
        });
    }

    this_details.delete_facilities = (id) => 
    {
        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to delete this?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here
                        $.ajax({
                            url:'delete-facilities',
                            type:'post',
                            data:{
                                'id': id
                            },
                            success: data =>
                            {
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
                                        message: 'Opps Something went wrong. Please try again.',
                                        position: 'center'
                                    });
                                }
                
                                DETAILS.get_facilities();
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

    this_details.update_facilities = (id) =>
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
                        url: 'update-facilities',
                        type: 'post',
                        data:
                        {
                            'id': id, 
                            facilities_name : $(`#txt_facilities_name_${id}`).val(),
                            description     : $(`#txt_facilities_desc_${id}`).val()
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
            
                            DETAILS.get_facilities();
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

    this_details.show_modal_facilities_change_pic = (id) =>
    {
        facilities_update_id = id;
        $('#modal_facilities_change_pic').modal('show');
    }

    this_details.update_facilities_modals_submit = () =>
    {
        var form = new FormData($('#modal_form_facilities')[0]);
        form.append('id',facilities_update_id);

        $.ajax({
            url        : 'update-facilities-pic',
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
                        message: 'Record Deleted Successfully!',
                        position: 'center'
                    });
                    $('#modal_facilities_change_pic').modal('hide');

                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'center'
                    });
                }
                DETAILS.get_facilities();
            }
        });


      
    }

    $('#modal_facilities_change_pic').on('hidden.bs.modal', function(){
        facilities_update_id = 0;
        $('#modal_form_facilities')[0].reset();
    });


    this_details.insert_about = () =>
    {

        if($('#txt_about_title').val() == '' ||  $('#txt_about_desc').val() == '')
        {
            iziToast.error({
                title: 'OK',
                message: 'Please Complete all fields',
                position: 'center'
            });
        }
        else
        {
            $.ajax({
                url: 'insert-about',
                type: 'POST',
                data: 
                {
                    title           : $('#txt_about_title').val(),
                    sequence_number : $('#txt_sequence_number').val(),
                    description     : $('#txt_about_desc').val(),
                },
                success: data =>
                {
                    if(data == true)
                    {
                        iziToast.success({
                            title: 'OK',
                            message: 'Record Inserted Successfully!',
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
                    DETAILS.get_data();
                     $('#txt_about_title').val('');
                     $('#txt_sequence_number').val('');
                     $('#txt_about_desc').val('');
                }
            });
        }
       
    }

    this_details.update_about = (details_id) =>
    {

        if($('#txt_about_title_'+details_id).val() == '' ||  $('#txt_about_desc_'+details_id).val() == '' || $('#txt_about_seq_'+details_id).val() == '')
        {
            iziToast.error({
                title: 'OK',
                message: 'Please Complete all fields',
                position: 'center'
            });
        }
        else
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
                            url: 'update-about',
                            type: 'post',
                            data:
                            {
                                id: details_id, 
                                title : $(`#txt_about_title_${details_id}`).val(),
                                description     : $(`#txt_about_desc_${details_id}`).val(),
                                sequence_number: $(`#txt_about_seq_${details_id}`).val()
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
                
                                DETAILS.get_facilities();
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
    }

    this_details.insert_org_chart = () =>
    {
        $.ajax({
            url        : 'insert-org-chart',
            type       : 'POST',
            data       : new FormData($('#form_org_chart')[0]),
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

                    DETAILS.get_orgchart();
                    $('#form_org_chart')[0].reset();
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'center'
                    });
                }
             
            }
        });
    }

    this_details.get_orgchart = () =>
    {
        $.ajax({
            url: 'get-orgchart',
            type: 'GET',
            success: data =>
            {
                console.log(data);
                let orgchart_details = '';
                $.each(data,function(){

                    orgchart_details += `
                        <tr>
                            
                            <td class="text-nowrap">
                            <a href="#" class="btn btn-primary btn-sm"  onclick="window.open('${_BASE_URL}asset/upload/org_chart/${this.image_name}')" title="View Picture"><i class="fa fa-eye"></i></a>
                            <button type="button"  class="btn btn-primary btn-sm"  onclick="DETAILS.show_modal_org_chart_change_pic(${this.id})" title="Change Picture"><i class="fa fa-camera"></i></button>
                            <button type="button" class="btn btn-success btn-sm" onclick="DETAILS.update_orgchart(${this.id})"  title="Save Updated Details"><i class="fa fa-save"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="DETAILS.delete_orgchart(${this.id})" title="Delete"><i class="fa fa-trash"></i></button>
                            </td>
                            <td class="text-nowrap">
                                <input type="text" class="form-control" id="txt_org_name_${this.id}" value="${this.name}">
                            </td>
                            <td class="text-nowrap">
                                <input type="text" class="form-control" id="txt_org_position_${this.id}" value="${this.position}">
                            </td>
                        </tr>
                    `;
                });

                $('#tbl_org_chart tbody').html(orgchart_details);
                $('#tbl_org_chart').DataTable();
                
            }
        });
    }

    this_details.update_orgchart = (id) =>
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
                        url: 'update-org-chart',
                        type: 'post',
                        data:
                        {
                            'id'         : id, 
                            name         : $(`#txt_org_name_${id}`).val(),
                            position     : $(`#txt_org_position_${id}`).val()
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
            
                            DETAILS.get_orgchart();
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


    this_details.delete_orgchart = (id) => 
    {
        iziToast.show({
                theme: 'dark',
                icon: 'icon-person',
                title: 'Confirmation :',
                message: 'Are you sure you want to delete this?',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, center, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                titleSize: '20px',
                messageSize: '20px',
                transitionIn:'bounceInUp',
                buttons: [
                    [`<button>YES</button>`, function (instance, toast) {
                       //ajax here
                        $.ajax({
                            url:'delete-org-chart',
                            type:'post',
                            data:{
                                'id': id
                            },
                            success: data =>
                            {
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
                                        message: 'Opps Something went wrong. Please try again.',
                                        position: 'center'
                                    });
                                }
                
                                DETAILS.get_orgchart();
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

    this_details.show_modal_org_chart_change_pic = (id) =>
    {
        org_chart_update_id = id;
        $('#modal_org_chart_change_pic').modal('show');
    }

    $('#modal_org_chart_change_pic').on('hidden.bs.modal', function(){
        org_chart_update_id = 0;
        $('#modal_form_org_chart')[0].reset();
    });

    this_details.update_org_chart_modals_submit = () =>
    {
        var form = new FormData($('#modal_form_org_chart')[0]);
        form.append('id',org_chart_update_id);

        $.ajax({
            url        : 'update-org-chart-pic',
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
                        message: 'Record Deleted Successfully!',
                        position: 'center'
                    });
                    $('#modal_org_chart_change_pic').modal('hide');

                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'center'
                    });
                }
                DETAILS.get_orgchart();
            }
        });


      
    }
    
    return this_details;
})();


