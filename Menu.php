<?php

class Menu extends \Eloquent {

	
        protected $table = 'menus';

        // Add your validation rules here
	public static $rules = [
		 'descricao' => 'required'
	];

        public static $nice_names = array(
		 'descricao' => 'Descrição'
        );
	
        // Don't forget to fill this array
	protected $fillable = ['descricao', 'route', 'pai_id', 'ordem_menu', 'menu_adm', 'menu_adm_im', 'ativo', 'tipo'];
        
        
        public function pai(){
            return $this->belongsTo('Menu', 'pai_id');
        }

}