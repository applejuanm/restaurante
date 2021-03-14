<h2>Detalle del camarero <?php echo $camarero['Camarero']['nombre']; ?></h2>

<p><b> DNI:</b> <?php echo $camarero['Camarero']['dni']  ?></p>
<p><b> Teléfono:</b> <?php echo $camarero['Camarero']['telefono']  ?></p>
<p><b> Creado:</b> <?php echo $this->Time->format('d-m-Y ; h:i A', $camarero['Camarero']['created']) ?></p>
<p><b> Fecha modificada:</b> <?php echo $this->Time->format('d-m-Y ; h:i A', $camarero['Camarero']['modified']) ?></p>

<?php
    echo $this->Html->link('Volver al listado de camarero', array('controller' => 'camareros', 'action' => 'index'));
?>
