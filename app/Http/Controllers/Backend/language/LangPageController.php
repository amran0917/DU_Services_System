<?php

namespace App\Http\Controllers\Backend\language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Session;
class LangPageController extends Controller
{
    function create(){

        return view('admin.pages.languages.create'); 
    }

    function index(){
        
        $lang = Language::paginate(8);
        return view('admin.pages.languages.index',compact('lang'));
    }

    function store(Request $request){
        $validation= $request->validate([
            'language_name' => 'required',
            
        ]);

        $language = new Language();
        $language->language_name =  $request->language_name;
        $language->department =  $request->department;
        $language->fac_name =  $request->fac_name;
        
        $language->save();
        
        if($language){
            return Redirect()->route('language.list')->with('success', 'Successfully saved!');;

        }

    }

    function edit($id){
        $lang = Language::find ($id);

        return view('admin.pages.languages.edit',compact('lang'));
    }
    public  function update(Request $request,$id)
    {
        $validation= $request->validate([
            'language_name' => 'required',
            
        ]);

        $language = Language::find($request->id);
        $language->language_name =  $request->language_name;
        $language->department =  $request->department;
        $language->fac_name =  $request->fac_name;
        
        $language->save();
        

        if($language){
            return Redirect()->route('language.list')->with('message', 'Successfully updated!');;

        }
    }


    public function delete($id)
    {
        $lang = Language::findorfail($id);

        if(!is_null($lang)){
            $lang->delete();
     
            return Redirect()->route('language.list')->with('delete', 'Successfully deleted!');;
    
        }

      return Redirect()->route('language.list');
    }

    public function view($id){
        $lang = Language::find($id);      
        return view('admin.pages.languages.view',compact('lang'));
    }


}
