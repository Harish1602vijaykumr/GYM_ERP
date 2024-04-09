@extends('admin.adminlayout')
@section('title','EditEntry')
@section('content')
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{url('storeentryedit')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
										<h3>ENTRY</h3>
										<div class="mb-3">
											<label class="form-label">Member Id</label>
											<input type="hidden" name="id" value="{{$entry->id}}">
											<select class="form-control form-control-lg" type="dropdown" name="member_id">
												<option>Select Member Id</option>
												@foreach($members as $members)
                                				<option value="{{$members->id}}">{{$members->name}}/{{$members->mobileno}}</option>
                               					@endforeach
										</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Weight</label>
											<input class="form-control form-control-lg" type="text" name="weight"  value="{{old('weight')}}" id="yes" />
											<span id="error"></span>
										</div>
										<div class="mb-3">
											<label class="form-label">Supplements</label><br/>
											<input  type="radio" name="supplements" value="0" id="yes" onclick="showsupplement()" />
											<label class="form-label">Yes</label><br/>
											<input  type="radio" name="supplements" value="1" id="no" onclick="hidesupplement()" />
											<label class="form-label">No</label>
											<span id="error"></span>
										</div>
										<div class="mb-3" id="supplement_name" style="display: none;">
											<label class="form-label">Supplement Name</label>
											<input class="form-control form-control-lg" type="text" name="supplement_name" placeholder="Enter Supplement Name" value="{{old('supplement_name')}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Fat Percentage</label>
											<input class="form-control form-control-lg" type="number" name="fatPercentage" placeholder="Enter the fatPercentage" value="{{old('fatPercentage')}}" />
										</div>
										<div class="mb-3">
											<label class="form-label">Workout</label>
											<select class="form-control form-control-lg" type="dropdown" name="workout">
												<option>Select workout</option>
												@foreach($workout as $workout)
                                				<option value="{{$workout->id}}">{{$workout->workout_name}}</option>
                               					@endforeach
										</select>
										</div>
										<div class="mb-3">
											<label class="form-label">BodyShape</label>
											<select class="form-control form-control-lg" type="dropdown" name="bodyshape">
												<option>Select bodyshape</option>
												@foreach($bodyshape as $bodyshape)
                                				<option value="{{$bodyshape->id}}">{{$bodyshape->bodyshape}}</option>
                               					@endforeach
										</select>
										</div>
										<div class="d-flex justify-content-center mt-3">
											<button type="submit" id="submit" class="btn btn-lg btn-primary w-auto">Save</button>
										</div>
									</form>
									<script type="text/javascript">
										function showsupplement(){
											document.getElementById("supplement_name").style.display = "block";
										}
										function hidesupplement(){
											document.getElementById("supplement_name").style.display = "none";
										}
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