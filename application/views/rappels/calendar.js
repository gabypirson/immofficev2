

var calendar = calendar || {
    
};

/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
calendar.bind = function(){
}


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
calendar.init = function(){
   // console.log('test',translate('code_lang'));
    calendar.calendarObject_month = false;
    calendar.calendarObject_week = false;
    calendar.events = [];

    calendar.bind();
    calendar.initFullCalendar();
}


/* ----- Tables ----- */
/* ------------------- */
calendar.initFullCalendar = function () {
    if(!calendar.calendarObject_month){
	
    	calendar.calendarObject_month = $('#calendar_month').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek'
			},
			//defaultDate: date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			locale : translate('code_lang'),
			eventLimit: true, // allow "more" link when too many events
			//events: events
			events: base_url()+"index.php/rappels/getEventsJson?user_id="+$('#user_id').val(),
			eventDrop: function(event, delta, revertFunc, jsEvent, ui, view ){
				$.ajax({
			        type: "POST",
			        url: base_url()+"index.php/rappels/update",
			        dataType: 'json',
			        data: {
			            rappel_id : event.id,
			            new_date : event.start.format('X') - 3600
			        },
			        success: function(response){
			          calendar.calendarObject_week.fullCalendar( 'refetchEvents' );
			        }
			    });
            },
            eventClick: function(event) {
            	//console.log('click');
            },
            droppable: true, 
            aspectRatio: 1.35,
        	drop: function(date, jsEvent, ui, resourceId) {
        		//console.log('drop');
        	}
		});
    }

    if(!calendar.calendarObject_week){
    	var date = new Date();
    	calendar.calendarObject_week = $('#calendar_week').fullCalendar({
			defaultView : 'listDay',
			locale : translate('code_lang'),
            aspectRatio: 1.35,
			eventLimit: true, // allow "more" link when too many events
			events: base_url()+"index.php/rappels/getEventsJson?user_id="+$('#user_id').val(),
		});
    }

};


/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    calendar.init();

    var backcalendarsize = $("#calendar_week").height();
    if(backcalendarsize > 500)
    {
        $('#calendar_month').fullCalendar('option', 'height', backcalendarsize);
    }
    else 
    {
        $('#calendar_month').fullCalendar('option', 'height', 450);
        $('#calendar_week').fullCalendar('option', 'height', 450);
    }


    $(".btn-calendar").on("click", function(){
        if($(window).width() > 992)
        {
            var thisid = $(this).attr("data-id");
            if($("#"+thisid).hasClass("float-middle"))
            {
                $(".input-separation").css("display", "none");
                $("#"+thisid).css("display","block");
                $(".input-separation").removeClass("float-middle");
                var calendarsize = $("#calendar_month_container").width();
                $('#calendar_month').fullCalendar('option', 'height', calendarsize*0.75);
            }else 
            {
                $(".input-separation").css("display", "block");
                $(".input-separation").addClass("float-middle");
                var backcalendarsize = $("#calendar_week").height();
                if(backcalendarsize > 500)
                {
                    $('#calendar_month').fullCalendar('option', 'height', backcalendarsize);
                }
                else 
                {
                    $('#calendar_month').fullCalendar('option', 'height', 450);
                    $('#calendar_week').fullCalendar('option', 'height', 450);
                }
            }
        }
    });

    $("#tabsselect").on("change", function(){
        var thisvalue = $(this).val();
        $(".l-calendar > div").hide();
        $("#"+thisvalue).fadeIn();
        return false;
    });

    if($(window).width() < 992)
    {
        $(".l-calendar > div").hide();
        $("#"+$('#tabsselect').val()).fadeIn();
    }
    else 
    {
        $(".l-calendar > div").show();
    }
    $( window ).resize(function() {
        if($(window).width() > 992)
        {
            setTimeout(
            function() 
            {
                var backcalendarsize = $("#calendar_week").height();
                if(backcalendarsize > 500)
                {
                    $('#calendar_month').fullCalendar('option', 'height', backcalendarsize);
                }
                else 
                {
                    $('#calendar_month').fullCalendar('option', 'height', 450);
                    $('#calendar_week').fullCalendar('option', 'height', 450);
                }
                
            }, 300);
        }
        
        if($(window).width() < 992)
        {
            $(".l-calendar > div").hide();
            $("#"+$('#tabsselect').val()).fadeIn();
        }
        else 
        {
            $(".l-calendar > div").show();
        }
    });

});

