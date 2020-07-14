$(document).ready(function(){
    GALLERY.check_url();
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
                            <a href="${_BASE_URL}asset/upload/gallery/photo/${this.image_name}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="${_BASE_URL}asset/upload/gallery/photo/${this.image_name}">
                            </a>
                        </div>`;
                    }
                    else if(key == 'videos')
                    {
                        details+= `
                        <div class="item ${key} col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                            <a href="${_BASE_URL}asset/upload/gallery/photo/${this.image_name}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="${_BASE_URL}asset/upload/gallery/photo/${this.image_name}">
                            </a>
                        </div>`;
                    }
                    else if(key == 'songs')
                    {
                        details+= `
                        <div class="item ${key} col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                            <a href="${_BASE_URL}asset/upload/gallery/photo/${this.image_name}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="${_BASE_URL}asset/upload/gallery/photo/${this.image_name}">
                            </a>
                        </div>`;
                    }
                    });
                   
                    
                });
                
                $('.gallery_container').append(details);


               


            }
        });
    }

    this_gallery.check_url = () =>
    {
        let curr_url = window.location.href;

        if(curr_url.substring(0,5) =='http')
        {
            path = 'https' + curr_url.substring('5');
            window.location.href = path;
        }
    }

  
    return this_gallery;
})();