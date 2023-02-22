<?php

namespace App\Http\Controllers;

use App\Models\Fake;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class FakeController extends Controller
{
    public function store(Request $request){


            $fake = new Fake;
            $fake->ga_len = $request->input('ga_len');
            $fake->ga_xuong = $request->input('ga_xuong');
            $fake->so_dien_thoai = $request->input('so_dien_thoai');
            $fake->thanh_tien = $request->input('thanh_tien');
            $fake->tuyen = $request->input('tuyen');

            $fake->save();
            return response()->json([
                'fake' => $fake,
                'status' => 200,
                'message' => 'Student Added Successfully',
            ]);

    }
}
