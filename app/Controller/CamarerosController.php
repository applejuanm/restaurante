<?php

    class CamarerosController extends AppController {
          //importamos componente con el objeto session
        public $components = array('Flash', 'RequestHandler');
          //usamos helpers para importar etiquetas helpers
        //son ayudantes para hacer formularios,Javascript
        //Time es para formatos de fechas
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
                    $this->Flash->set('no se pudo crear el camarero');

                }
            }
            //editamos nuestro camarero apuntando al id
            public function editar($id = null){
                //no encuentra el id
                if(!$id){
                    throw new NotFoundException("Datos invalidos");
                }

                //metodo findById que nos mande el id seleccionado
                $camarero = $this -> Camarero -> findById($id);
                if(!$camarero){
                    throw new NotFoundException("El camarero no ha sido encontrado");
                    
            }
            if($this->request->is('post','put')){
                //el contenido del id lo vamos hacer igual
                //a lo que nos rescate el modelo
                //dependiendo del id coincidiendo el id del camarero 
                //con el de la BBDD
                $this->Camarero->id = $id;
                //almacenamos los datos con request data
                if($this->Camarero->save($this->request->data)){
                    $this->Flash->success('El camarero ha sido modificado');
                    //si completa todo nos redirige al indice
                    return $this->redirect(array('action' => 'index'));
                }
            //si no ha pasado la validacion
            $this->Flash->set('El registro no pudo ser modificado');
            }
            //si no encuentra ninguna peticion del formulario de edicio
            //lo pone en la variable camarero, si no exite pues no carga los datos 
            //del camarero en concreto que le hemos pasado el Id
            if(!$this->request->data){
                $this->request->data = $camarero;
            }

        }
        //funcion de eliminar por id mediante excepcion
        public function eliminar($id = null){
            if($this->request->is('get')) {
                //esto sirve para desde fuera no eliminar
                throw new MethodNotAllowedException("Incorrecto");
                
            }
            if($this->Camarero->delete($id)){
                $this->Flash->success('El camarero ha sido eliminado');
                return $this->redirect(array('action' => 'index'));
            }
            
        }
    }
    
?>