@extends('layouts.app')

@section('content')

    <div class=" p-5">
        <div class="mb-5">
            <div class="list-group col-12 col-lg-3">
                <a href="{{url('home/rating')}}" class="list-group-item list-group-item-action">Оцінки</a>
                <a href="#" class="list-group-item list-group-item-action">Домашні завдання</a>
            </div>
        </div>
        <div class="border p-4">
            <div class='col-12 form-group '>
                <div class='row'>

                    <label class='col-12 col-lg-2' >Ім'я:</label>
                    <div class='col-12 col-md-6 '>
                        <input name="user_name" id="user_name" class='form-control' type="text" >
                    </div>
                </div>
            </div>
            <div class='col-12 form-group'>
                <div class='row'>
                    <label class='col-12 col-lg-2' >Почта:</label>
                    <div class='col-12 col-md-6 '>
                        <input name="user_email" id="user_email" class='form-control' type="text" >
                    </div>
                </div>
            </div>
            <div class="form-group col-12">
                <div class="row">
                    <label for="password" class="col-lg-2 col-form-label ">Пароль:</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <div class="form-group col-12">
                <div class="row">
                    <label for="password-confirm" class="col-lg-2 col-form-label ">Підтвердження пароля:</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="mt-4">
                            <button type="button" onclick="saveChanges()" class="btn btn-outline-dark">Зберегти зміни</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('js/settings.js')}}"></script>
@endpush