<div style="padding: 20px" class="modalContent">
    <form id="addForm" class="addForm" method="POST" action="{{ route('periods.store') }}">
        @csrf

        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.period_start_date')}} </label>
                    <input type="date" class="form-control" name="period_start_date" id="period_start_date">
                </div>

                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.period_end_date')}} </label>
                    <input type="date" class="form-control" name="period_end_date" id="period_start_date">
                </div>

                <div class="col-md-12">
                    <label for="period" class="form-control-label">{{ trans('admin.period_name') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="period" class="form-control-label">{{ trans('admin.session_name') }}</label>
                    <select name="session" class="form-control">
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">{{trans('admin.remedial')}}</option>
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.year_start')}} </label>
                    <select name="year_start" class="form-control" id="year_start">
                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="group_name" class="form-control-label">{{ trans('admin.year_end')}} </label>
                    <select name="year_end" class="form-control" id="year_start">
                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add_data') }}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>

