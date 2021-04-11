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
 
 
    <div class="form-group">
      <label for="uname">Person Name-</label>
      <label for="uname">{{$card->uname}}"</label>
      <div id="name_error"></div>
    </div>
    <div class="form-group">
      <label for="pwd">Designation-</label>
      <label for="pwd">{{$card->designation}}</label>
      <div id="designation_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Business Name-</label>
      <label for="pwd">{{$card->business_name}}</label>
      <div id="busniess_name_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Short Description-</label>
      <label for="pwd">{{$card->description}}</label>
      <div id="description_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">WhatsApp Number-</label>
     <label for="pwd">{{$card->whatsapp}}</label>
       <div id="whatsapp_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Contacts-</label>
      <label for="pwd">{{$card->contact}}"</label>
            <div id="contact"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Single Address-</label>
      <label for="pwd">{{$card->address}}"</label>
      <div id="address"></div>
    </div>
	
	 
  
   <img src="{{url('images')}}/{{$card->image}}" class="thumbnail" style="width:100px;height:100px"/>
 
  

