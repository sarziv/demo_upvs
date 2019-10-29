@if(Auth::user()->type == "admin")
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Admin</div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0 text-center">
                                        <button class="btn btn-outline-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Registracija
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                       @include('layouts.admin.adminPanel.adminRegister')
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0 text-center">
                                        <button class="btn btn-outline-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                           Priskyrimas
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @include('layouts.admin.adminPanel.adminAssign')
                                 </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0 text-center">
                                        <button class="btn btn-outline-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Vykdymas
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @include('layouts.admin.adminPanel.adminProgress')
                                   </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFifth">
                                    <h2 class="mb-0 text-center">
                                        <button class="btn btn-outline-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                                            Bonus: Užsakymų pakeitimas
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFifth" class="collapse" aria-labelledby="headingFifth" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @include('layouts.admin.adminPanel.adminChange')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@else
    @include('layouts.unauthorized')
@endif
