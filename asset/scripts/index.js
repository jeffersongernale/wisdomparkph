$(document).ready(()=>{
    DETAILS.get_data();
    DETAILS.get_events();
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


    return this_details;
})();