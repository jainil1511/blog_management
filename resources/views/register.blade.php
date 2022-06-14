<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">

	
			@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

@foreach (['danger', 'warning', 'success', 'info'] as $key)
 @if(Session::has($key))
     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
 @endif
@endforeach




			<form name="frm1" method="post" action="{{route('register_process')}}">
				@csrf
				<h1>Register</h1>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="name" value="{{old('name')}}" required>
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="email" value="{{old('email')}}" required>
			</div>


			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" required>
			</div>


			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password"class="form-control"  name="confirmpassword" placeholder="Confirm Password" required >
			</div>

				<div class="form-group">
				<input type="submit" name="submit" value="submit" class="btn btn-success">
			</div>
		</form>
		
	
</div>
</body>

</html>