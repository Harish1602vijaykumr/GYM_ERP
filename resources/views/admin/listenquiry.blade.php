@extends('admin.adminlayout')
@section('title','WorkoutList')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Enquiry List</h1>

					<div class="row">
						<div class="col-12">
							<a href="{{url('/enquiry')}}"><button class="button">Add Enquiry</button></a>
							<div class="card mt-2">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Name</th>
											<th>Mobile No</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($enquiry as $key => $enquiry)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$enquiry->name}}</td>
											<td>{{$enquiry->mobileno}}</td>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$enquiry->status==0 ? 'checked':'unchecked'}} id="switch{{$enquiry->id}}" type="checkbox" data-member-id="{{ $enquiry->id }}"/>
    											<label class="toggle-btn" for="switch{{$enquiry->id}}"></label>
											</div>
                							</td>
											<td><a href="{{url('editenquiry')}}/{{$enquiry->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deleteenquiry')}}/{{$enquiry->id}}"><i class="fa fa-trash"></td>
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
            								url: "{{url('')}}/"+"enquiry/"+id+"/"+status,
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