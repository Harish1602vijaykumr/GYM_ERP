@extends('admin.adminlayout')
@section('title','EditWorkout')
@section('content')
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{url('storeworkoutedit')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
										<div class="mb-3">
											<label class="form-label">Workout Name</label>
											<input type="hidden" name="id" value="{{$workout->id}}">
											<input class="form-control form-control-lg" type="text" name="workout_name" placeholder="Enter Workout name" value="{{$workout->workout_name}}" />
										</div>
										<div class="d-flex justify-content-center mt-3">
											<button type="submit" id="submit" class="btn btn-lg btn-primary w-auto">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

@endsection