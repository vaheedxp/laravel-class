<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StudentModel;

use Session;

use DB;

use Mail;

class StudentController extends Controller
{
    public $student;

    
    public function __construct(){
        $this->student = new StudentModel;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data['students'] = $this->student->fetchAll();
        $data['title']="Students";
        return view("pages.all")->withData($data);
        

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            
            DB::beginTransaction();
                // Fetch form data
                $name = $request->name;
                $lastname = $request->lastname;
                $phone = $request->phone;
                // Create
                $sdata['name']= $name;
                $sdata['lastname']= $lastname;
                $sdata['phone']= $phone;
                $std = new StudentModel;
                $std->saveStudent($sdata);
            DB::commit();
            $this->createMessage('success','The record was added successfully');
        }catch(\Exception $e){
            DB::rollBack();
            $this->createMessage('warning','The record was not added successfully, try again please');
        }
        return redirect("/");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data['student'] = $this->student->fetchStudentInfo($id);
        return view("pages/detail")->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $std = new StudentModel;
        $student = $std->fetchStudentInfo($id);
        sleep(3);
        return view("pages.partials.update")->with('sdt', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         
        try{
            DB::beginTransaction();
                 // Fetch form data
                $name = $request->name;
                $lastname = $request->lastname;
                $phone = $request->phone;
                $id = $request->id;

                 // Create
                $sdata['name']= $name;
                $sdata['lastname']= $lastname;
                $sdata['phone']= $phone;
                $this->student->updateStudent($sdata, $id);
            DB::commit();
            $this->createMessage('success','The record was editited successfully');
        }catch(\Exception $e){
            DB::rollBack();
            $this->createMessage('success', 'The recrod was not edited successfully, try again');
        }

         return redirect()->route('displayall'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          try{
                DB::beginTransaction();
                     $this->student->deleteStudent($id);
                DB::commit();
                $this->createMessage('success','The reecord was deleted successfully');
          }catch(\Exception $e){
                DB::rollBack();
                $this->createMessage('success','The record was not deleted successfully, try again');
          }
         
          return redirect()->route('displayall');
    }


    private function createMessage($type, $message){
            
            $message = '<div class="alert alert-'.$type.'">
                        '.$message.'
                    </div>';
            Session::flash('alertmessage',$message);
    } //createMessage


    public function sendemail(){
            return view("pages/email");
    }

    public function send(Request $request){
            $to = $request->email;
            $subject = $request->subject;
            $message = $request->message;

            $data['to'] = $to;
            $data['subject']= $subject;
            $data['msg']= $message;
   
            Mail::send("pages.partials.mail",$data,function($message) use ($data){
                $message->to($data['to'] ,'')->subject($data['subject']);
                $message->bcc('vaheed1988@gmail.com')->subject($data['subject']);
                $message->cc('javadaziz8@gmail.com')->subject($data['subject']);
                $message->replyTo('ghaforsabury@gmail.com')->subject($data['subject']);
                $message->embed('path/to/attachment.jpg');
                $message->attach('path/to/attachment.jpg');
                $message->from("ghaforsabury@gmail.com","Laravel Class Team");
            });
            

    }

   
}
