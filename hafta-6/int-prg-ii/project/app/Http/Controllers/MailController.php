<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        Mail::to('oguz.turan0@ogr.dpu.edu.tr' , 'Oğuz Emre Turan')
            ->send(new OrderShipped( 'Oğuz', 'Turan', rand(10000, 99999)));

        echo "Order Shipped Maili Gönderildi";
    }
}
