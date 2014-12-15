<?php

class CadastroController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contatos = Contato::all();

        return View::make('cadastro.index', ['contatos' => $contatos]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cadastro.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()


    {   ############Validação##########################
        $validation = Validator::make(Input::all(), Contato::$rules, Contato::$errors);

        ##########################################

        if ($validation->fails()) {
            $error = $validation->messages();
            return Redirect::back()->withInput()->withErrors($error);


        }


        // #############up da foto##################################
        $maxsize = 2000000; //2 mb em bytes
        $file = Input::file('foto');
        $extension = null;
        $filename = null;
        if($file) {
            $filename = md5(time());
            $img = Image::make($file->getRealPath());
//        $size = $img->filesize();


            $mime = $img->mime();  // intervention 2.0
            if ($mime == 'image/jpeg')
                $extension = '.jpg';
            elseif ($mime == 'image/png')
                $extension = '.png';
            elseif ($mime == 'image/gif')
                $extension = '.gif';
            else
                $extension = '';
            $img->save(public_path() . '/upload/' . $filename . $extension);
        }


        ###########################################################
        $data = Input::get('data');
        $data = implode("-", array_reverse(explode("/", $data)));
        $child = Input::get('name');
        if ($child == [""]){
            $child = 0;
        }else{
            $child = 1;
        }
        $contato = Contato::create(array(
            'nome' => Input::get('nome'),
            'nascimento' => $data,
            'cpf' => Input::get('cpf'),
            'tel_principal' => Input::get('telefone'),
            'tipo_tel' => Input::get('tipoTel'),
            'op' => Input::get('op'),
            'idade' => Input::get('idade'),
            'nome_res' => Input::get('nomeres'),
            'cpf_res' => Input::get('cpfres'),
            'email' => Input::get('email'),
            'tipo_end' => Input::get('tipo'),
            'cep' => Input::get('cep'),
            'estado' => Input::get('estado'),
            'cidade' => Input::get('cidade'),
            'bairro' => Input::get('bairro'),
            'rua' => Input::get('rua'),
            'numero' => Input::get('numero'),
            'logradouro' => Input::get('logradouro'),
            'genero' => Input::get('genero'),
            'estadoCivil' => Input::get('estadoCivil'),
            'mae' => Input::get('mae'),
            'pai' => Input::get('pai'),
            'filhos' => $child,
            'grupo' => Input::get('grupo'),
            'caminho' => $filename . $extension,
            'ativo' => Input::get('ativo'),
            'exaluno' => Input::get('exaluno')
        ));

        $filho = Input::get('name');
        if ($filho == [""]){  // não da pra checar com empty pois o name no form é name[].

        } else {
            $filhos = array();
            foreach (Input::get('name') as $name) {
                $filhos[] = new FilhoContato(array('nomefilho' => $name));
            }
            $contato->filhoContato()->saveMany($filhos);
        }



//        $filhos = array_build(Input::get('nomefilho'), function ($key, $name) {
//            return array($key, array('nomefilho' => is_array($name) ? $name[0] : $name));
//        });
//
//        $contato->filhoContato()->save($filhos);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
