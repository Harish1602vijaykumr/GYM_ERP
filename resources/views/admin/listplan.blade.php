@extends('admin.adminlayout')
@section('title','PlanList')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Plan List</h1>

					<div class="row">
						<div class="col-8">
							<a href="{{url('/addplan')}}"><button class="button">Add Plan</button></a>
							<div class="card mt-2 justify-content-center ">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Plan Name</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($plan as $key => $plan)
										<tr>
											<td>{{$key + 1}}</td>
											<td>{{$plan->plan_name}}</td>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$plan->status==0 ? 'checked':'unchecked'}} id="switch{{$plan->id}}" type="checkbox" data-member-id="{{ $plan->id }}"/>
    											<label class="toggle-btn" for="switch{{$plan->id}}"></label>
											</div>
                							</td>
											<td><a href="{{url('editplan')}}/{{$plan->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deleteplan')}}/{{$plan->id}}"><i class="fa fa-trash"></td>
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
            								url: "{{url('')}}/"+"plan/"+id+"/"+status,
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