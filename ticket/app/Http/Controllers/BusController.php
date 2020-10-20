<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function all()
    {
        $status = "success";
        $bus = Bus::get();
        return response()->json(compact('status', 'bus'), 200);
    }
    public function detail()
    {
        if ($id = request()->get('id')) {
            if ($bus = Bus::where('id', $id)->first()) {
                $status = 'success';
                return response()->json(compact('bus', 'status'), 200);
            }
            return response()->json(['status' => 'fail'], 400);
        } else {
            return response()->json(['status' => 'fail'], 400);
        }
    }
}
