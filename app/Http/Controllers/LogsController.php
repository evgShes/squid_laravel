<?php

namespace App\Http\Controllers;

use App\Apache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LogsController extends Controller
{
    public function staticView()
    {
//        $query_str = "SELECT client_address, uss.employer_name,
//COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='404')) as 'not_found',
//COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='403')) as 'forbidden',
//COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='200')) as 'ok'
//FROM apaches as ap1 LEFT JOIN users_lists as uss on (ap1.client_address=uss.employer_ip)
//GROUP BY client_address, client_address, uss.employer_name";
//
//        $query = DB::select($query_str);

        /////////////
        $query = Apache::with('relUser')->select(DB::raw("
        ap1.client_address,
COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='404')) as 'not_found',
COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='403')) as 'forbidden',
COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='200')) as 'ok',
ROUND(SUM((SELECT size_send FROM apaches as ap2 WHERE ap1.id=ap2.id))/1024,2) as 'send'
"))
            ->from('apaches as ap1')
            ->groupBy('client_address')
            ->get();

        $data = [
            'records' => $query
        ];
//        dd($data);
        return view('logs.statistics', $data);
    }
}
