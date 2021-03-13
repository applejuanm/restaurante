<?php

    class CamarerosController extends AppController {
          //importamos componente con el objeto session
        public $components = array('Flash', 'RequestHandler');
          //usamos helpers para importar etiquetas helpers
        //son ayudantes para hacer formularios,Javascript
	   public $helpers = array('Html', 'Form', 'Time', 'Js');

    
        //inicializador 
        public function index() {
            //traemos los datos de la BBDD a traves de nuestro modelo 'Camarero'
            $this->set('camareros', $this->Camarero->find('all'));
        }
            //aqui vemos el detalle que nos lo pasa por id
            public function ver($id = null) {
                //si no encuentra el id
                if(!$id){
                    throw new NotFoundException('Datos Invalidos');
                }
                //metodo findById que nos mande el id seleccionado
                $camarero = $this -> Camarero -> findById($id);

                //si existe el registro del camarero
                if(!$camarero){
                    throw new NotFoundException('El camarero no existe');
                }
                //si pasa correctamente, le mandamos nuestra variable '$camarero'
                $this->set('camarero', $camarero);

            }
            //aniadir nuevos camareros
            public function nuevo(){
                //mandamos la peticion post con this->request y peticion post
                if($this->request->is('post')) {
                    //crear registro en BBDD con create()
                    $this->Camarero->create();
                    //si estan validados los datos del formulario ejecuta lo siguiente
                    if($this->Camarero->save($this->request->data)){
                        //llama a un objeto sesion usando el metodo setFlash(), esto genera mensajes
                        $this->Flash->success('El camarero ha sido creado');
                        //esto lo que hace es que cuando termina nos redireccion al indice
                        return $this->redirect(array('action' => 'index'));
                    }
                    //si no ha pasado la validacion
                    $this->Flash->set('no se puedo crear el camarero');

                }
            }
    }
    
?>