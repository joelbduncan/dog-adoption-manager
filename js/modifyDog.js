
$(document).ready(function (e) {
	$("#form").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
      url: "lib/ajaxmodify.php",
			type: "POST",
			data:  new FormData(this),			
			contentType: false,
    	cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				$("#err").fadeOut();
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					// view uploaded file. 
					window.setTimeout(function(){window.location.reload()}, 3000);
					$("#preview").html(data).fadeIn();
					$("#success").modal('show')
				}
		    },
		  	error: function(e) 
	    	{
				$("#err").html(e).fadeIn();
	    	} 	        
	   });
	}));
});

