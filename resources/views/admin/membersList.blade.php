@extends('admin.adminlayout')
@section('title','MembersList')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Members List</h1>

					<div class="row">
						<div class="col-12">
						<a href="{{url('/membersRegistration')}}"><button class="button ms-200">Add Member</button></a>
							<div class="card mt-2">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Name</th>
											<th>Reference</th>
											<th class="d-none d-xl-table-cell">Mobile No</th>
											<th class="d-none d-xl-table-cell">Email</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Date of Joining</th>
											<th>Photo</th>
											<th>Status</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($member as $key => $member)
										<tr>
											<td>{{$key+1}}</td>
											<td>{{$member->name}}</td>
											<td>{{$member->reference}}</td>
											<td >{{$member->mobileno}}</td>
											<td class="d-none d-xl-table-cell">{{$member->email}}</td>
											<td>{{ date('Y') - date('Y', strtotime($member->dob)) }}</td>
											<td class="d-none d-xl-table-cell">{{$member->gender}}</td>
											<td class="d-none d-xl-table-cell">{{\Carbon\Carbon::parse($member->doj)->format('d-m-Y')}}</td>
											<td class="d-none d-md-table-cell"><a href="{{asset('public/image')}}/{{$member['photo']}}" class="img-content">View Image</a></td>
											<td>
											<div class="group">
  												<input class="toggle toggle-switch" {{$member->status==0 ? 'checked':'unchecked'}} id="switch{{$member->id}}" type="checkbox" data-member-id="{{ $member->id }}"/>
    											<label class="toggle-btn" for="switch{{$member->id}}"></label>
											</div>
                							</td>
											<td><a href="{{url('edit_member')}}/{{$member->id}}"><i class="fa fa-pencil"></td>
											<td class="d-none d-xl-table-cell"><a href="{{url('deletemember')}}/{{$member->id}}"><i class="fa fa-trash"></td>
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
            								url: "{{url('')}}/"+"changeStatus/"+id+"/"+status,
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