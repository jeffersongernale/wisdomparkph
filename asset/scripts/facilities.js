$(document).ready(()=>{
    FACILITIES.get_details();
    FACILITIES.check_url();
});

const FACILITIES = (()=>
{
    let this_facilities = {};

    this_facilities.get_details = () =>
    {
        $.ajax({
            url : 'get-facilities-details',
            type: 'GET',
            success:data =>
            {
                console.log(data);

                let facility_detail = '';
                $.each(data,function(){
                    facility_detail += `<div class="col-md-6 col-lg-6 mb-4 mb-lg-6" data-aos="fade-up">
                    <div class="unit-4">
                    <img class="image-size" src="${_BASE_URL}asset/upload/facilities/${this.image}">
                    <div class="mt-5">
                        <h3>${this.facilities_name}</h3>
                        <p>${this.description}</p>
                    </div>
                    </div>
                </div>`;
                });

                $('#facilities_data').html(facility_detail);
            }
        });

    }

    this_facilities.check_url = () =>
    {
        let curr_url = window.location.href;

        if(curr_url.substring(0,5) =='http:')
        {
            path = 'https' + curr_url.substring('5');
            window.location.href = path;
        }
    }

    return this_facilities; 
})();