
$(document).ready(()=>{
    GALLERY.load_gallery();
});


const GALLERY = (()=>
{
    let this_gallery = {};

    this_gallery.load_gallery = () =>
    {
        $.ajax({
            url: 'get-gallery',
            type:'GET',
            success:data=>
            {
                console.log(data);
                let gallery_details = '';
                gallery_details +=`<thead>
                                        <th class="text-nowrap text-center" style="width:20vw;">CONTROLS</th>
                                        <th>IMAGE</th>
                                    </thead>
                                    <tbody class="text-center">`;
                $.each(data['photos'],function(){
                    gallery_details += ` <tr>
                    <td>
                    <a href="#" class="btn btn-primary btn-sm"  onclick="window.open('asset/upload/gallery/photo/${this.image_name}')" title="View Picture"><i class="fa fa-eye"></i>&nbsp;VIEW PICTURE</a>
                        <button class="btn btn-danger btn-sm" onclick="GALLERY.delete_gallery_photo(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                    </td>
                    <td>
                        <img src="asset/upload/gallery/photo/${this.image_name}" style="width:20vw;">
                    </td>
                </tr>`;
                });
                gallery_details+='</tbody>';

                $('#tbl_gallery_admin').html(gallery_details);
                $('#tbl_gallery_admin').dataTable();
                
            }
        });

    }

    this_gallery.insert_gallery_photo = () =>
    {
        $.ajax({
            url        : 'insert-gallery-photo',
            type       : 'POST',
            data       : new FormData($('#gallery_upload')[0]),
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

                    GALLERY.load_gallery();
                    $('#gallery_upload')[0].reset();
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

    this_gallery.delete_gallery_photo = (id) =>
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
                            url:'delete-gallery-photo',
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
                
                                GALLERY.load_gallery();
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

    return this_gallery;
})();