<?php

namespace App\Http\Controllers;

use App\Apache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LogsController extends Controller
{
    public function staticView()
    {
        if (Apache::count() > 0) {
//            dd(Apache::all());
            $query = Apache::with('relUser')->select(DB::raw("
        ap1.client_address,
COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='404')) as 'not_found',
COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='403')) as 'forbidden',
COUNT((SELECT status FROM apaches as ap2 WHERE ap1.id=ap2.id AND `status`='200')) as 'ok',
SUM((SELECT size_send FROM apaches as ap2 WHERE ap1.id=ap2.id)) as 'send'
"))
                ->from('apaches as ap1')
                ->groupBy('client_address')
//            dd($query->toSql());
                ->get();

        } else {
            $query = null;
        }

        $data = [
            'records' => $query
        ];
        return view('logs.statistics', $data);
    }
}
