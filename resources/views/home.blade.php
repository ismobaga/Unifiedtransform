@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="pt-3 row">
                <div class="col ps-4">
                    <div class="row dashboard">
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Total
                                                Étudiants</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$studentCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Total
                                                Enseignants</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$teacherCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> Total Programmes
                                            </div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{ $classCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($studentCount > 0)
                    <div class="mt-3 d-flex align-items-center">
                        <div class="col-3">
                            <span class="ps-2 me-2">Pourcentage d'Étudiants</span>
                            <span class="border badge rounded-pill" style="background-color: #0678c8;">Masculin</span>
                            <span class="border badge rounded-pill" style="background-color: #49a4fe;">Féminin</span>
                        </div>
                        @php
                        $maleStudentPercentage = round(($maleStudentsBySession/$studentCount), 2) * 100;
                        $maleStudentPercentageStyle = "style='background-color: #0678c8; width:
                        $maleStudentPercentage%'";

                        $femaleStudentPercentage = round((($studentCount - $maleStudentsBySession)/$studentCount), 2) *
                        100;
                        $femaleStudentPercentageStyle = "style='background-color: #49a4fe; width:
                        $femaleStudentPercentage%'";
                        @endphp
                        <div class="col-9 progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                {!!$maleStudentPercentageStyle!!} aria-valuenow="{{$maleStudentPercentage}}"
                                aria-valuemin="0" aria-valuemax="100">{{$maleStudentPercentage}}%</div>
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                {!!$femaleStudentPercentageStyle!!} aria-valuenow="{{$femaleStudentPercentage}}"
                                aria-valuemin="0" aria-valuemax="100">{{$femaleStudentPercentage}}%</div>
                        </div>
                    </div>
                    @endif
                    <div class="mt-4 row align-items-md-stretch">
                        <div class="col">
                            <div class="p-3 text-white bg-dark rounded-3">
                                <h3>Bienvenue sur ISEST Connect!</h3>
                                <p><i class="bi bi-emoji-heart-eyes"></i> Merci pour votre amour et votre soutien.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white border rounded-3" style="height: 100%;">
                                <h3>Gérez mieux l'école</h3>
                                <p class="text-end">avec <i class="bi bi-lightning"></i> <a href="" target="_blank"
                                        style="text-decoration: none;">Connect</a> <i class="bi bi-lightning"></i>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-lg-6">
                            <div class="mb-3 card">
                                <div class="bg-transparent card-header"><i class="bi bi-calendar-event me-2"></i>
                                    Événements
                                </div>
                                <div class="card-body text-dark">
                                    @include('components.events.event-calendar', ['editable' => 'false', 'selectable' =>
                                    'false'])
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 card">
                                <div class="bg-transparent card-header d-flex justify-content-between"><span><i
                                            class="bi bi-megaphone me-2"></i> Annonces</span> {{ $notices->links() }}
                                </div>
                                <div class="p-0 card-body text-dark">
                                    <div>
                                        @isset($notices)
                                        <div class="accordion accordion-flush" id="noticeAccordion">
                                            @foreach ($notices as $notice)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading{{$notice->id}}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse{{$notice->id}}"
                                                        aria-expanded={{($loop->first)?"true":"false"}}
                                                        aria-controls="flush-collapse{{$notice->id}}">
                                                        Publié le : {{$notice->created_at}}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{$notice->id}}"
                                                    class="accordion-collapse collapse {{($loop->first)?" show":"
                                                    hide"}}" aria-labelledby="flush-heading{{$notice->id}}"
                                                    data-bs-parent="#noticeAccordion">
                                                    <div class="overflow-auto accordion-body">
                                                        {!!Purify::clean($notice->notice)!!}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                            @if(count($notices) < 1) <div class="p-3">Pas d'annonces
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
</div>
@endsection