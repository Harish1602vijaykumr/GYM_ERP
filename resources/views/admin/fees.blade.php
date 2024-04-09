@extends('admin.adminlayout')
@section('title','Fees')
@section('content')
			<div class="container d-flex flex-column">
					<div class="d-table-cell align-middle">
						<div class="card col-md-8 mx-auto d-table h-100 mt-3" >
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{url('storefeesentry')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
										<div class="text-center mt-4">
										<h1 class="h2">FEES ENTRY</h1>
										</div>
										<div class="mb-3">
											<label class="form-label">Date of Entry</label>
											<input class="form-control form-control-lg" type="date" name="date" placeholder="Enter Date" value="{{old('date')}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Mobile No</label>
											<input class="form-control form-control-lg" type="text" name="mobileno" placeholder="Enter Mobile No" value="{{old('mobileno')}}" id="mobileno" />
											<span id="error"></span>
										</div>
										<div class="mb-3">
											<label class="form-label">Plan</label>
											<select class="form-control form-control-lg" type="dropdown" name="plan">
												<option>Select Plan</option>
												@foreach($plan as $plan)
                                				<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                               					@endforeach
										</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Fees Amount</label>
											<input class="form-control form-control-lg" type="number" name="amount" placeholder="Enter the Amount" value="{{old('amount')}}" />
										</div>
										<div class="d-flex justify-content-center mt-3">
											<button type="submit" id="submit" class="btn btn-lg btn-primary w-auto">Save</button>
										</div>
									</form>
									<script type="text/javascript">
									$('#mobileno').change(function(){

										var mobile = $('#mobileno').val();
										$.ajax({
											url:"{{url('check_mobile')}}/"+mobile,
											type: "GET",
											success: function(response){
												if(response!=1){
													$('#error').html(response.name);
												}
												else{
													$('#mobileno').val('');
													$('#error').html('Member does not registered');
												}
											}

										});
									});	
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection