<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="#">
            <img src="{{ asset('uploads/university_setting/'. $university_settings->logo) }}"
                 class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        @if (checkUser('manger') || checkUser('employee')|| checkUser('student') || checkUser('doctor'))
            <li>
                <h3><a href="{{ route('admin.home') }}">{{ trans('admin.dashboard') }}</a></h3>
            </li>
        @endif

        {{-------------------------- start region doctor - الدكتور ------------------------}}
        @if (checkUser('doctor'))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-book-open side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_unit_doctors') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('dashboard.subject') }}"
                           class="slide-item">{{ trans('admin.subject_unit_doctors') }}</a></li>
                    <li><a href="{{ route('subject_exam_student_result.index') }}"
                           class="slide-item">{{ trans('admin.result') }}</a></li>

                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.process_degrees') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('process_degrees.normal') }}"
                           class="slide-item">{{ trans('admin.normal') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('process_degrees.catchUp') }}"
                           class="slide-item">{{ trans('admin.catch_up') }}
                        </a>
                    </li>

                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('process_degrees.history')}}">
                    <i class="fe fe-message-square side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.all_requests') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('indexDoctor')}}">
                    <i class="fa fa-newspaper side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.internal_ads') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('schedules.index')}}">
                    <i class="fe fe-clock side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.Usage schedules') }}</span>
                </a>
            </li>
        @endif
        {{-------------------------- end region doctor - الدكتور ------------------------}}





        {{-------------------------- start region employee - الادارة ------------------------}}
        @if (checkUser('employee'))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-users side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.users') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('users.index') }}" class="slide-item">{{ trans('admin.all_users') }}</a></li>
                    <li><a href="{{route('studentType.index')}}"
                           class="slide-item">{{ trans('admin.students_types') }}</a></li>
                    <li><a href="{{ route('admins.index') }}" class="slide-item">{{ trans('admin.all_admins') }}</a>
                    </li>
                </ul>
            </li>


            {{-- start website data --}}

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-box side-menu__icon"></i>
                    <span class="side-menu__label">@lang('admin.parts of the site')</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('categories.index') }}"
                           class="slide-item">{{ trans('admin.categories') }}</a>
                    </li>
                    <li><a href="{{ route('sliders.index') }}" class="slide-item">{{ trans('admin.sliders') }}</a>
                    </li>
                    <li><a href="{{ route('word.index') }}" class="slide-item">{{ trans('admin.wordManager') }}</a>
                    </li>
                    <li><a href="{{ route('pages.index') }}" class="slide-item">{{ trans('admin.pages') }}</a></li>
                    <li><a href="{{ route('facultyCount.index') }}" class="slide-item">{{ trans('admin.counter') }}</a>
                    </li>
                    <li><a href="{{ route('presentations.index') }}"
                           class="slide-item">{{ trans('admin.presentations') }}</a></li>
                    <li><a href="{{ route('video.index') }}" class="slide-item">{{ trans('admin.videos') }}</a></li>
                </ul>
            {{-- end website data --}}


            {{-- start schedule data in dashboard --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-clock side-menu__icon"></i>
                    <span class="side-menu__label">@lang('admin.Usage schedules')</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('schedules.index') }}"
                           class="slide-item">{{ trans('admin.all_schedules') }}</a>
                    </li>

                </ul>
            </li>
            {{-- end schedule data in dashboard --}}

            {{-- start internal ads data --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-newspaper side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.Ads section') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('services.index') }}"
                           class="slide-item">{{ trans('admin.services') }}</a>
                    </li>

                    <li><a href="{{ route('internal_ads.index') }}"
                           class="slide-item">{{ trans('admin.internal_ads') }}</a>
                    </li>

                    <li><a href="{{ route('advertisements.index') }}"
                           class="slide-item">{{ trans('admin.ads') }}</a>
                    </li>


                </ul>
            </li>
            {{-- end internal ads data --}}

            {{--   start Document requests  --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-repeat side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.Document requests') }}
                    <div style="width: 30px;height: 30px;border-radius: 50%;background: #56d094;color: #fff;display: inline-block;padding: 6px;text-align: center">{{documentCount()}}</div>
                    </span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('document_types.index') }}"
                           class="slide-item">@lang('admin.document_types')</a>
                    </li>
                    <li><a href="{{ route('documents.index') }}"
                           class="slide-item">@lang('admin.Document requests')</a>
                    </li>
                </ul>
            </li>
            {{--   end Document requests  --}}



            {{--   start Diploma certificates  --}}

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-user-check side-menu__icon"></i>
                    <span
                        class="side-menu__label">{{ trans('admin.Those_concerned_with_evidence_and_diploma') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('certificates.index') }}"
                           class="slide-item">{{ trans('admin.Diploma certificates') }}</a></li>
                </ul>
            </li>

            {{--   end Diploma certificates  --}}


            <li class="slide">
                <a class="side-menu__item" href="{{ route('group.index') }}">
                    <i class="fe fe-target side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.groups') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('process_exams.index') }}">
                    <i class="fe fe-repeat side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.process_exams') }} <div
                            style="width: 30px;height: 30px;border-radius: 50%;background: #56d094;color: #fff;display: inline-block;padding: 6px;text-align: center">{{processExamCount()}}</div> </span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('reasons_redress.index') }}">
                    <i class="fa fa-question side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.Reasons_for_redress') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('unit.index') }}">
                    <i class="fe fe-cast side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.units') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('subjects.index') }}">
                    <i class="fe fe-share side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subjects') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('subject_student.index')}}">
                    <i class="fe fe-user-check side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_students') }}</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{ route('certificate_name.index') }}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.certificate_name') }}</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item" href="{{ route('departments.index') }}">
                    <i class="fe fe-arrow-up-circle side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.departments') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('departmentStudents.index') }}">
                    <i class="fe fe-arrow-up-circle side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.department_students') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('branches.index') }}">
                    <i class="fe fe-arrow-down-circle side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.branches') }}</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item" href="{{ route('subject_unit_doctor.index') }}">
                    <i class="fe fe-user-check side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_unit_doctors') }}</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_exams') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('subject_exams.index') }}"
                           class="slide-item">{{ trans('admin.subject_exams') }}</a></li>
                    <li><a href="{{ route('subject_exam_students.index') }}"
                           class="slide-item">{{ trans('admin.subject_exam_students') }}</a>
                    </li>
                </ul>
            </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{route('process_degrees.index')}}">
                        <i class="fe fe-file-text side-menu__icon"></i>
                        <span class="side-menu__label">{{ trans('student_sidebar.process_degree') }} <div
                            style="width: 30px;height: 30px;border-radius: 50%;background: #56d094;color: #fff;display: inline-block;padding: 6px;text-align: center">{{processDegreeRequestCount()}}</div></span>
                    </a>
                </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('subject_exam_student_result.results') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('subject_exam_student_result.index') }}"
                           class="slide-item">{{ trans('subject_exam_student_result.normal') }}</a></li>
                    <li><a href="{{ route('results.remedial') }}"
                           class="slide-item">{{ trans('subject_exam_student_result.remedial') }}</a>
                    </li>
                </ul>
            </li>




            <li class="slide">
                <a class="side-menu__item" href="{{ route('points.index') }}">
                    <i class="fe fe-pocket side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.point statement') }}</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item" href="{{ route('data_modify.index') }}">
                    <i class="fe fe-rewind side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.data_modify') }}</span>
                    <div style="width: 30px;height: 30px;border-radius: 50%;background: #56d094;color: #fff;display: inline-block;padding: 6px;text-align: center">{{dataModificationCount()}}</div>


                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{ route('periods.index') }}">
                    <i class="fe fe-clock side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.period_all') }}</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item" href="{{ route('deadlines.index') }}">
                    <i class="fe fe-clock side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.deadlines') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('elements.index') }}">
                    <i class="fe fe-octagon side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.elements') }}</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{ route('events.index') }}">
                    <i class="fe fe-phone-call side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.events') }}</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{route('userBranches.index')}}">
                    <i class="fe fe-eye side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.department_branch_students') }}</span>
                </a>
            </li>



