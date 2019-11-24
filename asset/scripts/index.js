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
                let ctr =1;
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
                        // faqs_text += `<div class="col-lg-6">
                        //                     <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                        //                     <h3 class="text-black h5 mb-4">${this.description}</h3>
                        //                     <p>${this.answer}</p>
                        //                     </div>
                        //                 </div>`;

                        faqs_text+=`<button class="accordion font-weight-bold">  &bull; ${this.description}</button>
                                    <div class="panel">
                                      <p>${this.answer}</p>
                                    </div>`;
                                    ctr++;

                    }
                });

                $('#mission_text').html(mission_text);
                $('#vision_text').html(vision_text);
                $('#ul_goals').html(goals);
                $('.faqs_text').html(faqs_text);

                    var acc = document.getElementsByClassName("accordion");
                    var i;

                    for (i = 0; i < acc.length; i++) {
                        acc[i].onclick = function(){
                            this.classList.toggle("active");
                            this.nextElementSibling.classList.toggle("show");
                      }
                    }
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