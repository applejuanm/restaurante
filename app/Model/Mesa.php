<?php

    class Mesa extends AppModel {

        public $belongsTo = array(
            'Camarero' => array(
                'className' => 'Camarero',
                'foreignKey' => 'camarero_id'
            )
        );

        public $validate = array(
            'serie' => array(
                'notBlank' => array(
                    'rule' => 'notBlank'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Solo numeros'
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => 'La serie de Mesa debe ser unico'
                )
            ),
            'puestos' => array(
                'notBlank' => array(
                    'rule' => 'notBlank'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Solo numeros'
                ),
            ),
            'posicion' => array(
                'rule' => 'notBlank'
            )

        );

    }

?>