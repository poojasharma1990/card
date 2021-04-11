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
 
  <form method="post"  enctype="multipart/form-data" action="{{url('card/update')}}/{{$card->id}}">
  {{ csrf_field() }}	
    <div class="form-group">
      <label for="uname">Person Name</label>
      <input type="text" class="form-control" id="name" value="{{$card->uname}}" placeholder="Enter Person Name" name="uname" >
      <div id="name_error"></div>
    </div>
    <div class="form-group">
      <label for="pwd">Designation</label>
      <input type="text" class="form-control" id="desi" value="{{$card->designation}}" placeholder="Enter Designation" name="designation" >
      <div id="designation_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Business Name</label>
      <input type="text" class="form-control" id="b_name" value="{{$card->business_name}}" placeholder="Enter Business Name" name="business_name" >
      <div id="busniess_name_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Short Description</label>
      <input type="text" class="form-control" id="description" value="{{$card->description}}" placeholder="Enter Short Description" name="description" >
      <div id="description_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">WhatsApp Number</label>
      <input type="text" class="form-control" id="whatsapp" placeholder="Enter WhatsApp Number" value="{{$card->whatsapp}}" name="whatsapp" >
       <div id="whatsapp_error"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Contacts</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter Contacts" value="{{$card->contact}}" name="contact" >
            <div id="contact"></div>
    </div>
	<div class="form-group">
      <label for="pwd">Single Address</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Single Address" value="{{$card->address}}" name="address" >
      <div id="address"></div>
    </div>
	 <input type="file" name="image" id="image" value="{{$card->image}}">
	 
   <div id="imagedisplay"></div>
   <input type="submit" value="submit" id="submitButton">
   <img src="{{url('images')}}/{{$card->image}}" class="thumbnail" style="width:100px;height:100px"/>
  </form>
  

