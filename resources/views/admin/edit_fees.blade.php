@extends('admin.adminlayout')
@section('title','EditFess')
@section('content')
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{url('storefeesedit')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
										<h3>FEES ENTRY</h3>
										<input type="hidden" name="id" value="{{$fees->id}}">
										<div class="mb-3">
											<label class="form-label">Date of Entry</label>
											<input class="form-control form-control-lg" type="date" name="date" placeholder="Enter Date" value="{{$fees->date}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Mobile No</label>
											<input class="form-control form-control-lg" type="text" name="mobileno" placeholder="Enter Mobile No" value="{{$fees->mobileno}}" id="mobileno" />
											<span id="error"></span>
										</div>
										<div class="mb-3">
											<label class="form-label">Plan</label>
											<select class="form-control form-control-lg" id="plan" type="dropdown" name="plan" value="{{$fees->plan_id}}">
												<option>Select Plan</option>
												@foreach($plan as $plan)
                                				<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                               					@endforeach
										</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Fees Amount</label>
											<input class="form-control form-control-lg" type="number" name="amount" placeholder="Enter the Amount" value="{{$fees->amount}}" />
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
												if(response==0){
													$('#error').html('Registered Member');
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
	<script type="text/javascript">
		$('#plan').val(<?php echo $fees->plan_id;  ?>)
	</script>
@endsection