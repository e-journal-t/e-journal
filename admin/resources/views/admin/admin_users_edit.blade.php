@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12 ">
            <div class='col-12 form-group'>
                <div class='row'>
                    <div class="col-12 mb-5">
                        <a class="btn btn-outline-dark" href="{{ url('admin_index') }}">Повернутись назад</a>
                    </div>
                    <label class='col-12 col-lg-3' >Ім'я:</label>
                    <div class='col-12 col-md-9 '>
                        @foreach ($users_data as $user)
                            <input name="edit_user_name" id="edit_user_name" class='form-control' value="{{$user->name}}" type="text" >
                            <input name="user_edit_id" id="user_edit_id" class='form-control' value="{{$user->id}}" hidden >
                        @endforeach
                    </div>
                </div>
            </div>
            <div class='col-12 form-group'>
                <div class='row'>
                    <label class='col-12 col-lg-3' >Почта:</label>
                    <div class='col-12 col-md-9 '>
                        @foreach ($users_data as $user)
                            <input name="title" id="edit_user_email" class='form-control' value="{{$user->email}}" type="text" >
                        @endforeach
                    </div>
                </div>
            </div>
            <div class='col-12 form-group'>
                <div class='row'>
                    <label class='col-12 col-lg-3' >Тип:</label>
                    <div class='col-12 col-md-9 '>
                        <input name="title" id="edit_user_type" class='form-control' value="" {{$checked}} type="checkbox" >
                    </div>
                    <div class="col-12 text-center my-3">
                        <button class="btn btn-outline-dark" id="admin_button_edit" type="submit">Редагувати</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('js/admin.js')}}"></script>
@endpush