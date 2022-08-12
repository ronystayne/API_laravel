<?php

namespace App\Http\Controllers;

use App\Models\Artigos as Artigos;
use App\Http\Resources\Artigos as ArtigosResource;

use Illuminate\Http\Request;

class ArtigosController extends Controller
{

    public function index(){
      $artigos = Artigos::paginate(15);
      return ArtigosResource::collection($artigos);
    }
  
    public function show($id){
      $artigos = Artigos::findOrFail( $id );
      return new ArtigosResource( $artigos );
    }
  
    public function store(Request $request){
      $artigos = new Artigos;
      $artigos->titulo = $request->input('titulo');
      $artigos->conteudo = $request->input('conteudo');
  
      if( $artigos->save() ){
        return new ArtigosResource( $artigos );
      }
    }
  
     public function update(Request $request){
      $artigos = Artigos::findOrFail( $request->id );
      $artigos->titulo = $request->input('titulo');
      $artigos->conteudo = $request->input('conteudo');
  
      if( $artigos->save() ){
        return new ArtigosResource( $artigos );
      }
    } 
  
    public function destroy($id){
      $artigos = Artigos::findOrFail( $id );
      if( $artigos->delete() ){
        return new ArtigosResource( $artigos );
      }
  
    }
  }