{{--            <li class="slide">--}}
{{--                <a class="side-menu__item" href="{{route('subject_student.index')}}">--}}
{{--                    <i class="fe fe-save side-menu__icon"></i>--}}
{{--                    <span class="side-menu__label">{{ trans('admin.all_subject_students') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}



            <li class="slide">
                <a class="side-menu__item" href="#">
                    <i class="fe fe-clock side-menu__icon"></i>
                    <span
                        class="side-menu__label">{{ trans('admin.university_year') }} {{\Carbon\Carbon::now()->format('Y') .'-' . \Carbon\Carbon::now()->addYear()->format('Y')}}</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{route('doctors.index')}}">
                    <i class="fe fe-users side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.all_doctors') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('university_settings.index') }}">
                    <i class="fe fe-settings side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.university_settings') }}</span>
                </a>
            </li>

        @endif
        {{-------------------------- end region employee - الادارة ------------------------}}





        {{-------------------------- start region student - الطالب ------------------------}}
        {{--        @if(checkUser('student'))--}}
        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('profile')}}">--}}
        {{--                    <i class="fe fe-user-check side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{trans('admin.profile')}}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('subject_student.index')}}">--}}
        {{--                    <i class="fe fe-bookmark side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.subject_students') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('indexDoctor')}}">--}}
        {{--                    <i class="fa fa-newspaper side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.internal_ads') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}
        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{ route('certificates.registeration') }}">--}}
        {{--                    <i class="fe fe-file-text side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.college_enrollment_certificate') }}--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('schedules.students.all')}}">--}}
        {{--                    <i class="fe fe-clock side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.all_schedules') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}


        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('subject_exams.students.all')}}">--}}
        {{--                    <i class="fe fe-arrow-down-circle side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.subject_exam_student') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('exam_result.all')}}">--}}
        {{--                    <i class="fe fe-file-text side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.subject_exam_student_results') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}


        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('documents.student')}}">--}}
        {{--                    <i class="fe fe-file-plus side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.Student documents') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{ route('users.show') }}">--}}
        {{--                    <i class="fe fe-play side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.points') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('processDegreeStudent')}}">--}}
        {{--                    <i class="fe fe-arrow-up-circle side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.process_degrees') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}
        {{--            <li class="slide">--}}
        {{--                <a class="side-menu__item" href="{{route('subject_exams.index')}}">--}}
        {{--                    <i class="fe fe-bell side-menu__icon"></i>--}}
        {{--                    <span class="side-menu__label">{{ trans('admin.process_exams') }}</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}



        {{--        @endif--}}
        @if(checkUser('student'))

            <li class="slide">
                <a class="side-menu__item" href="{{url('dashboard')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.dashboard') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('profile')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.profile') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('subject-student-all')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.subjects_students') }}</span>
                </a>
            </li>

            {{--                <li class="slide">--}}
            {{--                    <a class="side-menu__item" href="#">--}}
            {{--                        <i class="fe fe-file-text side-menu__icon"></i>--}}
            {{--                        <span class="side-menu__label">{{ trans('student_sidebar.department_student') }}</span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            <li class="slide">
                <a class="side-menu__item" href="{{route('schedules.students.all')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.schedules') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('indexDoctor')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.advertisements') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('certificates.registeration')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.registration_certificate') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('documents-student-all')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.documents') }}</span>
                </a>
            </li>



            {{-- استدعاء الامتحانات--}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.subject_exam_students') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('subject-exam-student-normal')}}"
                           class="slide-item">{{ trans('student_sidebar.subject_exam_students_normal') }}</a></li>
                    <li><a href="{{route('subject-exam-student-remedial')}}"
                           class="slide-item">{{ trans('student_sidebar.subject_exam_students_remedial') }}</a></li>

                </ul>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{route('get-all-process-exams')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.process_exam') }}</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.subject_exam_student_result') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('subject-exam-result-normal')}}"
                           class="slide-item">{{ trans('student_sidebar.subject_exam_student_result_normal') }}</a></li>
                    <li><a href="{{route('subject-exam-result-remedial')}}"
                           class="slide-item">{{ trans('student_sidebar.subject_exam_student_result_remedial') }}</a>
                    </li>

                </ul>
            </li>


            <li class="slide">
                <a class="side-menu__item" href="{{route('get-all-process-degrees')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.process_degree') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('point-statement-student')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('student_sidebar.point_statement') }}</span>
                </a>
            </li>

        @endif

        {{-------------------------- end region student - الطالب ------------------------}}








        {{-------------------------- start region manager - العميد ------------------------}}
        @if(checkUser('manger'))
            <li class="slide">
                <a class="side-menu__item" href="{{route('departmentStudent')}}">
                    <i class="fe fe-plus-circle side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.student_count_department') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('subject_student.index')}}">
                    <i class="fe fe-user-plus side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_students') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('subject_exam_students.index')}}">
                    <i class="fe fe-arrow-up-circle side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_exam_students') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.subject_exam_student_results') }}</span><i
                        class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('subject_exam_student_result.index') }}"
                           class="slide-item">{{ trans('admin.normal') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('results.remedial') }}"
                           class="slide-item">{{ trans('admin.catch_up') }}</a>
                    </li>

                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('points.index')}}">
                    <i class="fe fe-airplay side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.point statement') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('schedules.index')}}">
                    <i class="fe fe-clock side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.Usage schedules') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('indexDoctor')}}">
                    <i class="fa fa-newspaper side-menu__icon"></i>
                    <span class="side-menu__label">{{ trans('admin.internal_ads') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('managerIndex')}}">
                    <i class="fe fe-users side-menu__icon"></i>
                    <span
                        class="side-menu__label">{{ trans('admin.Those concerned with evidence and diploma') }}</span>
                </a>
            </li>

    @endif
    {{-------------------------- end region manager - العميد ------------------------}}
</aside>
