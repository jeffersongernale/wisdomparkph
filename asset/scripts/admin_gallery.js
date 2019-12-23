
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
                let gallery_photo = '';
                gallery_photo +=`<thead>
                                        <th class="text-nowrap text-center" style="width:20vw;">CONTROLS</th>
                                        <th>IMAGE</th>
                                    </thead>
                                    <tbody class="text-center">`;
                $.each(data['photos'],function(){
                    gallery_photo += ` <tr>
                    <td>
                    <a href="#" class="btn btn-primary btn-sm"  onclick="window.open('${_BASE_URL}asset/upload/gallery/photo/${this.image_name}')" title="View Picture"><i class="fa fa-eye"></i>&nbsp;VIEW PICTURE</a>
                        <button class="btn btn-danger btn-sm" onclick="GALLERY.delete_gallery_photo(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                    </td>
                    <td>
                        <img src="asset/upload/gallery/photo/${this.image_name}" style="width:20vw;">
                    </td>
                </tr>`;
                });
                gallery_photo+='</tbody>';
                // $('#tbl_photo_admin').dataTable().destroy();
                $('#tbl_photo_admin').html(gallery_photo);
                $('#tbl_photo_admin').DataTable().destroy();
                $('#tbl_photo_admin').DataTable({
                    pageLength: 2
                });


                
                let gallery_video = '';
                gallery_video =`<thead>
                                    <th class="text-nowrap text-center">CONTROLS</th>
                                    <th class="text-nowrap text-center">PREVIEW</th>
                                    <th class="text-nowrap text-center" >VIDEO ID</th>
                                </thead>`;
                $.each(data['videos'],function(){
                    gallery_video += ` <tr class="text-center">
                                            <td  style="width:20%" class="text-nowrap text-center">
                                                <button class="btn btn-primary btn-sm" onclick="window.open('https://www.youtube.com/watch?v=${this.image_name}')"><i class="fab fa-youtube"></i>&nbsp;PLAY IN YOUTUBE</button>
                                                <button class="btn btn-danger btn-sm" onclick="GALLERY.delete_gallery_video(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                            </td>
                                            <td  style="width: 30%">
                                                <iframe width='420' height='315'
                                                src='https://www.youtube.com/embed/${this.image_name}?playlist=tgbNymZ7vqY&loop=1'>
                                                </iframe>
                                            </td>
                                            <td  style="width: 50%">
                                                <p>${this.image_name}</p>
                                            </td>
                                        </tr>`;
                });
                $('#tbl_video_admin').html(gallery_video);
                $('#tbl_video_admin').DataTable().destroy();
                $('#tbl_video_admin').DataTable({
                    pageLength: 2
                });

                let gallery_songs = '';
                gallery_songs =`<thead>
                                    <th class="text-nowrap text-center">CONTROLS</th>
                                    <th class="text-nowrap text-center">AUDIO</th>
                                    <th class="text-nowrap text-center" >FILE NAME</th>
                                </thead>`;
                $.each(data['songs'],function(){
                    gallery_songs += ` <tr class="text-center">
                                            <td  style="width:20%" class="text-nowrap text-center">
                                                <button class="btn btn-danger btn-sm" onclick="GALLERY.delete_gallery_songs(${this.id})"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                                            </td>
                                            <td  style="width: 30%">
                                            <audio controls>
                                                <source src='${_BASE_URL}asset/upload/gallery/songs/${this.image_name}' type='audio/mpeg'>
                                            </audio>
                                            </td>
                                            <td  style="width: 50%">
                                                <p>${this.image_name}</p>
                                            </td>
                                        </tr>`;
                });
                $('#tbl_songs_admin').html(gallery_songs);
                $('#tbl_songs_admin').DataTable().destroy();
                $('#tbl_songs_admin').DataTable({
                    pageLength: 2
                });


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

    this_gallery.delete_gallery_video = (id) =>
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
                            url:'delete-gallery-video',
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
    
    this_gallery.insert_gallery_songs = () =>
    {
        $.ajax({
            url        : 'insert-gallery-songs',
            type       : 'POST',
            data       : new FormData($('#gallery_songs')[0]),
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
                    $('#gallery_songs')[0].reset();
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

    this_gallery.insert_gallery_video = () =>
    {
        $.ajax({
            url        : 'insert-gallery-video',
            type       : 'POST',
            data       : {
                image_name: $('#txt_video_yt').val(),
                description: $('#txt_video_desc').val()
            },
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
                    $('#txt_video_yt').val('');
                    $('#txt_video_desc').val('');
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

    this_gallery.delete_gallery_songs = (id) =>
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
                            url:'delete-gallery-songs',
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