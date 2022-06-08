@extends('admin.master')
@section('content')
<div class="row mt-3 mr-auto ">
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
                        <h2>{{ $secret }}</h2>
                        <div>
                            <form action="{{ route('admins.complete_2fa')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                                <input type="hidden" name="secret_code" value="{{ $secret }}">
                                <button type="submit" class="btn btn-primary px-4 mt-2">
                                    {{ trans('site.complete') }}
                                </button>
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


