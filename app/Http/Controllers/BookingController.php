<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    public function fetchbooking(){
        $bookings = Booking::all();
        return response()->json([
            'bookings'=>$bookings,
        ]);
    }

    public function getbooking($sdt){
        $bookings = Booking::where('so_dien_thoai', $sdt)->get();
        return response()->json([
            'bookings' => $bookings,
        ]);
    }

    public function store(Request $request)
    {

        $booking = new Booking;
        $booking->tuyen = $request->input('tuyen');
        $booking->ga_len = $request->input('ga_len');
        $booking->ga_xuong = $request->input('ga_xuong');
        $booking->so_dien_thoai = $request->input('so_dien_thoai');
        $booking->thanh_tien = floatval($request->input('thanh_tien'));
        // $booking->thoi_gian_dat = $request->input('thoi_gian_dat');
        // $booking->save();
        return response()->json([
            'booking' => $booking,
            'status' => 200,
            'message' => 'Đặt vé thành công !',
        ]);
    }
}
