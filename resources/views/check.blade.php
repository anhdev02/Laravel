@extends('layouts.layout')

@section('title')
    <title>Trang tra cứu đặt vé</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tracuudatve.css') }}" />
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
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/booking') }}">Đặt vé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/check') }}">Tra cứu đặt vé</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container my-5">
        <div class="form-inline mb-3 search-box">
            <form id="searchForm">
                <input type="text" id="phone" name="phone" class="form-control form-control-sm mr-2"
                    placeholder="Số điện thoại" /><br>
                <button style="outline: none" class="btn btn-sm" type="submit">
                    <img width="20" height="20" src="./assets/imgs/search-solid.svg" alt="" />
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Thời gian đặt</th>
                        <th>Tuyến</th>
                        <th>Ga lên</th>
                        <th>Ga xuống</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="tbody_bookings">

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            fetchbooking();

            function formattime(time) {
                var datetime = time;
                var date = new Date(datetime);
                var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
                var am_pm = date.getHours() >= 12 ? "PM" : "AM";
                var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                var formatted_date = hours + ":" + minutes + " " + am_pm + " " + date.getDate() + "/" + (date
                    .getMonth() + 1) + "/" + date.getFullYear();
                return formatted_date;
            }

            function fetchbooking() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-booking",
                    dataType: "json",
                    success: function(response) {
                        $('.tbody_bookings').html('');
                        var dateTimeString;
                        var formattedString;
                        $.each(response.bookings, function(key, item) {
                            $('.tbody_bookings').append('<tr>\
                                                    <td>' + item.id + '</td>\
                                                    <td>' + formattime(item.thoi_gian_dat) + '</td>\
                                                    <td>' + item.tuyen + '</td>\
                                                    <td>' + item.ga_len + '</td>\
                                                    <td>' + item.ga_xuong + '</td>\
                                                    <td>' + item.thanh_tien.toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }) + '</td>\
                                                </tr>');
                        });
                    }
                });
            }
            $.validator.addMethod("phoneVN", function(value, element) {
                return /^(0\d{9,10}|\+?(84)?\d{10})$/.test(value);
            });

            $('#searchForm').validate({
                rules: {
                    phone: {
                        required: true,
                        phoneVN: true
                    }
                },
                messages: {
                    phone: {
                        required: "Bạn phải nhập số điện thoại !",
                        phoneVN: "Số điện thoại không hợp lệ !"
                    }
                },
                submitHandler: function(form) {
                    event.preventDefault();
                    var sdt = $('#phone').val();
                    $.ajax({
                        type: "GET",
                        url: "/get-bookings/" + sdt,
                        success: function(response) {
                            $('.tbody_bookings').html('');

                            $.each(response.bookings, function(key, item) {
                                $('.tbody_bookings').append('<tr>\
                                                    <td>' + item.id + '</td>\
                                                    <td>' + formattime(item.thoi_gian_dat) + '</td>\
                                                    <td>' + item.tuyen + '</td>\
                                                    <td>' + item.ga_len + '</td>\
                                                    <td>' + item.ga_xuong + '</td>\
                                                    <td>' + item.thanh_tien.toLocaleString('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                }) + '</td>\
                                                </tr>');
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection
