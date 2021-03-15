<?php

    class MesasController extends AppController {

        public $helpers = array('Html', 'Form', 'Time', 'Js');
        public $components = array('Flash', 'RequestHandler');

        public function index(){
            //recuperamos los registros de nuestra variable mesas
            $this->set('mesas', $this->Mesa->find('all'));
    }

    public function nuevo(){
        //preguntamos si es post
        if($this->request->is('post')){

            //crea nuestro post y guarda nuestros datos
            $this->Mesa->create();
            if($this->Mesa->save($this->request->data)){
                $this->Flash->success('La mesa ha sido creada!');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('no se puedo crear la mesa');
        }
        //recorrido de mesa hasta camarero, se puede acceder
        //desde nuestro controlador de mesas al camarero
        $camareros = $this->Mesa->Camarero->find('list', array('fields' => array('id', 'nombre_completo')));
        //lo almacenamos en una array 'camareros' para poder
        //manipularlo desde las vistas
        $this->set('camareros', $camareros);
    }
    //id de mesa que queremos editar
    public function editar($id = null){
        if(!$id){
            throw new NotFoundException("Datos invalidos");
        }

        $mesa = $this->Mesa->findById($id);

        if(!$mesa){

            throw new NotFoundException("La mesa no ha sido encontrada");
        }

        if($this->request->is(array('post', 'put'))){

            $this->Mesa->id = $id;
            if($this->Mesa->save($this->request->data)){
                $this->Flash->success('La mesa ha sido modificada');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('El registro no pudo ser modificado');
        }
        if(!$this->request->data){
            $this->request->data = $mesa;
        }
        $camareros = $this->Mesa->Camarero->find('list', array('fields' => array('id', 'nombre_completo')));
        $this->set('camareros',$camareros);
    }
    public function eliminar($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException("INCORRECTO");
        }
        if($this->Mesa->delete($id)) {
            $this->Flash->success('La mesa ha sido eliminada');
            return $this->redirect(array('action' => 'index'));
        }
    }
}

?>