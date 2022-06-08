@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="page-title-box">
			<div class="float-right">
				<a class="btn btn-primary" href="{{ route('admins.create') }}">{{ trans('site.add') }}</a>
			</div>
			<h4 class="page-title">{{ trans('site.admin.title') }}</h4>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card mt-3">
			<div class="card-body">
				<div class="table-rep-plugin">
					<div class="table-responsive mb-0" data-pattern="priority-columns">
						<table id="tech-companies-1" class="table table-striped mb-0">
							<thead>
							<tr>
								<th data-priority="1" class="text-center">STT</th>
								<th data-priority="1">{{ trans('site.admin.image') }}</th>
								<th data-priority="1">{{ trans('site.admin.name') }}</th>
								<th data-priority="1">{{ trans('site.admin.email') }}</th>
								<th data-priority="1">{{ trans('site.admin.role') }}</th>
								<th data-priority="1">{{ trans('site.2fa') }}</th>
								<th data-priority="1"></th>
							</tr>
							</thead>
							<tbody>
								@foreach($admins as $admin)
									<tr>
										<td class="text-center">{{ $loop->iteration }}</td>
										<td><img class="max-height-64" src="{{ \Sanitize::showImage('images/'.$admin->image) }}"></td>
										<td>{{ $admin->name }}</td>
										<td>{{ $admin->email }}</td>
										<td>{{ $admin->role_name }}</td>
										<td>
											@if(!empty($admin->secret_code) && $admin->google2fa_enable == 1)
												<a class="btn btn-xs btn-danger px-4 mt-2" href="{{ route('admins.disable_2fa',$admin->id) }}">
													{{trans('site.disable_2fa') }}
												</a>
												<a class="btn btn-xs btn-warning px-4 mt-2" href="{{ route('admins.reset_2fa',$admin->id) }}">
													{{trans('site.reset_2fa') }}
												</a>
											@else
												<form action="{{ route('admins.enable_2fa') }}" method="POST">
													@csrf
													<input type="hidden" name="id" value="{{ $admin->id }}">
													<button type="submit" class="btn btn-xs btn-primary px-4 mt-2">
														{{trans('site.enable_2fa') }}
													</button>
												</form>
											@endif
										</td>
										<td class="text-right">
											<form class="float-right" action="{{route('admins.destroy',$admin->id)}}"
												  method="POST" onSubmit="if(!confirm('{{ trans('site.admin.confirm') }}'))
												  {return false;}">
												{{ method_field('DELETE') }}
												{{ csrf_field() }}
												<button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
											</form>
											<div class="float-right">
												<a class="btn btn-xs btn-primary mr-3" href="{{ route('admins.edit',$admin->id) }}">
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
