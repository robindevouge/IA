$(document).ready(function(){
    $("#register").validate({
    	rules: {
		    password0: "required",
		    password1: {equalTo: "#password0"},
		    alias:{remote:"checkUnique.php"}
		},	
		messages: {
			email: "c'est nul",
			date: "c'est pas ça!"
		}
	});
});
