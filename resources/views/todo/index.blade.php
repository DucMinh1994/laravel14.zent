<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Todo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
	<div class="container">
		
		<button type="" class="btn btn-success" data-toggle="modal" href="#modal-add">Add</button>
		
		<div class="modal fade" id="modal-add">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="" data-url="{{ route('todos-ajax.store') }}" id="add-new" method="POST" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add todo</h4>
					</div>
					<div class="modal-body">
						
							<div class="form-group">
								<label for="">Todo</label>
								<input type="text" class="form-control" id="todo" placeholder="Todo">
							</div>
						
							
						
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="add-new">Add</button>
					</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal-show">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="" data-url="{{ route('todos-ajax.store') }}" id="add-new" method="POST" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Show todo</h4>
					</div>
					<div class="modal-body">
						
						<h1></h1>
						
						<h2></h2>
					
						<h3></h3>
						
						<h4></h4>
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							
					</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal-edit">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="" data-url="{{ route('todos-ajax.store') }}" id="edit-todo" method="POST" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">edit todo</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
								<input type="hidden" id="todo_id" value="">
								<label for="">Todo</label>
								<input type="text" class="form-control" id="todo-edit" placeholder="Todo" value="">
						</div>
						
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" >Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>

		<div class="table-responsive">

			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Todo</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					{{-- biến $todos được controller trả cho view
					chứa dữ liệu tất cả các bản ghi trong bảng todos. Dùng foreach để hiển
					thị từng bản ghi ra table này. --}}
					
					@foreach ($todos as $todo)
					<tr id="tr-{{$todo->id}}">
						<td>{{$todo->id}}</td>
						<td>{{$todo->todo}}</td>
						<td>{{$todo->created_at}}</td>
						<td>{{$todo->updated_at}}</td>
						<td>
							<button class="btn btn-sm btn-info" data-toggle="modal" href="#modal-show" data-id="{{$todo->id}}">Show</button>
							<button data-id="{{$todo->id}}" data-toggle="modal" href="#modal-edit"class="btn btn-sm btn-warning">Edit</button>
							<button data-id="{{$todo->id}}" class="btn btn-sm btn-danger">Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</html>

<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$('tbody').on('click','.btn-danger',function(){
			var btn = $(this);
			var id = btn.data('id');
			swal({
			  title: "Bạn có muốn xóa không?",
			 
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				   $.ajax({
					type:'delete',
					url: '/todos-ajax/' + id,
					success: function(response){
						btn.parents('tr').remove();
						toastr.success(response.message);
					}
				})
			  }
			});

		});

		$('#add-new').submit(function(e){
			e.preventDefault();

			$.ajax({
				type: 'post',
				url: '/todos-ajax',
				data: {

					todo: $('#todo').val()
				},
				success: function(response){
					toastr.success('Thêm thành công!');
					$('#modal-add').modal('hide');
					$('#todo').val('');
					var temp = `<tr>
						<td>` + response.id +`</td>
						<td>` + response.todo +`</td>
						<td>` + response.created_at +`</td>
						<td>` + response.updated_at +`</td>
						<td>
							<button class="btn btn-sm btn-info">Show</button>
							<button data-id="` + response.id +`" data-toggle="modal" href="#modal-edit"class="btn btn-sm btn-warning">Edit</button>
						
							
								<button data-id="` + response.id +`" class="btn btn-sm btn-danger">Delete</button>
						
							
						</td>
					</tr>`
					$('tbody').prepend(temp);
				}
			})
		});
		$('tbody').on('click','.btn-info',function(){
			var btn = $(this);
			var id = btn.data('id');

			$.ajax({
				type: 'get',
				url: '/todos-ajax/' + id,
				success: function(response){
					$('h1').text(response.id);
					$('h2').text(response.todo);
					$('h3').text(response.created_at);
					$('h4').text(response.updated_at);
				}
			})
		})

		$('tbody').on('click','.btn-warning',function(){
			var btn = $(this);
			var id = btn.data('id');
			$.ajax({
				type: 'get',
				url: '/todos-ajax/' + id,
				success: function(response){
					$('#todo-edit').val(response.todo);
					$('#todo_id').val(response.id);
				}
			})

		})
		
		$('#edit-todo').submit(function(e){
			e.preventDefault();
			var id = $('#todo_id').val();
			$.ajax({
				type: 'put',
				url: '/todos-ajax/' + id,
				data: {

					todo: $('#todo-edit').val()
				},
				success: function(response){
					toastr.success('Thêm thành công!');
					$('#modal-edit').modal('hide');
					// $('tbody tr:first').remove()
					$('#todo').val('');
					var temp = `<tr id="tr-` + response.id +`">
						<td>` + response.id +`</td>
						<td>` + response.todo +`</td>
						<td>` + response.created_at +`</td>
						<td>` + response.updated_at +`</td>
						<td>
							<button class="btn btn-sm btn-info">Show</button>
							<button data-id="` + response.id +`" data-toggle="modal" href="#modal-edit"class="btn btn-sm btn-warning">Edit</button>
						
							
								<button data-id="` + response.id +`" class="btn btn-sm btn-danger">Delete</button>
						
							
						</td>
					</tr>`
					$('#tr-'+id).replaceWith(temp);
				}
			})
		})

	});
</script>