@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body">

                <h4 class="mt-0 header-title">{{ trans('site.activitylog.manage') }}</h4>
                <p class="text-muted mb-3">Nhật ký này hiển thị danh sách các hành động xảy ra trong ứng dụng</p>

                <table id="activityLog" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>{{ trans('site.activitylog.title') }}</th>
                        <th>{{ trans('site.activitylog.position') }}</th>
                        <th>{{ trans('site.activitylog.description') }}</th>
                        <th>{{ trans('site.activitylog.action') }}</th>
                        <th>{{ trans('site.activitylog.email') }}</th>
                        <th>{{ trans('site.activitylog.date_time') }}</th>
                    </tr>
                    </thead>    
                </table>        
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $.noConflict();
        $('#activityLog').DataTable({
            ajax: '{!! route('activitylog.data') !!}',
            serverSide: true,
            processing: true,
            columns: [
                {data: 'id'},
                {data: 'log_name'},
                {data: 'subject_type'},
                {data: 'properties'},
                {data: 'causer_id'},
                {data: 'created_at'},
            ],
            columnDefs: [
                { targets: [0, 1], visible: true},
            ],
        });
    })
</script>
@endsection
@push('styles')
<link href="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endpush