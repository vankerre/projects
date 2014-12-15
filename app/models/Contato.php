<?php

    use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Contato extends Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = array(
        'nome',
        'nascimento',
        'cpf',
        'tel_principal',
        'idade',
        'email',
        'nome_res',
        'cpf_res',
        'tipo_end',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'logradouro',
        'genero',
        'estadoCivil',
        'mae',
        'pai',
        'grupo',
        'caminho',
        'ativo',
        'exaluno'
    );
    public $timestamps = false;


    public function filhoContato()
    {
        return $this->hasMany('FilhoContato', 'id_contato');
    }

    public static $rules = array(
        'nome'          => 'required',
        'data'          => 'required',
        'cpf'           => 'required|cpf|unique:contato',
        'cpfres'       => 'unique:contato,cpf_res',
        'telefone'      => 'required',
        'ativo'         => 'required',
        'foto'          => 'max:2000|mimes:jpeg,jpg,png,bmp',
    );

    public static $errors = array(
        'nome.required'          => 'Campo Nome é obrigatório',
        'data.required'          => 'Campo Data Nascimento é obrigatório',
        'cpf.required'           => 'Campo CPF é obrigatório',
        'telefone.required'      => 'Campo Telefone é obrigatório',
        'ativo.required'         => 'Campo Ativo é obrigatório',
        'foto.max'               => 'Limite de 2 MB apenas',
        'foto.mimes'             => 'Apenas Jpg, Png e Bmp são suportados'

    );
    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contato';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}
