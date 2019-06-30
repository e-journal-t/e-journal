@extends('layouts.app')

@section('content')
    <div class="list-group">
        <a href="{{url('home/rating')}}" class="list-group-item list-group-item-action">Оцінки</a>
        <a href="#" class="list-group-item list-group-item-action">Домашні завдання</a>
    </div>
@endsection