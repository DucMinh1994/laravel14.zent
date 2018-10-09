<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h1>Thêm mới</h1>
				<form action="/events/store" method="POST" accept-charset="utf-8">
					{{csrf_field()}}
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" name="title" id="title" class="form-control" value="" placeholder="title">
				</div>
				<div class="form-group">
					<label for="">Content</label>
					<input type="text" name="content" id="content" class="form-control" value="" placeholder="content">
				</div>
				<div class="form-group">
					<label for="">Time</label>
					 <input id="datepicker" name="time" class="form-control" width="276" />
				</div>
				<div class="form-group">
					<label for="">Location</label>
					<input type="text" name="location" id="location" class="form-control" value="" placeholder="location">
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
			</div>
		</div>
	</div>
	
</body>
</html>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>