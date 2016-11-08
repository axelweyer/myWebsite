

(function($)
{
    $.fn.parallax = function(options)
	{
        var windowHeight = $(window).height();
        // Establish default settings
        var settings = $.extend(
		{
            speed: 0.15
        }, options);
        // Iterate over each object in collection
        return this.each( function()
		{
        	// Save a reference to the element
        	var $this = $(this);
        	// Set up Scroll Handler
        	$(document).scroll(function()
			{
				var scrollTop = $(window).scrollTop();
				var offset = $this.offset().top;
				var height = $this.outerHeight();
				// Check if above or below viewport
				if (offset + height <= scrollTop || offset >= scrollTop + windowHeight)
				{
					return;
				}
				var yBgPosition = Math.round((offset - scrollTop) * settings.speed);
				// Apply the Y Background Position to Set the Parallax Effect
    			$this.css('background-position', 'center ' + yBgPosition + 'px');
        	});
        });
    }
}(jQuery));





//Cache reference to window and animation items
var $animation_elements = $('.test');
var $window = $(window);
$window.on('scroll', check_if_in_view);
$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');
function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);

  $.each($animation_elements, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);

    //check to see if this current container is within viewport
    if ((element_bottom_position >= window_top_position) &&
        (element_top_position <= window_bottom_position)) {
      $element.addClass('in-view');
    } else {
      $element.removeClass('in-view');
    }
  });
}







var first = true;


$(document).ready(function()
{
	$('.parralax').parallax({
		speed :	0.15
	});


	if($(window).scrollTop() > 35)
	{
		first = false;
		$("#topHeader").hide();
		$("#navigation").css("top", "0px");
	}
	$(window).scroll(function (event)
	{
		var scroll = $(window).scrollTop();
		if(first && scroll > 35)
		{
			first = false;
			$("#topHeader").slideToggle( "slow");
			$("#navigation").animate(
			{
				top:"-=35px"
  			}, "slow");
		}
		else if(!first && scroll < 36)
		{
			first = true;
			$("#topHeader").slideToggle( "slow");
			$("#navigation").animate(
			{
				top:"+=35px"
  			}, "slow");
		}
	});


	$(".designCategory").click(function(e)
	{
		if($(this).html().toLowerCase() == "all")
		{
			$(".sort").removeClass("hidden");
			$(".active").removeClass("active");
			$(this).addClass("active");
			$(document).resize();
		}
		else
		{
			if(!$(this).hasClass("active"))
			{
				$(".sort:not('."+$(this).html().toLowerCase().replace(/ /g,'_')+"')").addClass("hidden");
				$("."+$(this).html().toLowerCase().replace(/ /g,"_")).removeClass("hidden");
				$(".active").removeClass("active");
				$(this).addClass("active");
				$(document).resize();
			}
		}
	});


	$("#contactButton").click(function()
	{
		//$("#contact").animate({width:'toggle'},'slow');
		$("#contact").slideToggle('slow');
	})
    $("#closeContact").click(function()
	{
		$("#contact").slideToggle('slow');
	})


    if(getCookie("firstVisit")=="")
	{
		setCookie("firstVisit", "ok", 30);
		$("#firstVisit").slideToggle("slow");
	}


	$('#closeFirstVisit').on('click', function()
	{
		$("#firstVisit").slideToggle("slow");
	});


	$('[data-toggle="popover"]').popover();


	$('#sendMail').on('click', function()
	{
		var response = grecaptcha.getResponse();
		if(response.length != 0) // A CHANGER !!!!!!!!!!!!!!!!!!!!!
		{
			console.log("lol");
			/*$.ajax(
			{
				url:"home/sendMail",
				type: "POST",
				data:{mail:$("#mail").val(), subject:$("#subject").val(), message:$("#message").val()},
				success:function(data)
				{
					console.log(data);
					$("#responseMail").html("Message send successfully");
					$("#responseMail").fadeIn( "slow", function() {});
				},
				error:function(error)
				{
					alert("error");
				}
			 });	*/
		}
		else
		{
			$("#responseMail").html("<span style='color:red'>Please check the captcha</span>");
			$("#responseMail").fadeIn( "slow");
		}

	});
});







// why it doesn't work on firefox?
/*var card = $(".card3d");
$("#container3d").on("mousemove",function(e)
{
  var ax = -($("#container3d").innerWidth()/2- e.pageX)/20;
  var ay = ($("#container3d").innerHeight()/2- e.pageY)/20;
  card.attr("style", "transform: rotateY("+ax+"deg) rotateX("+ay+"deg);-webkit-transform: rotateY("+ax+"deg) rotateX("+ay+"deg);-moz-transform: rotateY("+ax+"deg) rotateX("+ay+"deg)");
});*/
/*$("#container3d").on("mouseleave",function(e)
{
  card.attr("style", "transform: rotateY("+0+"deg) rotateX("+0+"deg);-webkit-transform: rotateY("+0+"deg) rotateX("+0+"deg);-moz-transform: rotateY("+0+"deg) rotateX("+0+"deg)");
});*/

























function activeFreewall()
{
	var wall = new Freewall("#freewall");
	wall.reset({
		selector: '.brick',
		animate: true,
		cellW: 250,
		cellH: 'auto',
		onResize: function()
		{
			wall.fitWidth();
		}
	});
	wall.container.find('.brick img').on("load", function()
	{
		wall.fitWidth();
	});
	$(document).resize();
}


function $_GET(param)
{
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace(
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);
	if (param)
	{
		return vars[param] ? vars[param] : null;
	}
	return vars;
}


function getCookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}


function setCookie(cname, cvalue, exdays)
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
