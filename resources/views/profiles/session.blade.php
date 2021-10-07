<html>  
<head>  
<title> File Upload </title>  
</head>  
<body>  
	<form method="post" action="{{route('session_store')}}">  
	{{ csrf_field() }}
		<div><label for="Name">Name</label>  
		<input type="text" name="username"> </div><br/>  
		<div><button type="submit">Submit </button></div>  
	</form>  
</body>  