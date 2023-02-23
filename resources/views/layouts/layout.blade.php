<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/HeaderandFooter.css') }}">
    @yield('css')

</head>

<body>

    @yield('header')

    @yield('content')

    @include('layouts.footer')
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    @yield('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "/fetch-routes",
                dataType: "json",
                success: function(response) {
                    $('.tbody_routes').html('');
                    $.each(response.routes, function(key, item) {
                        $('.tbody_routes').append('<tr>\
                                          <td data-id=' + item.id + ' class="tentuyen">' + item.ten_tuyen + '</td>\
                                          <td>' + item.thoi_gian_hd + '</td>\
                                          <td>' + item.chieu_dai + 'km</td>\
                                          <td>' + item.gia_ve_toi_thieu.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }) + '</td>\
                                          <td>' + item.don_gia_ga.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }) + '</td>\
                                        </tr>');
                    });
                }
            });


            $(document).on('click', '.tentuyen', function(e) {
                e.preventDefault();
                $('.loader').show();
                $('.title').text($(this).html());
                localStorage.setItem('route', $(this).data('id'))
                var route_id = $(this).data('id')
                console.log(route_id)
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

            });

        });
    </script>
</body>

</html>
