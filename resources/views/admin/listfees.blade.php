@extends('admin.adminlayout')
@section('title','FeesList')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Fees List</h1>

					<div class="row">
						<div class="col-12">
							
								<a href="{{url('/feesentry')}}"><button class="button">Add Fees</button></a>
							<div class="card mt-2">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Date</th>
											<th>Mobile No</th>
											<th>Plan</th>
											<th>Amount</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($fees as $key => $fees)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{ \Carbon\Carbon::parse($fees->date)->format('d-m-Y')}}</td>
											<td>{{$fees->mobileno}}</td>
											<th>{{$fees->getplan->plan_name}}</th>
											<th>{{$fees->amount}}</th>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$fees->status==0 ? 'checked':'unchecked'}} id="switch{{$fees->id}}" type="checkbox" data-member-id="{{ $fees->id }}"/>
    											<label class="toggle-btn" for="switch{{$fees->id}}"></label>
											</div>
                							</td>
											<td><a href="{{url('editfees')}}/{{$fees->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deletefees')}}/{{$fees->id}}"><i class="fa fa-trash"></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
								<script>
    								$('.toggle-switch').change(function() {

        								var status = $(this).prop('checked') == true ? 0 : 1;
        								var id = $(this).attr('data-member-id');
        								console.log(id);
        								$.ajax({

            								type: "GET",
           								 	dataType: "json",
            								url: "{{url('')}}/"+"fees/"+id+"/"+status,
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