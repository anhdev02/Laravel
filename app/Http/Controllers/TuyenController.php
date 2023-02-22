<?php
namespace App\Http\Controllers;

use App\Models\Tuyen;

class TuyenController extends Controller
{
    public function index(){
        return view('home');
    }

    public function fecthroute(){
        $routes = Tuyen::all();
        return response()->json([
            'routes'=>$routes,
        ]);
    }

    public function getRoute($id){
        $route = Tuyen::find($id);
        return response()->json([
            'route' => $route,
        ]);
    }
}