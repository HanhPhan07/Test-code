<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService=$employeeService;
    }

    public function index()
    {
        $data['employee']=$this->employeeService->getListEmployee();
        // dd($data);
        return view('welcome', $data);
    }

    public function show_search(Request $request){
        $list=$this->employeeService->show_search_result($request->date_from, $request->date_to, $request->email);
        $list['count']=$this->employeeService->show_search_result($request->date_from, $request->date_to, $request->email)->count();
        return json_encode($list);
    }

}
