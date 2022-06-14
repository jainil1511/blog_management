<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blogs</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:30px;">
<a href="{{route('blogs.create')}}" class="btn btn-success" style="float: right;">Add Blog</a>
<h1>Blogs</h1>
	<table class="table " id="myTable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th >Title</th>
				<th >Description</th>
				<th >Tags</th>
				<th width="20%">Action</th>
			</tr>


		</thead>
		<tbody>
			@php $i = 1; @endphp
			@foreach($blogs as $row)
			<tr>
				<td>{{$i}}</td>
				<td><img src="/images/{{$row->image}}" style="height: 60px; width:60px"></td>
				<td>{{$row->title}}</td>
				<td>{{$row->description}}</td>
				<td>{{$row->tags}}</td>
				<td>
				<a href="{{route('blogs.edit',$row->id)}}" class="btn btn-info">Edit</a>
				<a href="{{route('blogs.delete',$row->id)}}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{url('admin/dashboard')}}" class="btn btn-info">back</a>
</div>

</body>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>