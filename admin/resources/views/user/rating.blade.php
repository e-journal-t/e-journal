@extends('layouts.app')



@section('list')

    <nav class="navbar navbar-expand-sm bg-light shadow navbar-light pl-5">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('home/rating')}}">Журнал оцінок</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Домашні завдання</a>
            </li>
        </ul>
    </nav>

@endsection
@section('content')
    <div class="col-12 col-md-5 pl-5 p-3 jumbotron">
        <div class="row">
            <div class="col-12">
                <div class="form-group col-md-12">
                    <div class="row">
                        <label class="col-12 col-md-3">Учні:</label>
                        <div class="col-7 col-md-5">
                            <select name="sboys_select" id="sboys_select" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="row">
                    <label class="col-12 col-md-3">Період:</label>
                        <div class="col-7 col-md-5">
                            <select name="rating_period" id="rating_period" class="form-control">
                                <option value="9">Вересень</option>
                                <option value="10">Жовтень</option>
                                <option value="11">Листопад</option>
                                <option value="12">Грудень</option>
                                <option value="1">Січень</option>
                                <option value="2">Лютий</option>
                                <option value="3">Березень</option>
                                <option value="4">Квітень</option>
                                <option value="5">Травень</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <form action="" id="search_form">
                        <div class="row">
                            <label class="col-12 col-md-3">Рік:</label>
                            <div class="col-7 col-md-5">
                                <input type="text" class="form-control" id="rating_year">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" id="search_btn" class="btn btn-primary">Зобразити</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="journal" class="d-none">

            {{--<div class="col-2 pr-0">--}}
                {{--<div class="table-responsive">--}}
                    {{--<table class="table table-bordered table-striped table-sm" width="100%">--}}
                        {{--<thead>--}}
                            {{--<th>Предмети</th>--}}
                        {{--</thead>--}}
                        {{--<tbody id="subjects_table">--}}

                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" width="100%">
                    <thead id="days_table">

                    </thead>
                    <tbody id="rating_table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/rating.js')}}"></script>

@endpush