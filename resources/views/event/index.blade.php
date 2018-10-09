<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
<body>
	<div class="container">
		<a href="/events/create" class="btn btn-success">Add</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>		
						<th>id</th>
						<th>title</th>
						<th>content</th>
						<th>time</th>
						<th>location</th>
						<th>cretated_at</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>			
					@foreach ($events as $event)
					<tr>
						<td>{{$event->id}}</td>
						<td>{{$event->title}}</td>
						<td>{{$event->content}}</td>
						<td>{{$event->time}}</td>
						<td>{{$event->location}}</td>
						<td>{{$event->cretated_at}}</td>
						<td>
							<button class="btn btn-info">show</button>
							<button class="btn btn-success">edit</button>
							<button class="btn btn-warning">delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>