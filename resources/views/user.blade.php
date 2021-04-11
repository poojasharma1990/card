<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
  <form method="post" id="imageUploadForm" enctype="multipart/form-data" action="card/store">
    <div class="form-group">
      <label for="uname">Person Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Person Name" name="uname" >
      <div id="name_error"></div>
    </div>
    <div class="form-group">
      <label for="pwd">Designation</label>
      <input type="text" class="form-control" id="desi" placeholder="Enter Designation" name="designation" >
      <div id="designation_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Business Name</label>
      <input type="text" class="form-control" id="b_name" placeholder="Enter Business Name" name="business_name" >
      <div id="busniess_name_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Short Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter Short Description" name="description" >
      <div id="description_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">WhatsApp Number</label>
      <input type="text" class="form-control" id="whatsapp" placeholder="Enter WhatsApp Number" name="whatsapp" >
       <div id="whatsapp_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Contacts</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter Contacts" name="contact" >
            <div id="contact"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Single Address</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Single Address" name="address" >
      <div id="address"></div>
    </div>
	 <input type="file" name="image" id="image">
   <div id="imagedisplay"></div>
   <input type="submit" value="submit" id="submitButton">
  </form>
  
  
  
  <table class="table" id="ajaxResults">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Personal Name</th>
      <th scope="col">Designation</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  @if(count($card)>0)
  @foreach($card as $post)
    <tr>
      <th scope="row">1</th>
      <td>{{$post->uname}}</td>
      <td>{{$post->designation}}</td>
      <td><a href="{{ url('/card/edit/'.$post->id)}}"  class="btn edit btnaction" title="Edit"><i class="fas fa-pen">Edit</i></a>
	  <a href="{{ url('/card/'.$post->slug)}}"  class="btn edit btnaction" title="Edit"><i class="fas fa-pen">show</i></a></td>
    </tr>
	@endforeach
	@else
	No Data Found
	@endif
    
  </tbody>
</table>
</div>
<script>

$('#imageUploadForm').submit(function(evt) {
                evt.preventDefault();
				hideAllErrors();
var name = $("#name").val();
        var designation = $("#desi").val();
        var busniess_name = $("#b_name").val();
        var description = $("#description").val();
        var whatsapp= $("#whatsapp").val();
         var contact= $("#contact").val();
		  var address= $("#address").val();
		  var image= $("#image").val();
		  var intRegex = /^[6-9]\d{9}$/;

       	if(name == ""){
           
			$("#name_error").addClass("text-danger").text("Please enter Personal name");
          	$("#first").focus();
           return false;
        }

        
        else if(designation == ""){
            
			$("#designation_error").addClass("text-danger").text("Please enter designation");
          	$("#desi").focus();
            return false;

        }

        
        else if(busniess_name == ""){
			  $("#busniess_name_error").addClass("text-danger").text("Please enter busniess_name");
           
			$("#b_name").focus();
            return false;

        }
        
		 else if(description == ""){
           $("#description_error").addClass("text-danger").text("Please enter description");
		   $("#description").focus();
            return false;

           }
		   else if(whatsapp == ""){
             $("#whatsapp_error").addClass("text-danger").text("Please enter whatsapp");
			 $("#whatsapp").focus();
            return false;

           }
		   else if((whatsapp.length != 10) || (!intRegex.test(whatsapp)))
        	{
              $("#whatsapp_error").addClass('text-danger').text("Mobile Number is wrong.");
			  $("#whatsapp").focus();
              return false;
         	} 
		   else if(contact == ""){
             $("#contact_error").addClass("text-danger").text("Please enter contact");
			 $("#contact").focus();
            return false;

           }
		   else if((contact.length != 10) || (!intRegex.test(contact)))
        	{
              $("#contact_error").addClass('text-danger').text("Mobile Number is wrong.");
			  $("#contact").focus();
              return false;
         	} 
		   else if(address == ""){
             $("#address_error").addClass("text-danger").text("Please enter address");
			 $("#address").focus();
            return false;

           }
		   else if(image == ""){
             alert("upload Image");
            return false;

           }
         else{
                var formData = new FormData(this);
                 var url="{{url('card/edit/')}}";
				 var urls="{{url('card/')}}";
                $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
					
					var html = '<tr><th scope="row">1</th><td>'+data.data.uname+'</td><td>'+data.data.designation+'</td><td><a href="'+url+'/'+data.data.id+'"  class="btn edit btnaction" title="Edit"><i class="fas fa-pen">Edit</i></a><a href="'+urls+'/'+data.data.slug+'"  class="btn edit btnaction" title="Show"><i class="fas fa-pen">Show</i></a></td></tr>';
                        $('#ajaxResults').append(html);
					
                },
                error: function(data) {
                   $("#name_error").addClass("text-danger").text("Please enter Unique Personal name");
                }
                });
		 }
            });
function hideAllErrors() {
     $("#name_error").removeClass("text-danger").text("");
	 $("#designation_error").removeClass("text-danger").text("");
	 $("#description_error").removeClass("text-danger").text("");
	 $("#whatsapp_error").removeClass("text-danger").text("");
	 $("#contact_error").removeClass("text-danger").text("");
	 $("#address_error").removeClass("text-danger").text("");
	 
   
}
</script>


