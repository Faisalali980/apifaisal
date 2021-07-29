<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Advertisement;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;


class AdvController extends Controller
{
    public function advget()
    {
        $data =  Advertisement::all();
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
        return response()->json($responseArray,200);
    }


    public function advpost(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required|max:40',
            'adtype'=>'required',
            'title'=>'required|max:40',
            'description'=>'required|max:400',
            'audience'=>'required',
            'agemin'=>'required|integer|between:12,120',
            'agemax'=>'required|integer|between:12,120',
            'country'=>'required',
            'city'=>'required',
            

        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        {
            
        
        }
        // $file = $request->file('video');
        // // generate path to save file
        // $pathToSave = 'user_uploads/'  . $storage_key . '/videos';
        // // save file to storage
        // $file->storeAs($pathToSave, $filename, ['disk' => 'uploads']);
        
        // // save file path db
        // $toSaveDB = 'uploads/user_uploads/' . $storage_key . '/videos/' . $filename;
       
        





        $input = $request->all();
        

        $user = Advertisement::create($input);
        
        return response('successfully entered', 200);
       
    }




    public function upload(Request $req)
    {
    //     $file = $request->file('video')->store('apidocs');
    //     $name = $request->file('video')->getClientOriginalName();
    //     $path = video::create($name);
    //      return ["result"=>$file];
    $fileModel = new Video;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return response('successfully entered', 200);
      





}

    }

}
