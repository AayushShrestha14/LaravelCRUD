<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class appController extends Controller
{
    protected $data=[];
    function __contruct(){
        $this->data['title']="College MS";
    }

    function index() {
        $this->data['title']="Home";
        //$studentData=Student::orderBy('id','desc')->get();
        $studentData=Student::orderBy('id','desc')->paginate(8);
        return view('welcome', compact('studentData'), $this->data);
    }

    function home() {
        $this->data['data']='MSCIT';
        $this->data['title']="Home";
        return view('home', $this->data, $this->data);
    }

    function contact() {
        $this->data['data']='MSCIT';
        $this->data['title']="Contact";
        return view('contact', $this->data, $this->data);
    }

    function welcome() {
        $this->data['title']="Home";
        return view('welcome', $this->data);
    }

    function program() {
        $this->data['data']='MSCIT';
        $this->data['title']="Program";
        return view('program',$this->data, $this->data);
    }

    function about() {
        $this->data['title']="About";
        return view('about', $this->data);
    }

    function addUser(Request $request) {
        if ($request->isMethod('get')){
            return redirect()->back();  
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required|min:3',
                'email'=>'email',
                'password'=>'required|confirmed|min:6',
                'image'=>'mimes:jpeg,jpg,png,gig'
            ]);
        }
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=bcrypt($request->password); //use encryption
        //dd($data);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->getClientOriginalExtension();
            $imageName=Str::random(10).'.'.$ext;
            $uploadPath=public_path('lib/images/');
            $image->move($uploadPath,$imageName);
            $data['image']=$imageName;
        }
        
        if(Student::create($data)){
            return redirect()->route('homepage')->with('success', 'Record is
inserted!');
        }

    }

    public function deleteUser(Request $request){
        $id=$request->user_id;
        if($this->deleteImage($id) && Student::findOrFail($id)->delete()){
            return redirect()->route('homepage')->with('success', 'Record is
Deleted!');
        }
        
    }

    public function deleteImage($id){
        $userData=Student::findOrFail($id);
        $imageName=$userData->image;
        $deletePath=public_path('lib/images/'.$imageName);
        if(file_exists($deletePath)){
            return unlink($deletePath);
        }
        return true;
    }

    public function editUser(Request $request){
        $this->data['title']='Edit Student';
        $id=$request->user_id;
        $editRecord=Student::findOrFail();
        if($this->deleteImage($id) && Student::findOrFail($id)->delete()){
            return redirect()->route('homepage')->with('success', 'Record is
Deleted!');
        }
        
    }
}
