<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\search;

class FileController extends Controller
{
    public function index()
    {
        return view('treatment');
    }

    public function uploadfile(Request $request)
    {

        ini_set('max_execution_time', 300);

        $count = 0;
        $filepath = $request->file('file')->getRealPath();
        $file = fopen($filepath,"r");
        

        $headers = array(
            'Content-Type' => 'text/csv',
        );
        $filename = "export.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('id', 'firstname', 'lastname', 'new_firstname', 'new_lastname', 'name'));
    
        $record = array(); 
        while (($filedata = fgetcsv($file, 10000, ";")) !== FALSE) {
           $demo = explode(';', $filedata[0]);

           $firstname= '';
           $lastname= '';
           $gender= '';
           $count++;// add this line
            if($count>1){
                $fname = trim($demo[1], '"');
                $lname = trim($demo[2], '"');

                $firtname_record = DB::table('ref_firstnames')->where('label', $fname)->get();
                if(count($firtname_record) == 0){
                    $fetched_lastname_record = DB::table('ref_firstnames')->where('label', $lname)->get();
                    if(count($fetched_lastname_record) == 0){
                        $lastname = "";
                    }else{
                        $lastname = $fetched_lastname_record[0]->label;
                        $gender = $fetched_lastname_record[0]->gender == 1 ? 'Mr.' : 'Ms.' ;
                    }
                }else{
                    if(isset($firtname_record[0]->label)){
                        $firstname = $firtname_record[0]->label;
                        $gender =  $firtname_record[0]->gender == 1 ? 'Mr.' : 'Ms.' ;
                    }else{
                        $firstname = "";
                    }
                }
                
               $record = array(
                    'id' =>$demo[0] ,
                    'firstname' =>$fname,
                    'lastname' =>$lname,
                    'new_firstname' =>$firstname,
                    'new_lastname' => $lastname,
                    'name' =>  $gender.' '.$lastname.' '.$firstname,
                );
               
                //export csv
                fputcsv($handle, (array) $record);
            }
         }
         
         fclose($handle);


         return response()->download($filename, 'export.csv', $headers);

    }
}
