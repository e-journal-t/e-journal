@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12 ">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" width="100%" id="users_table">
                    <thead>
                        <th>ІД</th>
                        <th>Ім'я</th>
                        <th>Почта</th>
                        <th>Тип</th>
                        <th>Дія</th>
                    </thead>
                    @foreach ($users as $user)
                        <tr>
                                <td> {{ $user->id }}</td>
                                <td> {{ $user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <td> {{ $user->type }}</td>
                                <td class="text-center"><a href="admin_index/admin_users_edit/{{$user->id}}" class="btn btn-outline-dark">Редагувати</a></td>
                        </tr>
                    @endforeach
                    <tfoot>
                        <th>ІД</th>
                        <th>Ім'я</th>
                        <th>Почта</th>
                        <th>Тип</th>
                        <th>Дія</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection