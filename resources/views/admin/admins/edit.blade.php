@extends('admin.master')
@section('stylesheet')
    <link href="{{asset('admin/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row mt-3 mr-auto ">
    <div class="col-6">
        <div class="card shadow-lg bg-white rounded">
            <div class="card-body">
                <form action="{{ route('admins.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                        <label for="example-input2-group1">{{ trans('site.admin.name') }}</label>
                        <div class="input-group">
                            <input type="text" id="example-input2-group1" name="name" class="form-control" value="{{$admin->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-muted mb-3">{{ trans('site.admin.image') }}</p>
                        <input type="file" name="images" id="input-file-now" class="dropify" data-height="300" data-default-file="{{ asset('images/'.$admin->image) }}" />   
                    </div>
                    <div class="form-group">
                        <label for="example-input2-group1">{{ trans('site.admin.email') }}</label>
                        <div class="input-group">
                            <input type="text" id="example-input2-group1" readonly name="email" class="form-control" value="{{$admin->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-input2-group1">{{ trans('site.admin.password') }}</label>
                        <div class="input-group">
                            <input type="password" id="example-input2-group1" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('site.admin.role') }}  </label>
                        <div class="input-group">
                            <select class="form-control" name="role">
                                @foreach($roles as $role)
                                    <option {{ in_array($role->id, $adminRoles) ? 'selected' : '' }} value = "{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                        {{trans('site.button_update') }} </button>
                    <a href="{{ route('admins.index') }}"><button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button></a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow-lg bg-white rounded">
            <div class="card-body">
                @if(isset($QRImage))
                    <div class="panel-body text-center">
                        <p>{{ trans('site.note_2fa1') }}</p>
                        <p>{{ trans('site.note_2fa2') }}</p>
                        <p>{{ trans('site.note_2fa') }} </p>
                        <div>
                            <img src="{{ $QRImage }}">
                        </div>
                        <h2>{{ $admin->secret_code }}</h2>
                        <div>
                            <form action="{{ route('admins.complete_2fa')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                                <input type="hidden" name="google2fa_enable"
                                       value="{{ $admin->google2fa_enable == 1 ? 0 : 1 }}">
                                @if($admin->google2fa_enable == 1)
                                    <button type="submit" class="btn btn-danger px-4 mt-2">
                                        {{ trans('site.disable_2fa') }}</button>
                                @else
                                    <button type="submit" class="btn btn-primary px-4 mt-2">
                                        {{ trans('site.enable_2fa') }}</button>
                                @endif
                                <a class="btn btn-warning ml-2 px-4 mt-2" href="{{ route('admins.reset_2fa',
                                $admin->id) }}">
                                    {{trans('site.reset_2fa') }}
                                </a>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('admin/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection
