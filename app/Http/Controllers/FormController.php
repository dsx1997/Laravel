<?php  
namespace App\Http\Controllers;  
use Illuminate\Http\Request;  
use App\Form;  
class FormController extends Controller  
{  
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */  
    public function index()  
    {  
        //  
    }  
/** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */  
    public function create()  
    {  
        //  
    }  
  
    /** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response 
     */  
    public function store(Request $request)  
    {  
            $data = new Form;  
            if($files = $request->file('image')){  

                $name = $files->getClientOriginalName();  
                $files->move('images',$name);  
                $data->path = $name;  
            }  
            $data->save();  
    }  
 /** 
     * Display the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
    public function show($id)  
    {  
        //  
    }  
  
    /** 
     * Show the form for editing the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
    public function edit($id)  
    {  
        //  
   }  
  
    /** 
     * Update the specified resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
    public function update(Request $request, $id)  
    {  
        //  
    }  
  
    /** 
     * Remove the specified resource from storage. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
    public function destroy($id)  
    {  
        //  
    }  
}  