@extends('layouts.layout')

@section('title')
    <title>Trang đặt vé</title>
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
                        <a class="nav-link active" href="{{ url('/booking') }}">Đặt vé</a>
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
    <div class="container">
        <form id="bookingForm">
            <div class="row justify-content-center my-5 mx-3">
                <div id="success_message"></div>
                <div class="col-md-6">
                    <div class="form-group my-2">
                        <label for="tuyen">Tuyến:</label>
                        <select class="form-control" id="tuyen" name="tuyen">

                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="ga_len">Ga lên:</label>
                        <select class="form-control" id="ga_len" name="ga_len">

                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="so_luong_dat">Số lượng đặt:</label>
                        <input min="1" max="100" value="1" name="so_luong_dat" type="number"
                            class="form-control" id="so_luong_dat" />
                    </div>
                    <div class="form-group my-2">
                        <label for="thanh_tien">Thành tiền:</label><br />
                        <span id="thanh_tien" data-thanh_tien="12000"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group my-2">
                        <label style="margin-top: 15px">Còn trống:</label><br />
                        <span id="con-trong"></span>
                    </div>
                    <div class="form-group my-2">
                        <label for="ga_xuong">Ga xuống:</label>
                        <select class="form-control" name="ga_xuong" id="ga_xuong">

                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Điện thoại:</label>
                        <input type="tel" class="form-control" name="phone" id="phone" />
                    </div>
                    <br />
                    <button type="submit" class="dat_ve btn btn-primary">Đặt vé</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

            fetchbooking();

            function fetchbooking() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-routes",
                    dataType: "json",
                    success: function(response) {
                        $('#tuyen').html('');
                        $('#con-trong').text('100 ghế');
                        $.each(response.routes, function(key, item) {
                            if (item.id == 1) {
                                $('#tuyen').append('<option data-gia_ve_toi_thieu = "' + item
                                    .gia_ve_toi_thieu + '" data-don_gia_ga = "' + item
                                    .don_gia_ga + '" data-tong_so_ga = "' + item
                                    .tong_so_ga + '" selected value="' + item.id + '">' +
                                    item.ten_tuyen + '</option>');
                                $('#thanh_tien').text(item.gia_ve_toi_thieu.toLocaleString(
                                    'vi-VN', {
                                        style: 'currency',
                                        currency: 'VND'
                                    }));
                            } else {
                                $('#tuyen').append('<option data-gia_ve_toi_thieu = "' + item
                                    .gia_ve_toi_thieu + '" data-don_gia_ga = "' + item
                                    .don_gia_ga + '" data-tong_so_ga = "' + item
                                    .tong_so_ga + '" value="' + item.id + '">' + item
                                    .ten_tuyen + '</option>');
                            }
                        });
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "/get-station/" + 1,
                    success: function(response) {
                        $.each(response.nhaga, function(key, item) {
                            $('#ga_len').append('<option value="' + item.thu_tu + '">' + item
                                .ten_nha_ga + '</option>');
                            $('#ga_xuong').append('<option value="' + item.thu_tu + '">' + item
                                .ten_nha_ga + '</option>');
                        });
                    }
                });

            }

            $('#tuyen').change(function(e) {
                e.preventDefault();
                var tuyen_id = $(this).val();
                var tuyen_giaVeToiThieu = $('#tuyen option:selected').data('gia_ve_toi_thieu');
                $('#thanh_tien').text(tuyen_giaVeToiThieu.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $('#ga_len').text('');
                $('#ga_xuong').text('');
                $('#con-trong').text('');
                if (tuyen_id == '1') {
                    $('#con-trong').text('100 ghế');
                } else if (tuyen_id == '2') {
                    $('#con-trong').text('50 ghế');
                } else {
                    $('#con-trong').text('25 ghế');
                }
                $.ajax({
                    type: "GET",
                    url: "/get-station/" + tuyen_id,
                    success: function(response) {
                        $.each(response.nhaga, function(key, item) {
                            $('#ga_len').append('<option value="' + item.thu_tu + '">' +
                                item
                                .ten_nha_ga + '</option>');
                            $('#ga_xuong').append('<option value="' + item.thu_tu +
                                '">' + item
                                .ten_nha_ga + '</option>');
                        });
                    }
                });
            });

            $('#ga_len, #ga_xuong, #so_luong_dat').change(function(e) {
                e.preventDefault();
                var tongTien = 0;
                var giaVeToiThieu = $('#tuyen option:selected').data('gia_ve_toi_thieu');
                var donGiaGa = $('#tuyen option:selected').data('don_gia_ga');
                var tongSoGa = $('#tuyen option:selected').data('tong_so_ga');
                var thamSo = Math.round(tongSoGa / 2);
                var soVeDat = $('#so_luong_dat').val();
                var stt_gaLen = $('#ga_len option:selected').val(),
                    stt_gaXuong = $('#ga_xuong option:selected').val();
                if ((Math.abs(stt_gaLen - stt_gaXuong) + 1) <= thamSo) {
                    tongTien = giaVeToiThieu * soVeDat;
                } else {
                    tongTien = (giaVeToiThieu + ((Math.abs(stt_gaLen - stt_gaXuong) + 1) - thamSo) *
                        donGiaGa) * soVeDat;
                }
                $('#thanh_tien').attr('data-thanh_tien', tongTien);
                $('#thanh_tien').text(tongTien.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
            });

            $.validator.addMethod("phoneVN", function(value, element) {
                return /^(0\d{9,10}|\+?(84)?\d{10})$/.test(value);
            });



            $("#bookingForm").validate({
                rules: {
                    ga_len: "required",
                    ga_xuong: "required",
                    so_luong_dat: {
                        required: true,
                        min: 1,
                        max: 100
                    },
                    phone: {
                        required: true,
                        phoneVN: true,
                    },
                },
                messages: {
                    ga_len: "Bạn phải chọn ga lên !",
                    ga_xuong: "Bạn phải chọn ga xuống !",
                    so_luong_dat: {
                        required: "Bạn phải nhập số lượng vé !",
                        min: "Số lượng vé phải lớn hơn hoặc bằng 1 !",
                        max: "Số lượng vé phải nhỏ hơn hoặc bằng 100 !"
                    },
                    phone: {
                        required: "Bạn phải nhập số điện thoại !",
                        phoneVN: "Số điện thoại không hợp lệ !"
                    },
                },
                submitHandler: function(form) {
                    event.preventDefault();
                    // var current_time = new Date();
                    var data = {
                        'tuyen': $('#tuyen option:selected').text(),
                        'ga_len': $('#ga_len option:selected').text(),
                        'ga_xuong': $('#ga_xuong option:selected').text(),
                        'so_dien_thoai': $('#phone').val(),
                        'thanh_tien': parseInt($('#thanh_tien').data('thanh_tien')),
                        // 'thoi_gian_dat': current_time,
                    }



                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/booking",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').css('color', 'green');
                            $('#success_message').text(response.message);
                            // loadbang();
                        }
                    });


                }
            });
        });
    </script>
@endsection
