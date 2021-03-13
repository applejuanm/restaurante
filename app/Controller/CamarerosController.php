<?php

    class CamarerosController extends AppController {

        //usamos helpers para importar etiquetas helpers
        //son ayudantes para hacer formularios,Javascript
        public $helpers = array('Html', 'Form');

        //inicializador 
        public function index() {
            //traemos los datos de la BBDD a traves de nuestro modelo 'Camarero'
            $this->set('camareros', $this->Camarero->find('all'));
        }
    }
    
?>