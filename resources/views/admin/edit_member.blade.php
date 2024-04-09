@extends('admin.adminlayout')
@section('title','EditMember')
@section('content')
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{url('storememberedit')}}" method="post" enctype="multipart/form-data">
												{{csrf_field()}}
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input type="hidden" name="id" value="{{$member->id}}">
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" value="{{$member->name}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Mobile No</label>
											<input class="form-control form-control-lg" type="text" name="mobileno" placeholder="Enter your name" value="{{$member->mobileno}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" value="{{$member->email}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Date of Birth</label>
											<input class="form-control form-control-lg" type="date" name="dob" placeholder="Enter DOB" value="{{$member->dob}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Gender</label><br/>
											<input  type="radio" id="male" name="gender" value="male" {{$member->gender == 'male' ? 'checked' : '' }}/>
											<label for="male">Male</label><br/>
											<input  type="radio" id="female" name="gender" value="female" {{$member->gender == 'female' ? 'checked' : '' }} />
											<label for="fe">Female</label>
										</div>
										<div class="mb-3">
											<label class="form-label">Date of Joining</label>
											<input class="form-control form-control-lg" type="date" name="doj" placeholder="Enter DOB" value="{{$member->doj}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Height</label>
											<input class="form-control form-control-lg" type="text" name="height" placeholder="Enter your height" value="{{$member->height}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Current Weight</label>
											<input class="form-control form-control-lg" type="text" name="currentWeight" placeholder="Enter your weight" value="{{$member->currentWeight}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Fat Percentage</label>
											<input class="form-control form-control-lg" type="number" id="percentage" name="fatPercentage" min="0" max="100" step="0.01" placeholder="Enter your Fat Percentage" value="{{$member->fatPercentage}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Plan</label>
											<select class="form-control form-control-lg" id="plan" type="dropdown" name="plan" value="{{$member->plan_id}}">
												<option>Select Plan</option>
												@foreach($plan as $plan)
                                				<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                               					@endforeach
										</select>
										<div class="mb-3">
											<label class="form-label">Address</label>
											<textarea class="form-control form-control-lg"  name="address" rows="5" cols="33" />{{$member->address}}</textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Photo</label>
											<input class="form-control form-control-lg" type="file" name="photo" />
										</div>
										@if ($member->photo)
    									<div class="form-group">
        									<img src="{{asset('/public/image')}}/{{$member->photo}}" alt="Uploaded Photo" style="max-width: 200px; max-height: 200px;">
    									</div>
    									@endif
										<div class="mb-3">
											<label class="form-label">Diet</label>
											<select class="form-control form-control-lg" type="dropdown" name="diet" id="diet" value="{{$member->diet}}">
												<option value="Select Diet">Select Diet</option>
												<option value="Vegetarian" {{ $member->diet == 'Vegetarian' ? 'selected' : '' }}>Vegetarian</option>
												<option value="Non-vegetarian" {{ $member->diet == 'Non-vegetarian' ? 'selected' : '' }}>Non-vegetarian</option>
												<option value="Vegan" {{ $member->diet == 'Vegan' ? 'selected' : '' }}>Vegan</option>
												<option value="Eggetarian" {{ $member->diet == 'Eggetarian' ? 'selected' : '' }}>Eggetarian</option>
											</select>
										</div><div class="mb-3">
											<label class="form-label">Life Style</label>
											<select class="form-control form-control-lg" type="dropdown" name="lifestyle" id="life" value="{{$member->lifestyle}}">
												<option value="Select Life Style">Select Life Style</option>
												<option value="Active" {{ $member->lifestyle == 'Active' ? 'selected' : '' }}>Active</option>
												<option value="Moderate" {{ $member->lifestyle == 'Moderate' ? 'selected' : '' }}>Moderate</option>
												<option value="Lazy" {{ $member->lifestyle == 'Lazy' ? 'selected' : '' }}>Lazy</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Profession</label>
											<select class="form-control form-control-lg" type="dropdown" name="profession" id="profession">
												<option value="Select Profession">Select Profession</option>
												<option value="Bench Work" {{ $member->profession == 'Bench Work' ? 'selected' : '' }}>Bench Work</option>
												<option value="Field Marketing" {{ $member->profession == 'Field Marketing' ? 'selected' : '' }}>Field Marketing</option>profession
												<option value="Computer Work" {{ $member->profession == 'Computer Work' ? 'selected' : '' }}>Computer Work</option>
												<option value="Sales Marketing" {{ $member->profession == 'Sales Marketing' ? 'selected' : '' }}>Sales Marketing</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Occupation</label>
											<input class="form-control form-control-lg" type="text" name="occupation" placeholder="Enter your Occupation" value="{{$member->occupation}}" />
										</div>
										@if (count($errors)>0)
                    					<div class="text-danger">
                        					<ul>
                            				@foreach ($errors->all() as $error)
                            					<li>{{$error}}</li>
                           					 @endforeach
                        					</ul>
                    					</div>
                    					@endif
										<div class="d-flex justify-content-center mt-3">
											<button type="submit" id="submit" class="btn btn-lg btn-primary w-auto">Save</button>
										</div>
									</form>
									<script type="text/javascript">
										// $(document).ready(function() {
										function showmobile(){
											document.getElementById("mobile").style.display = "block";
										}
										function hidemobile(){
											document.getElementById("mobile").style.display = "none";
											$('#name').val('');
											$('#mobilenumber').val('');
										}
										$('#mobile_no').change(function(){
											var mobile = $('#mobile_no').val();
											$.ajax({
												url:"{{url('checkmobile')}}/"+mobile,
												type: "GET",
												success: function(response){
													if(response!=0){
														console.log(response);
														$('#name').val(response.name);
                        								$('#mobilenumber').val(response.mobile);
													}
													else {
														console.log(response);
														$('#mobileno').val('');
														$('#error').html('Member does not registered');
													}
												}
											})
										})
									// })
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
		$('#plan').val(<?php echo $member->plan_id;  ?>)
		// $('#diet').val(<?php echo $member->diet;  ?>)
		// $('#life').val(<?php echo $member->lifestyle;  ?>)
		// $('#profession').val(<?php echo $member->profession;  ?>)
	</script>

@endsection