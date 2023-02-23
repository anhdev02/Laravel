@extends('layouts.layout')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
@endsection

@section('header')
    <header class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="logo.png" alt="Logo" width="80" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/booking') }}">Đặt vé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/check') }}">Tra cứu đặt vé</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="wrapper">
        <div class="container my-5">
            <div class="main border border-2 rounded">
                <div class="p-3">
                    <span class="title">tuyến số 1</span>
                    <div style="display: none" class="loader">
                        <div class="spinner"></div>
                    </div>
                    <div class="content">

                    </div>
                </div>
                <div class="info bg-light gap-2 py-3 border-top">
                    <span class="bg-secondary py-1 px-2 rounded-pill text-white route-time"></span>
                    <span class="bg-secondary py-1 px-2 rounded-pill text-white route-length"></span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            fetchroutes();

            function fetchroutes() {
                const route_id = localStorage.getItem('route') ?? 1;
                $('.loader').show();
                $.ajax({
                    type: "GET",
                    url: "/get-route/" + route_id,
                    success: function(response) {
                        $('.route-time').text(response.route.thoi_gian_hd);
                        $('.route-length').text(response.route.chieu_dai + 'km');
                    }
                });
                var tuyen = $('.title').text().substring(9);


                if (route_id == '3') {
                    $.ajax({
                        type: "GET",
                        url: "/get-station/" + route_id,
                        success: function(response) {
                            $('.content').html('');
                            $.each(response.nhaga, function(key, item) {
                                $('.content').append(
                                    '<input type="radio" name="place" id="' + item
                                    .thu_tu + '" checked />\
                                    <div class="process">\
                                        <label for="' + item.thu_tu + '" class="placeName">' + item.ten_nha_ga + '</label>\
                                        <label for="' + item.thu_tu + '" class="line short"><span class="tooltips">Tuyến <span>' +
                                    tuyen + '</span><span>' + item.thu_tu + '</span></span></label>\
                                    </div>\
                                     ');
                            });
                            $('.loader').hide();

                        }
                    });
                } else {
                    $.ajax({
                        type: "GET",
                        url: "/get-station/" + route_id,
                        success: function(response) {
                            $('.content').html('');
                            $.each(response.nhaga, function(key, item) {
                                $('.content').append(
                                    '<input type="radio" name="place" id="' + item
                                    .thu_tu + '" checked />\
                                    <div class="process">\
                                        <label for="' + item.thu_tu + '" class="placeName">' + item.ten_nha_ga + '</label>\
                                        <label for="' + item.thu_tu + '" class="line"><span class="tooltips">Tuyến <span>' +
                                    tuyen + '</span><span>' + item.thu_tu + '</span></span></label>\
                                    </div>\
                                     ');
                            });
                            $('.loader').hide();

                        }
                    });
                }

            }

           


        });
    </script>
@endsection
