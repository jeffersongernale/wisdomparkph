$(document).ready(()=>{
    EVENTS.get_details();
});

const EVENTS = (()=>
{
    let this_events = {};

    this_events.get_details = () =>
    {
        $.ajax({
            url : 'get-events',
            type: 'GET',
            success:data =>
            {
                console.log(data);

                let events_detail = '';
                $.each(data,function(){
                    events_detail += `<div class="col-md-12 col-lg-12 mb-12 mb-lg-12 mb-5 mt-5" data-aos="fade-up">
                    <div class="unit-4">
                    <img class="image-size" src="${_BASE_URL}asset/upload/event/${this.image}">
                    <div class="mt-5">
                        <h3>${this.title}</h3>
                        <p><b>EVENT DATE:</b> ${this.event_date}</p>
                        <p>${this.description}</p>
                    </div>
                    </div>
                </div>`;
                });

                $('#facilities_data').html(events_detail);
            }
        });

    }


    return this_events; 
})();