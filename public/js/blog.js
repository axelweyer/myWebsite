$(document).ready(function()
{
	activeFreewall();

	$(".blogButtonMore").click(function()
	{
		var current = $(this).parent().parent();
		if(current.find(".blogTextMore").css('display') == 'none')
			$(this).find("span").html('<i class="fa fa-eye-slash" aria-hidden="true"></i> Read Less');
		else
			$(this).find("span").html('<i class="fa fa-eye" aria-hidden="true"></i> Read More');
		$(current.find(".blogTextMore")).slideToggle("slow", function(){$(document).resize();});

	});
});
