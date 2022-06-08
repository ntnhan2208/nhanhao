@extends('admin.master')
@section('stylesheet')
    <link href="{{asset('admin/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="{{ route('admins.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('site.admin.name') }} </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       placeholder="{{ trans('site.admin.name') }}" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.admin.email') }} </label>
                            <div class="input-group">
                                <input type="text"  name="email" class="form-control" placeholder="{{ trans('site.admin.email') }}" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-muted mb-3">{{ trans('site.admin.image') }}</p>
                            <input type="file" name="images" id="input-file-now" class="dropify" />   
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.admin.password') }}  </label>
                            <div class="input-group">
                                <input type="password"  name="password" class="form-control" placeholder="{{ trans('site.admin.password') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('site.admin.role') }}  </label>
                            <div class="input-group">
                                <select class="form-control" name="role">
                                    @foreach($roles as $role)
                                        <option value = "{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="mdi
                        mdi-plus-circle-outline mr-2"></i>{{ trans('site.button_add') }}</button>
                        <a href="{{ route('admins.index') }}"><button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('admin/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection
