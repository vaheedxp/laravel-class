<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class StudentModel extends Model
{
    


    public function fetchAll(){
    		return DB::table("student")->get();
    }//fetchAll

    // Save student
    public function saveStudent($sdata){
    	DB::table("student")->insert($sdata);
    }

    public function fetchStudentInfo($id){
    	return DB::table("student")->where("id", $id)->get()[0];
    }

    public function updateStudent($data, $id){
            DB::table("student")->where('id', $id)->update($data);
    }


    public function deleteStudent($id){
            DB::table("student")->where('id', $id)->delete();
    }
}
