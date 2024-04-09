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
									<form action="{{url('storeenquiry')}}" method="post">
										{{csrf_field()}}
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter  name" />
										</div>
											<div class="mb-3">
											<label class="form-label">Mobile No</label>
											<input class="form-control form-control-lg" type="text" name="mobileno" placeholder="Enter Mobile No" value="{{old('mobileno')}}" />
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