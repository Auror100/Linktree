<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\User;

class ContaController extends Controller{
    
    
    public function indexConta($username)
    {
        
        $element = Link::where('user_id',auth()->id())->get();
        //Prestar atenção nesse funcionamento
        $user = User::where('username', $username)->first();
        
        return view('conta', compact('user','element'));
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
                'user_id'=>auth()->id()
                
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

                public function showSettings(){
                    
                    $user= User::findOrFail(auth()->id());
                    
                    
                    return view('settings',compact('user'));
                }
                
                public function updateSettings(Request $request){
                    request()->validate([
                        'tema'=> ['required','string','min:3','max:100'],
                        
                        ]);
                        //Find or fail procura o id exato ou retorna um 404
                        $user = User::findOrFail(auth()->id());
                        $user->tema=request('tema');
                        
                        $user->save();
                        
                        return redirect('settings');
                    }
                    
                    public function updateName(Request $request){
                        request()->validate([
                            'name' => ['required', 'string', 'max:255'],
                            
                            ]);
                            //Find or fail procura o id exato ou retorna um 404
                            $user = User::findOrFail(auth()->id());
                            
                            $user->name= request('name');
                            
                            $user->save();
                            
                            return redirect('settings');
                        }
                        
                        
                        
                        
                    }
                    
                    
                
                
                
                