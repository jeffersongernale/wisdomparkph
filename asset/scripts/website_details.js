
$(document).ready(()=>{
    DETAILS.get_data();
    DETAILS.get_facilities();

   
});



const DETAILS = (()=>
{

    let this_details = {};



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
                });

                $('#current_mission').html(mission_text);
                $('#current_vision').html(vision_text);
                $('#current_goals tbody').html(goals);
                $('#current_faqs tbody').html(faqs_text);

                $('#current_faqs').DataTable().destroy();
                $('#current_faqs').DataTable();

                $('#current_goals').DataTable().destroy();
                $('#current_goals').DataTable();
                
            }
        });
    }

    this_details.update_mission = () =>
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
                DETAILS.get_data();
            }
        });
    }

    this_details.update_vision = () =>
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
                DETAILS.get_data();
            }
        });
    }

    this_details.update_goals = (id) =>
    {
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
                DETAILS.get_data();
            }
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
                DETAILS.get_data();
                $(`#txt_goals`).val('');
            }
        });
    }
    
    this_details.delete_details = (id) =>
    {
        $.ajax({
            url:'delete-details',
            type:'post',
            data:{
                'id': id
            },
            success: data =>
            {
                console.log(data);
                DETAILS.get_data();
            }
        });
    }

    this_details.update_faqs = (id) =>
    {
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
            }
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
                DETAILS.get_data();
                $(`#txt_question`).val('');
                $(`#txt_answer`).val('');
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
                        position: 'topCenter'
                    }); 

                    DETAILS.get_facilities();
                    $('#form_facilities')[0].reset();
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: data.error,
                        position: 'topCenter'
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

                let tbody = '';

                $.each(data,function(){
                    tbody += `<tr>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-image"></i>&nbsp;VIEW PICTURE</a>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;EDIT</button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                </td>
                                <td>
                                    ${this.facilities_name}
                                </td>
                                <td>
                                   <p>${this.description}</p>
                                </td>
                            </tr>`;
                });
                $('#tbl_admin_facilities').DataTable().destroy();
                $('#tbl_admin_facilities tbody').html(tbody);
                $('#tbl_admin_facilities').DataTable({
                    pageLength: 10
                });

            }
        });
    }
    
    return this_details;
})();