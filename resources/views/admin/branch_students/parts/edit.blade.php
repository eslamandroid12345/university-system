<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('userBranches.update', $userBranch->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$userBranch->id }}" name="id">
        <div class="form-group">
            <div class="row">

                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id">
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id}}">{{ $department->getTranslation('department_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" required>
                        <option value="{{ $userBranch->department_branch_id }}" >{{ $userBranch->branch->getTranslation('branch_name', app()->getLocale()) }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="user_id" class="form-control-label">@lang('admin.student_branch')</label>
                    <select class="form-control" name="user_id"  required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($students as $student)
                            <option
                                {{ ($student->id == $userBranch->user_id) ? ' selected' : '' }}
                                value="{{ $student->id}}">{{ $student->first_name. ' ' . $student->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6 mt-4" >
                    <input class="" type="text" value="0" hidden name="branch_restart_register"/>
                    <label class="tgl-btn">@lang('admin.branch_restart_register')</label>
                    <input class="tgl tgl-ios"
                           {{ ($userBranch->branch_restart_register == 1) ? 'checked' : '' }}
                           id="cb2" type="checkbox" value="1" name="branch_restart_register"/>
                    <label class="tgl-btn" dir="ltr" for="cb2"></label>
                </div>
                <div class="col-md-6">
                    <label for="register_year" class="form-control-label">@lang('admin.register_year')</label>
                    <input type="text" class="form-control" value="{{ $userBranch->register_year }}" name="register_year" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
            <button type="submit" class="btn btn-success" id="updateButton">@lang('admin.update')</button>
        </div>
    </form>
</div>
<script>


    $(document).ready(function() {
        $('select').select2();
    });

    $('select[name="department_id"]').on('change', function() {
        localStorage.setItem('department_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getBranches') }}',
            data : {
                'id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="department_branch_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="department_branch_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="department_branch_id"]').empty();
                    $('select[name="department_branch_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })
</script>
