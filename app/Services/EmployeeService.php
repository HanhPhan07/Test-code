<?php

namespace App\Services;
use App\Repositories\EmployeeRepository;

class EmployeeService {
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getListEmployee(){
        return $this->employeeRepository->getListEmployee();
    }

    public function show_search_result(int $date_from,int  $date_to,string $email=null){
        return $this->employeeRepository->search($date_from, $date_to, $email);
    }
}
