@extends('admin.adminlayout')
@section('title','Workout')
@section('content')
			<!-- <div class="container d-flex flex-column">
					<div class="d-table-cell align-middle"> -->
						<div class="card col-md-8 mx-auto d-table h-30 mt-3">
							<div class="card-body">
								<div class="m-sm-3">
								<div class="text-center mt-4">
										<h1 class="h2">MONTHLY STATUS</h1>
									</div>
									<form action="{{url('storeworkout')}}" method="post">
										{{csrf_field()}}
										<div class="mb-3">
											<label class="form-label">Workout Name</label>
											<input class="form-control form-control-lg" type="text" name="workout_name" placeholder="Enter workout name" />
										</div>
										<div class="d-flex justify-content-center mt-3">
											<button class="btn btn-lg btn-primary" type="submit">Save</button>
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