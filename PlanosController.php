<?php

class PlanosController extends \BaseController {
        /**
	 * Display a listing of planos
	 *
	 * @return Response
	 */
    
         private $valores;

    
	public function index()
	{
                $input = Input::all();
                $sel_pesq = Input::get('sel_pesq');
                $txt_pesq = Input::get('txt_pesq');
                $campo = 'id';

                switch ($sel_pesq){
                    case '0' : 
                        $campo = 'id';
                        break;
                    case '1' : 
                        $campo = 'descricao';
                        break;
                }
                if ($campo == 'id' && trim($txt_pesq) == ''){
//                    $planos = Plano::where('descricao', 'like', '%BASICO%')->get();
                    $planos = Plano::all ();
                }else{
                    $planos = Plano::where($campo, 'like', '%'.$txt_pesq.'%')->get();
                }
                
                $data = compact('planos', 'sel_pesq', 'txt_pesq');
                $contador = $planos->count();
		return View::make('planos.index', $data);
	}

	/**
	 * Show the form for creating a new plano
	 *
	 * @return Response
	 */
	public function create()
	{
                $this->valores = Utilitarios::getValores();
                $this->valores["operacao"] = 'Adicionar';
                $this->valores["titulo"] = 'Planos';
                $this->valores["disabled"] = '';

                return View::make('planos.create')
                        ->with('valores', $this->valores);
	}

	/**
	 * Store a newly created plano in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $data = Input::all();
            $data['ativo'] = (isset($data['ativo']) ? true : false);

            $entidade = new Plano();
            $validator = Utilitarios::Validar($data, $entidade);
            
            if ($validator !== true){
                return Redirect::back()->withErrors($validator)->withInput();                
            }
            
            Plano::create($data);

            return Redirect::route('planos.index');
	}

        
	/**
	 * Display the specified plano.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
                $this->valores = Utilitarios::getValores();
                $this->valores["operacao"] = 'Visualizar';
                $this->valores["titulo"] = 'Planos';
                $this->valores["disabled"] = 'disabled';
                
		$plano = Plano::findOrFail($id);

		return View::make('planos.show', compact('plano'))
                ->with('valores', $this->valores);
	}

	/**
	 * Show the form for editing the specified plano.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$plano = Plano::find($id);

                $this->valores = Utilitarios::getValores();
                $this->valores["operacao"] = 'Atualizar';
                $this->valores["titulo"] = 'Planos';
                $this->valores["disabled"] = '';
                

                return View::make('planos.edit', compact('plano'))
                        ->with('valores', $this->valores);
	}

	/**
	 * Update the specified plano in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$plano = Plano::findOrFail($id);

                $data = Input::all();
                
                $data['ativo'] = (isset($data['ativo']) ? true : false);
                
                $entidade = new Plano();
                $validator = Utilitarios::Validar($data, $entidade);

                if ($validator !== true){
                    return Redirect::back()->withErrors($validator)->withInput();                
                }

		$plano->update($data);

		return Redirect::route('planos.index');
	}

	/**
	 * Remove the specified plano from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Plano::destroy($id);

		return Redirect::route('planos.index');
	}

}
