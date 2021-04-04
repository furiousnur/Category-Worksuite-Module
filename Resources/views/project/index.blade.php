@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon ?? 'fa fa-bus' }}"></i> {{ $pageTitle }}</h4>
        </div>
    </div>
@endsection

@push('head-script')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <style>
        .filter-section .pull-left {
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                @include('category::layouts.sidebar')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProjectCategoryModal">
                    Add Project Category
                </button>
                <div class="table-responsive m-t-5">
                    {!! $dataTable->table(['class' => 'table table-bordered table-hover toggle-circle default footable-loaded footable']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="addProjectCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('category::app.projectCategory')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.category.store')}}" class="form-group" method="post">
                    @csrf
                    <label for="exampleInputEmail1">@lang('category::app.projectName')</label>
                    <input type="text" class="form-control" name="category_name" placeholder="@lang('category::app.projectName')">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('footer-script')
<script src="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('js/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script>
    $('#createNewDevice').click(function(e){
        e.preventDefault();
        $.ajaxModal('#deviceModal', $(this).attr('href'));
    });

    function editDevice(id){
        url = '{{route('admin.devices.edit', ':id')}}';
        url = url.replace(':id', id);
        $.ajaxModal('#deviceModal', url);
    }

    function viewDevice(id){
        url = '{{route('admin.devices.show', ':id')}}';
        url = url.replace(':id', id);
        $.ajaxModal('#deviceModal', url);
    }

    function deleteData(id) {
            swal({
                title: "{{__('category::app.message.sure')}}",
                text: "{{__('category::app.message.deviceDeleteWarn')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{__('category::app.deleteConfirm')}}",
                cancelButtonText: "{{__('category::app.deleteCancel')}}",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var url = "{{ route('employee.category.destroy',':id') }}";
                    url = url.replace(':id', id);
                    var token = "{{ csrf_token() }}";
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                window.LaravelDataTables["project_category-table"].draw();
                            }
                        }
                    });
                }
            });
        }

        @if(request('device'))
            $.ajaxModal('#deviceModal', '{{route('admin.devices.show', request('device'))}}');
        @endif
</script>
@endpush
