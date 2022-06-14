<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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
		<h1>Add Blog</h1>
			<form name="frm1" method="post" action="{{route('blogs.store')}}" enctype="multipart/form-data">
				@csrf
				

			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" placeholder="title" required>
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" cols="4" rows="10" name="description" placeholder="description"></textarea>
			</div>	
			<div class="form-group">
				<label>tags</label>
				<select name="tags[]"  id="tags" class="form-control" multiple required>
					<option value="Technical">Technical</option>
					<option value="Electronic">Electronic</option>
					<option value="Clothes">Clothes</option>
					<option value="Bikes">Bikes</option>
					<option value="Cars">Cars</option>
				</select>
				</div>	
				<div class="form-group">
					<label>Image</label>
				<input type="file" name="image" id="file" class="form-control" accept="image.*" required>
			</div>
				<div class="form-group">
				<input type="submit" name="submit" value="submit" class="btn btn-success">
			</div>
		</form>

	
</div>
</body>
</html>