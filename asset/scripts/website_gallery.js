$(document).ready(function(){
    // GALLERY.get_data();
});





const GALLERY = (()=>
{
    let this_gallery = {};

    this_gallery.get_data = () =>
    {
        $.ajax({
            url: 'get-gallery',
            type: 'GET',
            success: data =>
            {
                console.log(data);
                let details = '';
                $.each(data, function(key,value){
                    $.each(value, function(){
                    if(key == 'photos')
                    {
                        details+= `
                        <div class="item ${key} col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                            <a href="asset/upload/gallery/photo/${this.image_name}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="asset/upload/gallery/photo/${this.image_name}">
                            </a>
                        </div>`;
                    }
                    else if(key == 'videos')
                    {
                        details+= `
                        <div class="item ${key} col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                            <a href="asset/upload/gallery/photo/${this.image_name}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="asset/upload/gallery/photo/${this.image_name}">
                            </a>
                        </div>`;
                    }
                    else if(key == 'songs')
                    {
                        details+= `
                        <div class="item ${key} col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                            <a href="asset/upload/gallery/photo/${this.image_name}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="asset/upload/gallery/photo/${this.image_name}">
                            </a>
                        </div>`;
                    }
                    });
                   
                    
                });
                
                $('.gallery_container').append(details);


               


            }
        });
    }

  
    return this_gallery;
})();