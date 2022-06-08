@extends('admin.master')
@section('content')
<div class="page-content pl-3">
    <div class="row mt-3 mr-auto ">
        <div class="col-6">
            <div class="card shadow-lg bg-white rounded">
                <div class="card-body">
                    <form action="{{ route('permission.update',$permission)}}" method="POST">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label for="example-input2-group1">{{ trans('site.permission.name') }}</label>
                            <div class="input-group">
                                <input type="text" id="example-input2-group1" name="name" class="form-control"
                                       value="{{ $permission->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-input2-group1">{{ trans('site.permission.slug') }}</label>
                            <div class="input-group">
                                <input type="text" id="example-input2-group1" name="slug" class="form-control"
                                       value="{{ $permission->slug }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                            {{trans('site.button_update') }} </button>
                        <a href="{{ route('permission.index') }}"><button type="button" class="btn btn-danger ml-2
                        px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> {{trans('site.reset') }} </button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


