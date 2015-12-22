<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Temario extends Eloquent implements UserInterface, RemindableInterface 
{
 
 	use UserTrait, RemindableTrait;

	public $errors;
    protected $primaryKey = 'id_temario';

 
 	protected $table = 'temario';
 	 	
 	protected $fillable = array('id_temario', 'titulo', 'contenido', 'posicion', 'id_curso', 'tipo_contenido', 'usuario');

	//protected $hidden = array('password', 'remember_token');
    public $timestamps = false;

	public function isValid($data)
    {
		$rules = array(
            'id_temario' => 'required|numeric',
            'titulo' => 'required',
            'contenido' => 'required',
            'posicion' => 'required',            
            'id_curso' => 'required|numeric',
            'tipo_contenido' => 'required',
            'usuario' => 'required|numeric'
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
    
    public function getCurso()
    {
		$curso = Curso::find($this->id_curso);
		return $curso;
	}
	
	public function getProfesores()
	{
		if($this->usuario != '')
		{
			$profesor = Usuario::find($this->id_usuario);
			return $profesor;
		}
		else
		{
			$profesores = RelacionUsuarioCurso::where('id_curso','=', $this->id_curso)->where('tipo_relacion','=', 'Profesor Admin')->orwhere('tipo_relacion','=', 'Profesor Basico')->get();
			return $profesores;
		}
	}
    
}

