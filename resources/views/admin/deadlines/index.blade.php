@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.deadlines') }}
@endsection
@section('page_name')
    {{ trans('admin.deadlines') }}
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> {{ trans('admin.add') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>


                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-50px">{{ trans('admin.deadline_date_start') }}</th>
                                <th class="min-w-50px">{{ trans('admin.deadline_date_end') }}</th>
                                <th class="min-w-50px">{{ trans('deadline.year') }}</th>
                                <th class="min-w-50px">{{ trans('deadline.period') }}</th>
                                <th class="min-w-50px">{{ trans('deadline.deadline_type') }}</th>
                                <th class="min-w-50px rounded-end">{{ trans('admin.actions') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal"  role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.delete') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>{{ trans('admin.sure_delete') }}<span id="title" class="text-danger"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            {{ trans('admin.close') }}
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">{{ trans('admin.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Create Or Edit Modal -->
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">{{ trans('admin.an_appointment') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
    </div>
    @include('admin.layouts.myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>

        var columns = [
            {data: 'deadline_date_start', name: 'deadline_date_start'},
            {data: 'deadline_date_end', name: 'deadline_date_end'},
            {data: 'year', name: 'year'},
            {data: 'period', name: 'period'},
            {data: 'deadline_type', name: 'deadline_type'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('deadlines.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('deadlines.destroy',':id')}}');
        // Add Using Ajax
        showAddModal('{{route('deadlines.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('deadlines.edit',':id')}}');
        editScript();
    </script>
@endsection

