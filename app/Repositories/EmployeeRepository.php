<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use CarbonCarbon;
use App\Models\tblMStaff;
use App\Models\tblMStaff2;
use Carbon\Carbon;

class EmployeeRepository  extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\tblMStaff::class;
    }

    //home
    public function getListEmployee(){
        return TblMStaff::whereNull('QuitJobDate')
                        ->join('tblMStaff2', 'tblMStaff2.StaffID', '=', 'tblMStaff.StaffID')
                        ->get();
    }

    public function search($date_from, $date_to, $email){
        $time=\Carbon\Carbon::now()->format('Y-m-d');
        $tblMStaffNoMail = TblMStaff::whereNull('QuitJobDate')
                        ->join('tblMStaff2', 'tblMStaff2.StaffID', '=', 'tblMStaff.StaffID')
                        ->get()
                        ->toArray();
        //dd((strtotime($time) - strtotime('2019-01-01'))/ (60 * 60 * 24));//221
        $array_id=[];
        $array_test= $tblMStaffNoMail;
        foreach ($array_test as $item){
            $timeMedium= (strtotime($time) - strtotime($item['TrialEntryDate']))/(60 * 60 * 24);
            if($date_from <= $timeMedium && $timeMedium <= $date_to){
                $array_id[]=$item['StaffID'];
            }
        }
        $tblMStaffNoMail=TblMStaff::whereNull('QuitJobDate')
                                    ->join('tblMStaff2', 'tblMStaff2.StaffID', '=', 'tblMStaff.StaffID')
                                    ->whereIn('tblMStaff.StaffID',$array_id)
                                    ->get();
        if($email != null){
            return TblMStaff::whereNull('QuitJobDate')
                            ->join('tblMStaff2', 'tblMStaff2.StaffID', '=', 'tblMStaff.StaffID')
                            ->whereIn('tblMStaff.StaffID',$array_id)
                            ->whereEmail($email)
                            ->get();
        }
        foreach($tblMStaffNoMail as $item){
            $timestamp=(strtotime($item['TrialEntryDate']) - strtotime('1970-1-1'));
            $weekday= getdate($timestamp);
            switch($weekday['weekday']){
                case('Monday'): $item['QuitJobDate']='月';
                                break;
                case('Tuesday'): $item['QuitJobDate']='火';
                                break;
                case('Wednesday'): $item['QuitJobDate']='水';
                                break;
                case('Thursday'): $item['QuitJobDate']='木';
                                break;
                case('Friday'): $item['QuitJobDate']='金';
                                break;
                case('Saturday'): $item['QuitJobDate']='土';
                                break;
                default: $item['QuitJobDate']='日';
                            break;
            }
        }
        return $tblMStaffNoMail;
    }

}
