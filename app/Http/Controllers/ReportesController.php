<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportesController extends Controller
{
	public function __construct(){
        $this->middleware('admin');
    }
    
    public function index(){

    	return view('reportes.Index');
    }
}
