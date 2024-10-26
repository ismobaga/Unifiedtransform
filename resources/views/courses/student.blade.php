@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="pt-2 row">
                <div class="col ps-4">
                    <h1 class="mb-3 display-6">
                        <i class="bi bi-journal-medical"></i> Mes Cours
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mes cours</li>
                        </ol>
                    </nav>
                    <div class="mt-4 mb-4">
                        <div class="p-3 mt-3 bg-white border shadow-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom du cours</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($courses)
                                    @foreach ($courses as $course)
                                    <tr>
                                        <td>{{$course->course_name}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{route('course.mark.show', [
                                                        'course_id' => $course->id,
                                                        'course_name' => $course->course_name,
                                                        'semester_id' => $course->semester_id,
                                                        'class_id'  => $class_info->class_id,
                                                        'session_id' => $course->session_id,
                                                        'section_id' => $class_info->section_id,
                                                        'student_id' => Auth::user()->id
                                                        ])}}" role="button" class="btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-cloud-sun"></i> Voir les notes</a>
                                                <a href="{{route('course.syllabus.index', ['course_id'  => $course->id])}}"
                                                    role="button" class="btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-journal-text"></i> Voir le plan de cours</a>
                                                <a href="{{route('assignment.list.show', ['course_id' => $course->id])}}"
                                                    role="button" class="btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-file-post"></i> Voir les devoirs</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection