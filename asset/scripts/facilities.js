$(document).ready(()=>{
    FACILITIES.get_details();
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
                    <img class="image-size" src="asset/upload/facilities/${this.image}">
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


    return this_facilities; 
})();