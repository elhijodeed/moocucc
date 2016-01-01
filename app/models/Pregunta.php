<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Pregunta extends Eloquent implements UserInterface, RemindableInterface 
{
 
 	use UserTrait, RemindableTrait;

	public $errors;
    protected $primaryKey = 'id_pregunta';

 
 	protected $table = 'pregunta';
 	 	
 	protected $fillable = array('id_pregunta', 'nombre', 'tipo', 'opcion_a', 'opcion_b', 'opcion_c', 'opcion_d', 'opcion_multiple', 'respuesta', 'id_evaluacion');

	//protected $hidden = array('password', 'remember_token');
    public $timestamps = false;

	public function isValid($data)
    {
		$rules = array(
            'nombre' => 'required',
            'tipo' => 'required',
            'opcion_a' => 'required',
            'opcion_b' => 'required',
            'opcion_c' => 'required',
            'opcion_d' => 'required',
            'opcion_multiple' => 'required',
            'respuesta' => 'required',
            'id_evaluacion' => 'required|numeric'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;

    }
    
    public function validAndSave($data)
    {
        // Revisamos si la data es válida
        if ($this->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $this->fill($data);
            // Guardamos el usuario
            $this->save();
            
            return true;
        }
        
        return false;
    }
    
    

    
    
}

