@extends('admin.adminlayout')
@section('title','WorkoutList')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Workout List</h1>

					<div class="row">
						<div class="col-12">
							<a href="{{url('/workout')}}"><button class="button">Add Workout</button></a>
							<div class="card mt-2">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Workout Name</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($workout as $key => $workout)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$workout->workout_name}}</td>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$workout->status==0 ? 'checked':'unchecked'}} id="switch{{$workout->id}}" type="checkbox" data-member-id="{{ $workout->id }}"/>
    											<label class="toggle-btn" for="switch{{$workout->id}}"></label>
											</div>
                							</td>
											<td><a href="{{url('editworkout')}}/{{$workout->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deleteworkout')}}/{{$workout->id}}"><i class="fa fa-trash"></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<script>
    								$('.toggle-switch').change(function() {

        								var status = $(this).prop('checked') == true ? 0 : 1;
        								var id = $(this).attr('data-member-id');
        								$.ajax({

            								type: "GET",
           								 	dataType: "json",
            								url: "{{url('')}}/"+"workoutStatus/"+id+"/"+status,
            								data: {
                								'status': status,
                								'id': id
            								},

            							success: function(data) {
                						console.log(data.success)
          
            						}
        						});
    							})
							</script>
							</div>
						</div>
					</div>
				</div>
			</main>
	@endsection