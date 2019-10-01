<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auxiliar\ImagemController;

class SettingsController extends Controller
{
    public function showsettings(){
        
        $user= User::findOrFail(auth()->id());
        
        
        return view('settings',compact('user'));
    }
    
    public function updatesettings(Request $request){
        
        request()->validate([
            
            'tema'=> ['required','string','max:100'],
            'username' => ['required','string','min:2','max:30'],
            'name' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'image', 'mimes:jpeg,jpg,png', 'dimensions:min_width=300,min_height=300', 'max:10000'],
            
            ]);
            //Find or fail procura o id exato ou retorna um 404
            $auxiliar = new ImagemController;
            
            $filename = $auxiliar->s3($request->file('foto'), 'linktree/');
                //dd($filename);
            $user = User::findOrFail(auth()->id());
            $user->tema=request('tema');
            $user->username=request('username');
            $user->name= request('name');
            $user->save();
            
            return redirect('settings');
        }
        
        
        }
        