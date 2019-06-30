@extends('layouts.app')

@section('content')
    <div class=" p-5">
        <div class="mb-5">
            <a class="btn btn-outline-dark" href="{{ url('admin_index') }}">Повернутись назад</a>
        </div>
        <div class="border p-4">
            <div class='col-12 form-group '>
                <div class='row'>

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
                    <label class='col-12 col-lg-3' >Номер шкільного квитка:</label>
                    <div class='col-12 col-md-9 '>
                        <div class="row">
                            <div class='col-9 col-sm-9 '>
                                <input name="sboy_ticket" id="sboy_ticket" class='form-control ' value="" type="text" >
                            </div>
                            <div class="col-3 col-sm-3 mt-sm-0 mt-2 text-right">
                                <button class="btn btn-primary " type="button" id="add_sboy_btn">Додати</button>
                            </div>
                            <div class="col-9 mb-4 mt-2">
                                <table class="table table-sm" width="100%">
                                    <tbody id="sboys_table">
                                    {!! $sboys_list !!}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class='col-12 form-group'>
                <div class='row'>
                    <label class='col-12 col-lg-3' >Права адміністратора:</label>
                    <div class='col-12 col-md-9 '>
                        <input name="title" id="edit_user_type" class='form-control mb-5 ' value="" {{$checked}} type="checkbox" >
                        <div class="col-12 text-center my-4">
                            <button class="btn btn-outline-dark shadow" id="admin_button_edit" type="submit">Редагувати</button>
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