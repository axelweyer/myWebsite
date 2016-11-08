var index = 0;
var lock = false;

$(document).ready(function()
{
	$.ajax({
		url : url + "/design/getDesign",
		type: "POST",
		data: {index:index},
		success: function(result)
		{
			var tmp = JSON.parse(result).data; // parse json response
			tmp.forEach(function(item) // loop over the items in the response
			{
				var type = item.split("_")[0];
				if(type == "logo")
					type = "logos";
				else if(type == "largeart")
					type = "large_arts";
				else if(type == "other")
					type = "others";
				else if(type == "poster")
					type = "posters";
				var image = "<div class='brick backgroundCardDesign pointer'><img src='img/design/"+item+"' class='blogPhoto lazy sort  "+type+"' alt='Design'></div>";
				$("#freewall").append(image);
			});

			/*echo.init({
				offset: 500, //100
				throttle: 500, //250
				unload: false,
				callback: function (element, op)
				{
				  //console.log(element, 'has been', op + 'ed')
				}
			});*/
			activeFreewall();
			lightbox();
			/*$('#loading').waypoint(function()
			{
				if(!lock)
				{
					lock = true;
					index+=10;
					getDesign();
					lock = false;
				}
			},
			{ offset: '100%' });*/
			$('#loadingButton').click(function()
			{
				if(!lock)
				{
					$('#loadingButton').css("display", "none");
					$('#loading').css("display", "block");
					lock = true;
					index+=10;
					getDesign();
					lock = false;
					$('#loadingButton').css("display", "inline-block");
					$('#loading').css("display", "none");
				}
			});
		}
	});
});


function getDesign()
{
	$.ajax({
		url : url + "/design/getDesign",
		type: "POST",
		data: {index:index},
		success: function(result)
		{
			var tmp = JSON.parse(result).data; // parse json response
			if(tmp.length == 0)
				$("#loadingButton").hide();
			else
			{
				tmp.forEach(function(item) // loop over the items in the response
				{
					var type = item.split("_")[0];
					if(type == "logo")
						type = "logos";
					else if(type == "largeart")
						type = "large_arts";
					else if(type == "other")
						type = "others";
					else if(type == "poster")
						type = "posters";
					var image = "<div class='brick backgroundCardDesign pointer'><img src='img/design/"+item+"' class='blogPhoto lazy sort  "+type+"' alt='Design'></div>";
					$("#freewall").append(image);
				});

				activeFreewall();
				lightbox();
			}
			if(tmp.length < 10)
				$("#loadingButton").hide();
		}
	});
}


function lightbox()
{
	$(".blogPhoto").click(function()
	{
		var src = $(this).attr('src');
		//var alt = $(this).attr('alt');
		//$('#lightbox div').css("background-image", 'url(public/'+src+')')
		//$('#lightbox').html("<img src='"+src+"'><br><br><p>"+alt+"</p>");
		$('#lightbox').html("<img src='"+src+"'>");
		//$('#lightbox').show();
		$( "#lightbox" ).fadeIn( "normal", function() {});
	});
	$('#lightbox').on('click', function()
	{
		$( "#lightbox" ).fadeOut( "normal", function() {});
	});
	$('#closeLightbox').on('click', function()
	{
		$( "#lightbox" ).fadeOut( "normal", function() {});
	});
}
