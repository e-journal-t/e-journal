@extends('layouts.app')

@section('content')
        <div class="col-12 px-5">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="true">Користувачі</a>
                    <a class="nav-item nav-link" id="nav-new-users-tab" data-toggle="tab" href="#nav-new-users" role="tab" aria-controls="nav-new-users" aria-selected="false">Додати користувача</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm" width="100%" id="users_table">
                                    <thead>
                                        <th>ІД</th>
                                        <th>Ім'я</th>
                                        <th>Пошта</th>
                                        <th>Тип</th>
                                        <th>Номер квитка</th>
                                        <th>Дія</th>
                                    </thead>
                                    <tbody>
                                        {!! $table_data  !!}
                                    </tbody>
                                    <tfoot>
                                        <th>ІД</th>
                                        <th>Ім'я</th>
                                        <th>Пошта</th>
                                        <th>Тип</th>
                                        <th>Номер квитка</th>
                                        <th>Дія</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-new-users" role="tabpanel" aria-labelledby="nav-new-users-tab">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                        <div class="form-group col-12">
                                            <div class="row">
                                                <label for="name" class="col-md-4 col-form-label ">Ім'я:</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <label for="email" class="col-md-4 col-form-label ">E-Mail:</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <label for="password" class="col-md-4 col-form-label ">Пароль:</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <div class="row">
                                                <label for="password-confirm" class="col-md-4 col-form-label ">Підтвердження пароля:</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-12 form-group'>
                                            <div class='row'>
                                                <label class='col-12 col-lg-4' >Права адміністратора:</label>
                                                <div class='col-12 col-md-6 '>
                                                    <input name="title" id="edit_user_type" class='form-control mb-5 ' type="checkbox" >
                                                    <div class="col-md-12 text-center">
                                                        <button type="button" onclick="addUser()" class="btn btn-primary">
                                                            Зареєструвати
                                                        </button>
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
        </div>
@endsection
@push('scripts')
    <script src="{{asset('js/admin.js')}}"></script>
@endpush