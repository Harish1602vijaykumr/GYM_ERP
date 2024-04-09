@extends('admin.adminlayout')
@section('title','Plan')
@section('content')
			<!-- <div class="container d-flex flex-column">
					<div class="d-table-cell align-middle"> -->
						<div class="card col-md-8 mx-auto d-table h-30 mt-3">
							<div class="card-body">
							<div class="card-body">
								<div class="m-sm-3">
									<div class="text-center mt-4">
										<h1 class="h2">ADD NEW PLAN</h1>
									</div>
									<form action="{{url('storeplan')}}" method="post">
										{{csrf_field()}}
										<div class="mb-3">
											<label class="form-label">Plan Name</label>
											<input class="form-control form-control-lg" type="text" name="plan_name" placeholder="Enter your plan name" />
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

@endsection