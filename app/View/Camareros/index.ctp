<h2>Lista de camareros</h2>

<?php
    echo $this->Html->link('Crear Camarero', array('controller' => 'camareros', 'action' => 'nuevo'));
?>
<table>
    <tr>
        <td>Id</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Acciones</td>
    </tr>

 <?php foreach($camareros as $camarero):  ?>
    <tr>
        <td> <?php echo $camarero['Camarero']['id']; ?> </td>
        <td> <?php echo $camarero['Camarero']['nombre']; ?> </td>
        <td> <?php echo $camarero['Camarero']['apellido']; ?> </td>
        <td> <?php echo $this->Html->link('Detalle', array('controller'=> 'camareros', 
        //mandamos el id a nuestro camarero a nuestra clase controlador
        'action' => 'ver', $camarero['Camarero']['id'])); ?> </td>
    </tr>
    <?php endforeach; ?>
</table>
