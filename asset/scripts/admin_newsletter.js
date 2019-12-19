
$(document).ready(function(){
    NEWSLETTER.get_newsletter();
});


const NEWSLETTER = (()=>
{
    this_newsletter = {};

    this_newsletter.get_newsletter = ()=>
    {
        $.ajax({
            url: 'get-newsletter',
            type: 'GET',
            success: data => 
            {
                // console.log(data);
                let tbody = '';

                $.each(data,function(){

                    tbody += ` <tr>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="NEWSLETTER.delete_newsletter(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                    </td>
                                    <td>
                                    <p>${this.email}</p>
                                    </td>
                                    <td>${this.created_at}</td>
                                </tr>`;
                });

               
                $('#tbl_admin_newsletter tbody').html(tbody);
                $('#tbl_admin_newsletter').DataTable();

            }
        });

    }

    this_newsletter.delete_newsletter = (delete_id) =>
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
                            url: 'delete-newsletter',
                            type: 'post',
                            data: 
                            {
                                id: delete_id
                            },
                            success:data =>
                            {
                                console.log(data);
                                NEWSLETTER.get_newsletter();
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

    return this_newsletter;
})();