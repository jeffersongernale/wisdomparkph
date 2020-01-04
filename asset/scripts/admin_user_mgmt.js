$(document).ready(function(){
    USER.get_users();
});

const USER = (()=>
{

    let this_user = {};
    let update_id = 0;
    this_user.get_users = () =>
    {

        $.ajax({
            url: 'get-users',
            type: 'GET',
            success: data =>
            {
                let tbody = '';

                $.each(data, function()
                {
                    tbody += `
                        <tr>
                            <td class="text-nowrap">
                                <button class="btn btn-sm btn-primary" type="button" onclick="USER.show_modal(${this.id})"><i class="fa fa-edit"></i>&nbsp;EDIT</button>
                                <button class="btn btn-sm btn-danger" type="button" onclick = "USER.delete_user(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                            </td>
                            <td>${this.name}</td>
                            <td>${this.created_at}</td>
                        </tr>
                    `;
                });


                $('#tbl_user_mgmt tbody').html(tbody);
                $('#tbl_user_mgmt').DataTable();

            }
        });

    }


    this_user.validate_data = () =>
    {
        let result = '';
        if($('#txt_password').val() == '' ||  $('#txt_confirm_password').val() == '' || 
        $('#txt_username').val() == '' || $('#txt_name').val() == '')
        {
            result = 'Please complete all fields';
        }
        else
        {
            if($('#txt_password').val() == $('#txt_confirm_password').val())
            {
                result = 'good';
            }
            else
            {
                result = 'Password not match!';
            }
        }

        return result;
    }


    this_user.insert_user = () =>
    {
        let validate = USER.validate_data();

        if(validate == 'good')
        {
            $.ajax({
                url: 'insert-users',
                type: 'POST',
                data: 
                {
                    name: $('#txt_name').val(),
                    username: $('#txt_username').val(),
                    password: $('#txt_password').val(),
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
                        $('#txt_name').val('');
                        $('#txt_username').val('');
                        $('#txt_password').val('');
                        USER.get_users();
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
        else
        {
            iziToast.error({
                title: 'ERROR',
                message: validate,
                position: 'center'
            }); 
        }
    }


    this_user.delete_user = (id) =>
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
                            url: 'delete-users',
                            type: 'POST',
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
                                USER.get_users();
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


    this_user.show_modal = (id) =>
    {
        $('#modal_users_edit').modal('show');
        update_id = id;
        USER.get_user_data();
    }


    $('#modal_users_edit').on('hidden.bs.modal', function(){
        update_id = 0;
    });


    this_user.update_user = () =>
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
                            url: 'update-users',
                            type: 'post',
                            data: {
                                name: $(`#txt_modal_name`).val(),
                                username: $(`#txt_modal_username`).val(),
                                password: $(`#txt_modal_password`).val(),
                                'id':update_id
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
                                    $('#modal_users_edit').modal('hide');

                                }
                                else
                                {
                                    iziToast.error({
                                        title: 'OK',
                                        message: 'Opps Something went wrong. Please try again.',
                                        position: 'center'
                                    });
                                }
                                USER.get_users();
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

    this_user.get_user_data = () =>
    {
        $.ajax({

            url: 'get-users-data',
            type: 'GET',
            data:
            {
                id: update_id
            },
            success: data =>
            {
                $.each(data,function(){
                    $('#txt_modal_name').val(this.name);
                    $('#txt_modal_username').val(this.username);
                    $('#txt_modal_password').val(this.password);
                });

            }
        });
    }


    return this_user;
})();