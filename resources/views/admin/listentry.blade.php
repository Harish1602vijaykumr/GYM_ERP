@extends('admin.adminlayout')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Entry</h1>

					<div class="row">
						<div class="col-12">
							
								<a href="{{url('/entry')}}"><button class="button">Add Entry</button></a>
							<div class="card mt-2">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Member</th>
											<th>Date</th>
											<th>Weight</th>
											<th>Supplements</th>
											<th>Fat Percentage</th>
											<th>Workout</th>
											<th>Body Shape</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($entry as $key => $entry)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$entry->member->name}}</td>
											<td>{{$entry->created_at->format('d-m-y')}}</td>
											<td>{{$entry->weight}}</td>
											<th>{{$entry->supplement_name}}</th>
											<th>{{$entry->fatPercentage}}</th>
											<td>{{$entry->workout->workout_name}}</td>
											<td>{{$entry->bodyshape->bodyshape}}</td>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$entry->status==0 ? 'checked':'unchecked'}} id="switch{{$entry->id}}" type="checkbox" data-member-id="{{ $entry->id }}"/>
    											<label class="toggle-btn" for="switch{{$entry->id}}"></label>
											</div>
                							</td>
											<td><a href="{{url('editentry')}}/{{$entry->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deleteentry')}}/{{$entry->id}}"><i class="fa fa-trash"></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
								<!-- <script>
    								$('.toggle-switch').change(function() {

        								var status = $(this).prop('checked') == true ? 0 : 1;
        								var id = $(this).attr('data-member-id');
        								$.ajax({

            								type: "GET",
           								 	dataType: "json",
            								url: "{{url('')}}/"+"entry/"+id+"/"+status,
            								data: {
                								'status': status,
                								'id': id
            								},

            							success: function(data) {
                						console.log(data.success)
          
            						}
        						});
    							})
							</script> -->
							<script>
    								$('.toggle-switch').change(function() {

        								var status = $(this).prop('checked') == true ? 0 : 1;
        								var id = $(this).attr('data-member-id');
        								$.ajax({

            								type: "GET",
           								 	dataType: "json",
            								url: "{{url('')}}/"+"entry/"+id+"/"+status,
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