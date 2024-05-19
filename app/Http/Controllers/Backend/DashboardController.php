<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\Fonnte;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Fonnte;
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function send(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'phone' => 'required',
            'pesan' => 'required',
        ]);

        Message::create($data);
        

        $this->send_message($data->phone,$messages);
    }
}
