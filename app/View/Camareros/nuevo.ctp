<h2>Crear Camarero</h2>
<!--Formulario-->
<?php
    //usamos helper de Form
    echo $this->Form->create('Camarero');
    echo $this->Form->input('dni');
    echo $this->Form->input('nombre');
    echo $this->Form->input('apellido');
    echo $this->Form->input('telefono');
    echo $this->Form->end('Crear Camarero');

?>