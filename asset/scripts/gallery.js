
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

                $.each(data['photos'],function(){
                    gallery_details += ` <tr>
                    <td>
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;EDIT</button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</button>
                    </td>
                    <td>
                        <img src="asset/images/Portfolio_Pictures/${this.image_name}" style="width:20vw">
                    </td>
                </tr>`;
                });

                $('#tbl_gallery_admin tbody').html(gallery_details);

            }
        });

    }

    return this_gallery;
})();