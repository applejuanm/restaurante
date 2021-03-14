<?php

    class Mesa extends AppModel {

        public $belongsTo = array(
            'Camarero' => array(
                'className' => 'Camarero',
                'foreignKey' => 'camarero_id'
            )
        );

    }

?>