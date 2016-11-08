
function showProject(file)
{
	$.ajax(
	{
        url:"projects/showProject", //the page containing php script
        type: "POST", //request type
		data:{file:file},
        success:function(data)
		{
         	$("#contentProject").html(data);
			$('#modalProject').modal('show');
       	},
		error:function(error)
		{
			alert("error");
		}
     });
}





