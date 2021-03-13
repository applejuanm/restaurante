<?php
    /**Aqui hacemos la validacion del formulario de creacion de camareros */
    /**Toda validacion se hace desde el modelo */
    Class Camarero extends AppModel {

        public $validate = array(
            'dni' => array(
                'notBlank' => array(
                    'rule' => 'notBlank'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'solo numeros'
                )
            ),
            'nombre' => array(
                'rule' => 'notBlank'
            ),
            'apellido' => array(
                'rule' => 'notBlank'
            ),
            'telefono' => array(
                'notBlank' => array(
                    'rule' => 'notBlank'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'solo numeros'
                )
            ),
        );
    }
?>