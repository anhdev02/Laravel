<?php
namespace App\Http\Controllers;

use App\Models\NhaGa;

class NhaGaController extends Controller
{
    public function LayNhaGa($id){
        $nhaGa = NhaGa::where('ma_tuyen', $id)->get();
        return response()->json([
            'nhaga' => $nhaGa,
        ]);
    }
}