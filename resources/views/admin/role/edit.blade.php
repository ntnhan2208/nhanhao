@extends('admin.master')
@section('content')
    <form action="{{ route('role.update',$role)}}" method="POST">
        <div class="page-content pl-3">
            <div class="row mt-3 mr-auto ">
                <div class="col-6">
                    <div class="card shadow-lg bg-white rounded">
                        <div class="card-body">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="form-group">
                                <label for="example-input2-group1">{{ trans('site.role.name') }}</label>
                                <div class="input-group">
                                    <input type="text" id="example-input2-group1" name="name" class="form-control"
                                           value="{{$role-> name}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                                {{trans('site.button_update') }} </button>
                            <a href="{{ route('role.index') }}"><button type="button" class="btn btn-danger ml-2
                            px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow-lg bg-white rounded">
                        <div class="card-body">
                            <label>{{ trans('site.permission.name') }}</label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <input id="{{ $permission->id }}" value="{{ $permission->id }}"
                                                   name="permissions[]" {{ in_array($permission->id,
                                                   $rolePermissions) ? 'checked' : '' }}
                                            type="checkbox">  {{
                                                   $permission->name }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


