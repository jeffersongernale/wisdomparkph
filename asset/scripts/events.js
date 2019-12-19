$(document).ready(()=>{
    EVENTS.httpGet();
    EVENTS.get_details();
});

const EVENTS = (()=>
{
    let this_events = {};
    let _section ='';

    this_events.get_details = () =>
    {
        $.ajax({
            url : 'get-events',
            type: 'GET',
            data:
            {
                section: _section
            },
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
    this_events.httpGet = () =>
    {
        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);
        var section = url.searchParams.get("section");
        _section = section;
        console.log(_section);
    }

    return this_events; 
})();

