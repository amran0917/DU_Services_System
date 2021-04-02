<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Director;
use Session;


class DirectorController extends Controller
{
     /*
            Director handling work
    */
    function create(){

        return view('admin.pages.directors.create'); 
    }
    
    function index(){
        
        $dir = Director::paginate(7);
        return view('admin.pages.directors.index',compact('dir'));
    }
    
    function store(Request $request){
        $validation= $request->validate([
            'dir_name' => 'required',
            'department' => 'required',
            
        ]);

        $dir = new Director();
        $dir->dir_name =  $request->dir_name;
        $dir->department =  $request->department;
        $dir->fac_name =  $request->fac_name;
        
        $dir->save();
        
        if($dir){
            return Redirect()->route('director.list')->with('success', 'Successfully saved!');;

        }

    }

    public function delete($id)
    {
        $dir = Director::findorfail($id);

        if(!is_null($dir)){
            $dir->delete();
           
            
                return Redirect()->route('director.list')->with('delete', 'Successfully deleted!');;
    
        }

      return Redirect()->route('director.list');
    }

    function edit($id){
        $dir = Director::find($id);
        return view('admin.pages.directors.edit',compact('dir'));
    }

    public  function update(Request $request,$id)
    {
        $validation= $request->validate([
            'dir_name' => 'required',
            'department' => 'required',
            
        ]);

        $dir = Director::find($request->id);
        $dir->dir_name =  $request->dir_name;
        $dir->department =  $request->department;
        $dir->fac_name =  $request->fac_name;  
        $dir->save();

        if($dir){
            return Redirect()->route('director.list')->with('message', 'Successfully updated!');;

        }
       

      
    }

    

    public function view($id){
        $dir = Director::find($id);
      
        return view('admin.pages.directors.view',compact('dir'));
    }

}
