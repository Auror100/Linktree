<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller{

public function __construct(){
    $this->middleware('auth');
    
    
}

    public function index(){
        
        $element= Link::where('user_id',auth()->id())->get();
        
        return view('links',compact('element'));
    }
    //Request é para pegar o que foi requisitado
    
    public function store(Request $request){
        request()->validate([
            'titulo' => ['required','string','min:3','max:100'],
            'link'   => ['required','string','min:3','max:200'],
            
            ]);
            
            Link::create([
                'titulo' => request('titulo'),
                'link'   => request('link'),
                'user_id'=>auth()->id(),
                
                
                
                ]);
                
                return redirect('links');
                
            }
            
            public function update(Request $request,$id){
                request()->validate([
                    'titulo' => ['required','string','min:3','max:100'],
                    'link'   => ['required','string','min:3','max:200'],
                    ]);
                    //Find or fail procura o id exato ou retorna um 404
                    $element = Link::findOrFail($id);
                    $element->titulo = request('titulo');
                    $element->link = request('link');
                    $element->save();
                    
                    return redirect('links');
                }
                
                public function destroy($id){
                    Link::find($id)->delete();

                    return redirect('links');
                }

            
                
            }
            