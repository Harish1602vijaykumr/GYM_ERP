@extends('admin.adminlayout')
@section('title','Members')
@section('content')
			<!-- <div class="container d-flex flex-column">
					<div class="d-table-cell align-middle"> -->
						<div class="card col-md-8 mx-auto d-table mt-3" >
							<div class="card-body">
								<div class="m-sm-3">
									<div class="mb-3  d-flex">
										<div class="mb-3">
											<form action="{{url('storeMembers')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<label class="form-label">Joining From</label><br/>
											<input  type="radio" name="joining" value="Enquiry" id="enquiry" onclick="showmobile()" />
											<label class="form-label">Enquiry</label><br/>
											<input  type="radio" name="joining" value="New Member" id="member" onclick="hidemobile()" />
											<label class="form-label">New Member</label>
										</div>
										<div class="mb-3 ml-5 " id="mobile" style="display:none;">
												<label class="form-label">Mobile No</label>
												<input class="form-control form-control-lg" type="text" id="mobile_no" name="mobile" id="mobile" placeholder="Enter Mobile No" />
												<span id="error"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="form" style="display: none;">
						<div class="card col-md-8 mx-auto d-table h-100 mt-3" >
							<div class="card-body" >
								<div class="m-sm-3">
									<div class="text-center mt-4">
									<h1 class="h2">MEMBERS REGISTRATION</h1>
									</div>
									 <div class="form-column">
										<div class="mb-3 form-group">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" id="name" type="text" name="name" placeholder="Enter your name" value="{{old('name')}}" />
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Mobile No</label>
											<input class="form-control form-control-lg" type="text" id="mobilenumber" name="mobileno" placeholder="Enter your mobileno" value="{{old('mobileno')}}" />
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" value="{{old('email')}}" />
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Date of Birth</label>
											<input class="form-control form-control-lg" type="date" name="dob" placeholder="Enter DOB" value="{{old('dob')}}" />
										</div>
										<div class="mb-3">
											<label class="form-label  form-group">Gender</label><br/>
											<input  type="radio" id="male" name="gender" value="male" />
											<label for="male">Male</label><br/>
											<input  type="radio" id="female" name="gender" value="female" />
											<label for="fe">Female</label>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Date of Joining</label>
											<input class="form-control form-control-lg" type="date" name="doj" placeholder="Enter DOB" value="{{old('doj')}}" />
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Reference</label>
											<select class="form-control form-control-lg" type="dropdown" name="reference">
												<option>Select Member Id</option>
												@foreach($members as $members)
                                				<option value="{{$members->id}}">{{$members->name}}/{{$members->mobileno}}</option>
                               					@endforeach
										</select>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Height</label>
											<input class="form-control form-control-lg" type="text" name="height" placeholder="Enter your height" value="{{old('height')}}" />
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Current Weight</label>
											<input class="form-control form-control-lg" type="text" name="currentWeight" placeholder="Enter your weight" value="{{old('currentWeight')}}" />
										</div>
									</div>
									 <div class="form-column">
										<div class="mb-3 form-group">
											<label class="form-label">Fat Percentage</label>
											<input class="form-control form-control-lg" type="number" id="percentage" name="fatPercentage" min="0" max="100" step="0.01" placeholder="Enter your Fat" value="{{old('fatPercentage')}}" />
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Plan</label>
											<select class="form-control form-control-lg" type="dropdown" name="plan">
												<option>Select Plan</option>
												@foreach($plan as $plan)
                                				<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                               					@endforeach
											</select>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Address</label>
											<textarea class="form-control form-control-lg"  name="address" rows="5" cols="33" />{{old('address')}}</textarea>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Photo</label>
											<input class="form-control form-control-lg" type="file" name="photo" />

										</div>
										
										<div class="mb-3 form-group">
											<label class="form-label">Diet</label>
											<select class="form-control form-control-lg" type="dropdown" name="diet">
												<option>Select Diet</option>
												<option>Vegetarian</option>
												<option>Non-vegetarian</option>
												<option>Vegan</option>
												<option>Eggetarian</option>
											</select>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Life Style</label>
											<select class="form-control form-control-lg" type="dropdown" name="lifestyle">
												<option>Select Life Style</option>
												<option>Active</option>
												<option>Moderate</option>
												<option>Lazy</option>
											</select>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Profession</label>
											<select class="form-control form-control-lg" type="dropdown" name="profession">
												<option>Select Profession</option>
												<option>Bench Work</option>
												<option>Field Marketing</option>
												<option>Computer Work</option>
												<option>Sales Marketing</option>
											</select>
										</div>
										<div class="mb-3 form-group">
											<label class="form-label">Occupation</label>
											<input class="form-control form-control-lg" type="text" name="occupation" placeholder="Enter Occupation" value="{{old('occupation')}}" />
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
											<button type="submit" class="btn btn-lg btn-primary">Register</button>
										</div>
									</div>
									</form>
									<script type="text/javascript">
										// $(document).ready(function() {
										function showmobile(){
											document.getElementById("mobile").style.display = "block";
											document.getElementById("form").style.display = "none";
										}
										function hidemobile(){
											document.getElementById("mobile").style.display = "none";
											document.getElementById("form").style.display = "block";
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
		@endsection