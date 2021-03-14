<h2>Editar Camarero</h2>

<?php echo $this->Form->create('Camarero');?>
<?php echo $this->Form->input('dni',array( 'type' => 'number'));?>
<?php echo $this->Form->input('nombre');?>
<?php echo $this->Form->input('apellido');?>
<?php echo $this->Form->input('telefono');?>
<?php echo $this->Form->end('Editar camarero');?>

<?php
    echo $this->Html->link('Volver al listado de camarero', array('controller' => 'camareros', 'action' => 'index'));
?>

