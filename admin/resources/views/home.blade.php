@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('home/rating')}}">Оцінки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Домашні завдання</a>
            </li>
        </ul>
    </nav>

    <div class="row">
        <div class="col-12 col-md-8">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


        </div>
    </div>
@endsection
