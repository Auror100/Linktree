<?php

namespace App\Http\Controllers\Auxiliar;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\ImageManagerStatic as Image;


class ImagemController extends Controller
{
    /*
    public function facebook($foto, $place){
        //Extensão
        $header = get_headers($foto, 1)["Content-Type"];
        $extension = explode("/", $header[0]);
        //Gerar nome
        $nome = md5(time()).'.'.$extension[1];
        //Criar imagem
        $image = Image::make($foto)->resize(300, 300)->save($nome);
        //S3
        $filename = $place.$nome;
        Storage::disk('s3')->put($filename, $image, 'public');
        //Deleta Arquivo
        File::delete($nome);
        //Return
        return $filename;
    }

    public function cropS3($foto, $place, $width, $height){
        //Gerar nome
        $nome = md5(time()) . $foto->getClientOriginalExtension();
        //Criar imagem
        $image = Image::make($foto)->resize($width, $height)->save($nome);
        //S3
        $filename = $this->s32($foto, $image, $place);
        //Deleta Arquivo
        File::delete($nome);
        //Return
        return $filename;
    }

    public function cropS3Points($foto, $points, $place, $width, $height){
        //Tratamento pontos
        $partes = explode(",", $points);
        $lado = (int)$partes[2] - (int)$partes[0];
        //Gerar nome
        $nome = md5(time()) . $foto->getClientOriginalExtension();
        //Criar imagem
        $image = Image::make($foto)->crop($lado, $lado, (int)$partes[0], (int)$partes[1])->resize($width, $height)->save($nome);
        //S3
        $filename = $this->s32($foto, $image, $place);
        //Deleta Arquivo
        File::delete($nome);
        //Return
        return $filename;
    }

    */
    public function s3($foto, $place){
            
        //get filename with extension
        $filenamewithextension = $foto->getClientOriginalName();
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        //get file extension
        $extension = $foto->getClientOriginalExtension();
        //filename to store
        $filenametostore = $place.md5(time()).'.'.$extension;
        //Upload File to s3
        Storage::disk('s3')->put($filenametostore, fopen($foto, 'r+'), 'public');
        //Return
        return $filenametostore;
    }

    /*
    public function s32($original, $foto, $place){
        $filenamewithextension = $original->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $original->getClientOriginalExtension();
        $filenametostore = $place.md5(time()).'.'.$extension;
        Storage::disk('s3')->put($filenametostore, $foto, 'public');
        return $filenametostore;
    }

*/
}