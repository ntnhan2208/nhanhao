@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card mt-3">
			<div class="card-body">
				<h4 class="mt-0 header-title">{{ trans('site.permission.title') }}</h4>
				<div class="table-rep-plugin">
					<div class="table-responsive mb-0" data-pattern="priority-columns">
						<table id="tech-companies-1" class="table table-striped mb-0">
							<thead>
							<tr>
								<th></th>
								<th data-priority="1">{{ trans('site.permission.name') }}</th>
								<th data-priority="1">{{ trans('site.permission.slug') }}</th>
								<th data-priority="1"></th>
							</tr>
							</thead>
							<tbody>
								@foreach($routes as $route)
									<tr>
										@if(!empty($permissions[$route->getName()]))
											<form action="{{ route('permission.update',$permissions[$route->getName()])}}" method="POST">
						                        {{ method_field('PUT') }}
						                        @csrf
						                        <th>{{ $loop->iteration }}</th>
						                        <td>
													<input class="form-control" type="text" name="name" 
														placeholder="{{ trans('site.permission.placeholder_name') }}"
														value="{{ $permissions[$route->getName()] }}"
													>
													<input class="form-control" type="hidden" name="slug" value="{{ $route->getName() }}">
												</td>
												<td>{{ $route->getName() }}</td>
												<td class="text-right">
													<div class="float-right">
														<button type="submit" class="btn btn-warning"><i class="fas fa-save"></i>
						                            		{{trans('site.button_update') }} </button>
													</div>
												</td>
						                    </form>
										@else
											<form action="{{ route('permission.store')}}" method="POST">
												@csrf
												<th>{{ $loop->iteration }}</th>
												<td>
													<input class="form-control" type="text" name="name" 
														placeholder="{{ trans('site.permission.placeholder_name') }}">
													<input class="form-control" type="hidden" name="slug" value="{{ $route->getName() }}">
												</td>
												<td>{{ $route->getName() }}</td>
												<td class="text-right">
													<div class="float-right">
														<button class="btn btn-primary" type="submit">
															<i class="mdi mdi-plus-circle-outline mr-2"></i>{{ trans('site.button_add') }}
														</button>
													</div>
												</td>
											</form>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection