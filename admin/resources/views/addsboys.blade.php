@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Додати учня до користувача</div>
                <div class="card-body">

                    <div class="form-group col-12">
                        <div class="row">
                            <label class="col-form-label">Номер шкільного квитка:</label>
                            <div class="col-12">
                                <div class="row">
                                    <input type="text" name="sboy_ticket" id="sboy_ticket" class="form-control col-12 col-sm-6" required="">
                                    <div class="form-group col-12 col-sm-3">
                                        <button class="btn btn-outline-dark btn-submit">Додати</button>
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
    <script src="{{asset('js/test.js')}}"></script>
@endpush