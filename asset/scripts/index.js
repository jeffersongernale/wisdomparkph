$(document).ready(()=>{
    DETAILS.get_data();
    DETAILS.get_orgchart();
});

const DETAILS = (()=>
{
    let this_details = {};

    this_details.get_data = () =>
    {
        $.ajax({
            url: 'get-details',
            type: 'GET',
            success:data =>
            {
                console.log(data);
                let mission_text = '';
                let vision_text = '';
                let goals = '';
                let faqs_text = '';
                let ul_timeline = '';
                let ctr =1;
                let timeline_position = 'left';
                $.each(data,function(){
                    if (this.section === 'mission')
                    {
                        mission_text = `&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${this.description}`;
                    }

                    if (this.section === 'vision')
                    {
                        vision_text = `&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${this.description}`;
                    }
                    if (this.section === 'goals')
                    {
                        goals+=` <li>${this.description}</li>`;
                    }

                    if (this.section === 'faqs')
                    {

                        faqs_text+=`
                                    <div class="card faqs_card">
                                    <div class="card-header text-black text-uppercase faqs_header" id="headingOne" data-toggle="collapse" data-target="#collapse${this.id}" aria-expanded="true" aria-controls="collapse${this.id}">
                                    <h3 class="mb-0 h3">
                                           ${ctr}. ${this.description}
                                    
                                    </h3>
                                    </div>
                        
                                    <div id="collapse${this.id}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                    ${this.answer}
                                    </div>
                                    </div>
                                </div>
                        `;
                        ctr+=1;
                    }

                    if(this.section === 'about')
                    {

                        if(timeline_position === 'left')
                        {
                            ul_timeline += '<li><div class="timeline-badge"><i class="glyphicon glyphicon-credit-card"></i></div>';
                            timeline_position = 'right';
                        }
                        else
                        {
                            ul_timeline += '<li class="timeline-inverted"><div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>';
                            timeline_position = 'left';
                        }
                        ul_timeline += `
                            
                            <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">${this.title}</h4>
                            </div>
                            <div class="timeline-body">
                                <p>${this.description}</p>
                            </div>
                            </div>
                        </li>`;
                    }
                });
                $('#mission_text').html(mission_text);
                $('#vision_text').html(vision_text);
                $('#ul_goals').html(goals);
                $('.faqs_text').html(faqs_text);
                $('#ul_timeline').html(ul_timeline);

                   
            }
        });
    }

    this_details.get_events = () =>
    {
        $.ajax({
            url: 'get-events',
            type: 'GET',
            success: data =>
            {
                console.log(data);
            }
        });
    }

    this_details.get_orgchart = () =>
    {
        $.ajax({
            url: 'get-orgchart',
            type: 'GET',
            success: data =>
            {
                console.log(data);
                let orgchart_details = '';
                $.each(data,function(){

                    orgchart_details += `
                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="">
                        <div class="team-member">
                        <figure>
                            <img src="${_BASE_URL}asset/upload/org_chart/${this.image_name}" alt="Image" class="img-fluid" style="width: 300px;">
                        </figure>
                        <div class="p-3">
                            <h3>${this.name}</h3>
                            <span class="position">${this.position}</span>
                        </div>
                        </div>
                    </div>
                    `;
                });

                $('#div_orgchart').html(orgchart_details);
                
            }
        });
    }

    this_details.insert_newsletter = () =>
    {

        $.ajax({
            url: 'insert-newsletter',
            type: 'POST',
            data: {
                email : $('#txt_newsletter').val()
            },
            success: data =>
            {
                console.log(data);
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Thankyou for subscribing!',
                        position: 'center'
                    });
                    $('#txt_newsletter').val('');
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: 'Opps Something went wrong. Please try again.',
                        position: 'center'
                    });
                }
            }
        });


    }

    this_details.send_mail = () =>
    {
        $('#btn_message_submit').attr('disabled',true);
        $.ajax({
            url: 'contact-mail',
            type: 'POST',
            data:
            {
                firstname: $('#txt_firstname').val(),
                lastname: $('#txt_lastname').val(),
                email: $('#txt_email').val(),
                subject: $('#txt_subject').val(),
                message: $('#txt_message').val(),
            },
            success: data =>
            {
                console.log(data);
                if(data == true)
                {
                    iziToast.success({
                        title: 'OK',
                        message: 'Message sent! Thank you',
                        position: 'center'
                    });
                    $('#txt_firstname').val('');
                    $('#txt_lastname').val('');
                    $('#txt_email').val('');
                    $('#txt_subject').val('');
                    $('#txt_message').val('');
                    $('#btn_message_submit').attr('disabled',false);
                }
                else
                {
                    iziToast.error({
                        title: 'OK',
                        message: 'Opps Something went wrong. Please try again.',
                        position: 'center'
                    });
                    $('#btn_message_submit').attr('disabled',false);
                }
            },
            error: data => {
                // console.log(data);
                iziToast.error({
                    title: 'OK',
                    message: 'Opps Something went wrong. Please try again.',
                    position: 'center'
                });
                $('#btn_message_submit').attr('disabled',false);
            }
        });

    }




    return this_details;
})();