<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\okrExport;
use App\OKR;
use Carbon\Carbon;
use DB;
use Excel;  

class ExportExcelController extends Controller
{
    public static function orWhereDate($column, $operator, $value)
    {
        return \Illuminate\Database\Query\Builder::orWhereDate($column, $operator, $value);
    }

    public function export()
    {
        return new okrExport();

    }

    function index(){
        $okr = OKR::whereDate('created_at', Carbon::today())
                   ->orWhereDate('updated_at', Carbon::today())->get();
        $okr_user = OKR::whereDate('created_at', Carbon::today())
                   ->orWhereDate('updated_at', Carbon::today())
                   ->get();           
        return view('now', compact('okr', 'okr_user'));

    }

}