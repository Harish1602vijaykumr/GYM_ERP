@extends('admin.adminlayout')
@section('title','Bodyshape')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Members List</h1>

					<div class="row">
						<div class="col-12">
							<a href="{{url('/bodyshape')}}"><button class="button">Add Bodyshape</button></a>
							<div class="card mt-2">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Body Shape</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($bodyshape  as $key => $bodyshape)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$bodyshape->bodyshape}}</td>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$bodyshape->status==0 ? 'checked':'unchecked'}} id="switch{{$bodyshape->id}}" type="checkbox" data-member-id="{{ $bodyshape->id }}"/>
    											<label class="toggle-btn" for="switch{{$bodyshape->id}}"></label>
											</div>
                							</td>
											<!-- <td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$bodyshape->status==0 ? 'checked':'unchecked'}} id="switch{{$bodyshape->id}}" type="checkbox" data-member-id="{{ $bodyshape->id }}" {{ $bodyshape->status ? 'checked' : '' }}/>
    											<label class="toggle-btn" for="switch{{$bodyshape->id}}"></label>
											</div>
                							</td> -->
											<td><a href="{{url('editbodyshape')}}/{{$bodyshape->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deletebodyshape')}}/{{$bodyshape->id}}"><i class="fa fa-trash"></td>
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
            								url: "{{url('')}}/"+"bodyshapeStatus/"+id+"/"+status,
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