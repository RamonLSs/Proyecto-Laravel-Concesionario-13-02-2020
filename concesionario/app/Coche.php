<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Marca;

class Coche extends Model
{
    protected $fillable=['matricula', 'modelo', 'color', 'tipo', 'klms', 'pvp', 'foto', 'marca_id'];

    //un coche tendrá una única marca en la relacion 1:n marcas coches
    public function marca(){
        return $this->belongsTo(Marca::class)
        ->withDefault(['nombre'=>'Sin Marca']);
    }
    //Creando los scopes
    public function scopeMarca_id($query, $v){
        if($v=='%'){
            return $query->where('marca_id','like' ,$v)
            ->orWhereNull('marca_id');
        }
        if($v==-1){
            return $query->whereNull('marca_id');
        }
        if(!isset($v)){
            return $query->where('marca_id','like' ,'%')
            ->orWhereNull('marca_id');
        }
        return $query->where('marca_id', $v);
        
    }
    public function scopeTipo($query, $v){
        if(!isset($v)){
            return $query->where('tipo', 'like', '%');
        }
        if($v=='%'){
            return $query->where('tipo', 'like', $v);
        }
        return $query->where('tipo', $v);
    }
}
