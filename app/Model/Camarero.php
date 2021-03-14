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
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => 'El dni ya se encuentra en nuestra base de datos'
                ),
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
        //creamos a la asociacion 'muchas mesas' a un camarero
        public $hasMany = array(
            'Mesa' => array(
                'className' => 'Mesa',
                'foreignKey' => 'camarero_id',
                'conditions' => '',
                'order' => 'Mesa.serie DESC',
                'depend' => false
            )
        );
    }
?>