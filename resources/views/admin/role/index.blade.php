@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card mt-3">
			<div class="card-body">
				<h4 class="mt-0 header-title">{{ trans('site.role.title') }}</h4>
				<form action="{{ route('role.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" id="example-input1-group1" name="name" class="form-control"
										   placeholder="{{ trans('site.role.name') }}">
								</div>
							</div>
							<div class="col-lg-2">
								<button type="submit" class="btn btn-primary px-4 mb-3"><i class="mdi
                        mdi-plus-circle-outline mr-2"></i>{{ trans('site.button_add') }}</button>
							</div>
						</div>
					</div>
				</form>
				<div class="table-rep-plugin">
					<div class="table-responsive mb-0" data-pattern="priority-columns">
						<table id="tech-companies-1" class="table table-striped mb-0">
							<thead>
							<tr>
								<th></th>
								<th data-priority="1">{{ trans('site.role.name') }}</th>
								<th data-priority="1"></th>
							</tr>
							</thead>
							<tbody>
								@foreach($roles as $role)
									<tr>
										<th>{{ $loop->iteration }}</th>
										<td>{{ $role->name }}</td>
										<td class="text-right">
											<form class="float-right" action="{{route('role.destroy',$role->id)}}"
												  method="POST" onSubmit="if(!confirm('{{ trans('site.confirm') }}'))
												  {return false;}">
												{{ method_field('DELETE') }}
												{{ csrf_field() }}
												<button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
											</form>
											<div class="float-right">
												<a class="btn btn-xs btn-primary mr-3" href="{{ route('role.edit',
												$role) }}">
													<i class="far fa-edit"></i>
												</a>
											</div>
										</td>
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