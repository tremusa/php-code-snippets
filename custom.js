// javascript to handle ajax call for data post.
var myForm = document.getElementById('myForm');
var response = document.getElementById('response');

myForm.onsubmit = function(event) {
	// stop default submit onclick
	event.preventDefault();
	var formData = new FormData(myForm);

	jQuery.ajax({
		url: "handler.php",
		data:formData,
		type: "POST",
		processData: false, 	// Must include for FormData() to work
		contentType: false, 	
		success:function(data){
			response.innerHTML = data;
		},
		error:function (){
			// Handle errors
		}
	});
}