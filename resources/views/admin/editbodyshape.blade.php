@extends('admin.adminlayout')
@section('title','EditBodyshape')
@section('content')
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{url('storebodyshapeedit')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
										<div class="mb-3">
											<label class="form-label">bodyshape</label>
											<input type="hidden" name="id" value="{{$bodyshape->id}}">
											<input class="form-control form-control-lg" type="text" name="bodyshape" placeholder="Enter bodyshape" value="{{$bodyshape->bodyshape}}" />
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