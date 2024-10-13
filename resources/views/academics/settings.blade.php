@extends('layouts.app')

@section('content')
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-tools"></i> {{ __('messages.academic_settings') }}
                    </h1>

                    @include('session-messages')

                    <div class="mb-4">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            @if ($latest_school_session_id == $current_school_session_id)
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.create_session') }}</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> {{
                                            __('messages.create_session_warning') }}</small>
                                    </p>
                                    <form action="{{ route('school.session.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="{{ __('messages.session_name_placeholder') }}"
                                                aria-label="{{ __('messages.current_session') }}" name="session_name"
                                                required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i
                                                class="bi bi-check2"></i> {{ __('messages.create_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.browse_by_session') }}</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> {{
                                            __('messages.browse_by_session_warning') }}</small>
                                    </p>
                                    <form action="{{ route('school.session.browse') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <p class="mt-2">{{ __('messages.select_session') }}:</p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="session_id" required>
                                                @isset($school_sessions)
                                                @foreach ($school_sessions as $school_session)
                                                <option value="{{ $school_session->id }}">{{
                                                    $school_session->session_name }}</option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i
                                                class="bi bi-check2"></i> {{ __('messages.set_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            @if ($latest_school_session_id == $current_school_session_id)
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.create_semester') }}</h6>
                                    <form action="{{ route('school.semester.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                        <div class="mt-2">
                                            <p>{{ __('messages.semester_name') }}<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="{{ __('messages.semester_name_placeholder') }}"
                                                aria-label="{{ __('messages.semester_name') }}" name="semester_name"
                                                required>
                                        </div>
                                        <div class="mt-2">
                                            <label for="inputStarts" class="form-label">{{ __('messages.starts')
                                                }}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                            <input type="date" class="form-control form-control-sm" id="inputStarts"
                                                placeholder="{{ __('messages.starts') }}" name="start_date" required>
                                        </div>
                                        <div class="mt-2">
                                            <label for="inputEnds" class="form-label">{{ __('messages.ends') }}<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></label>
                                            <input type="date" class="form-control form-control-sm" id="inputEnds"
                                                placeholder="{{ __('messages.ends') }}" name="end_date" required>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                class="bi bi-check2"></i> {{ __('messages.create_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.attendance_type') }}</h6>
                                    <p class="text-danger">
                                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i> {{
                                            __('messages.attendance_type_warning') }}</small>
                                    </p>
                                    <form action="{{ route('school.attendance.type.update') }}" method="POST">
                                        @csrf
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type"
                                                id="attendance_type_section" {{ ($academic_setting->attendance_type ==
                                            'section') ? 'checked' : '' }} value="section">
                                            <label class="form-check-label" for="attendance_type_section">
                                                {{ __('messages.attendance_by_section') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="attendance_type"
                                                id="attendance_type_course" {{ ($academic_setting->attendance_type ==
                                            'course') ? 'checked' : '' }} value="course">
                                            <label class="form-check-label" for="attendance_type_course">
                                                {{ __('messages.attendance_by_course') }}
                                            </label>
                                        </div>

                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                class="bi bi-check2"></i> {{ __('messages.save_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.create_class') }}</h6>
                                    <form action="{{ route('school.class.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-sm" name="class_name"
                                                placeholder="{{ __('messages.class_name_placeholder') }}"
                                                aria-label="{{ __('messages.class_name_placeholder') }}" required>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i
                                                class="bi bi-check2"></i> {{ __('messages.create_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.create_section') }}</h6>
                                    <form action="{{ route('school.section.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="section_name" type="text"
                                                placeholder="{{ __('messages.section_name_placeholder') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" name="room_no" type="text"
                                                placeholder="{{ __('messages.room_no_placeholder') }}" required>
                                        </div>
                                        <div>
                                            <p>{{ __('messages.assign_section_to_class') }}:</p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="class_id" required>
                                                @isset($school_classes)
                                                @foreach ($school_classes as $school_class)
                                                <option value="{{ $school_class->id }}">{{ $school_class->class_name }}
                                                </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                class="bi bi-check2"></i> {{ __('messages.save_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.create_course') }}</h6>
                                    <form action="{{ route('school.course.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                        <div class="mb-1">
                                            <input type="text" class="form-control form-control-sm" name="course_name"
                                                placeholder="{{ __('messages.course_name_placeholder') }}"
                                                aria-label="{{ __('messages.course_name_placeholder') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mt-2">{{ __('messages.course_type') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" name="course_type"
                                                aria-label=".form-select-sm" required>
                                                <option value="Core">{{ __('messages.course_type_core') }}</option>
                                                <option value="General">{{ __('messages.course_type_general') }}
                                                </option>
                                                <option value="Elective">{{ __('messages.course_type_elective') }}
                                                </option>
                                                <option value="Optional">{{ __('messages.course_type_optional') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>{{ __('messages.assign_to_semester') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="semester_id" required>
                                                @isset($semesters)
                                                @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}">{{ $semester->semester_name }}
                                                </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>{{ __('messages.assign_to_class') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="class_id" required>
                                                @isset($school_classes)
                                                @foreach ($school_classes as $school_class)
                                                <option value="{{ $school_class->id }}">{{ $school_class->class_name }}
                                                </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary" type="submit"><i
                                                class="bi bi-check2"></i> {{ __('messages.create_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.assign_teacher') }}</h6>
                                    <form action="{{ route('school.teacher.assign') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{ $current_school_session_id }}">
                                        <div class="mb-3">
                                            <p class="mt-2">{{ __('messages.select_teacher') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="teacher_id" required>
                                                @isset($teachers)
                                                @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{
                                                    $teacher->last_name }}</option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p>{{ __('messages.assign_to_semester') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="semester_id" required>
                                                @isset($semesters)
                                                @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}">{{ $semester->semester_name }}
                                                </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div>
                                            <p>{{ __('messages.assign_to_class') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select onchange="getSectionsAndCourses(this);"
                                                class="form-select form-select-sm" aria-label=".form-select-sm"
                                                name="class_id" required>
                                                @isset($school_classes)
                                                <option selected disabled>{{ __('messages.select_class') }}</option>
                                                @foreach ($school_classes as $school_class)
                                                <option value="{{ $school_class->id }}">{{ $school_class->class_name }}
                                                </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">{{ __('messages.assign_to_section') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="section-select"
                                                aria-label=".form-select-sm" name="section_id" required>
                                                <!-- Les options seront chargées dynamiquement -->
                                            </select>
                                        </div>
                                        <div>
                                            <p class="mt-2">{{ __('messages.assign_to_course') }}:<sup><i
                                                        class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select form-select-sm" id="course-select"
                                                aria-label=".form-select-sm" name="course_id" required>
                                                <!-- Les options seront chargées dynamiquement -->
                                            </select>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                class="bi bi-check2"></i> {{ __('messages.save_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="p-3 border bg-light shadow-sm">
                                    <h6>{{ __('messages.allow_final_marks_submission') }}</h6>
                                    <form action="{{ route('school.final.marks.submission.status.update') }}"
                                        method="POST">
                                        @csrf
                                        <p class="text-danger">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> {{
                                                __('messages.allow_marks_submission_info') }}</small>
                                        </p>
                                        <p class="text-primary">
                                            <small><i class="bi bi-exclamation-diamond-fill me-2"></i> {{
                                                __('messages.disallow_marks_submission_info') }}</small>
                                        </p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="marks_submission_status" id="marks_submission_status_check" {{
                                                ($academic_setting->marks_submission_status == 'on') ? 'checked' : ''
                                            }}>
                                            <label class="form-check-label" for="marks_submission_status_check">
                                                {{ ($academic_setting->marks_submission_status == 'on') ?
                                                __('messages.final_marks_submission_allowed') :
                                                __('messages.final_marks_submission_disallowed') }}
                                            </label>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary"><i
                                                class="bi bi-check2"></i> {{ __('messages.save_button') }}</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
<script>
    function getSectionsAndCourses(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('section-select');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Veuillez sélectionner une section'});
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });

            var courseSelect = document.getElementById('course-select');
            courseSelect.options.length = 0;
            data.courses.unshift({'id': 0,'course_name': 'Veuillez sélectionner un cours'});
            data.courses.forEach(function(course, key) {
                courseSelect[key] = new Option(course.course_name, course.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@endsection
