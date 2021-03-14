<h2>Detalle del camarero <?php echo $camarero['Camarero']['nombre']; ?></h2>

<p><b> DNI:</b> <?php echo $camarero['Camarero']['dni']  ?></p>
<p><b> Teléfono:</b> <?php echo $camarero['Camarero']['telefono']  ?></p>
<p><b> Creado:</b> <?php echo $this->Time->format('d-m-Y ; h:i A', $camarero['Camarero']['created']) ?></p>
<p><b> Fecha modificada:</b> <?php echo $this->Time->format('d-m-Y ; h:i A', $camarero['Camarero']['modified']) ?></p>

<?php
    echo $this->Html->link('Volver al listado de camarero', array('controller' => 'camareros', 'action' => 'index'));
?>

<pre>
    <?php
     //   print_r($camarero);
    ?>
</pre>

<h3>Encargado de las mesas:</h3>
<!--Si este array esta vacio(no tiene mesas el camarero)--->
<?php if(empty($camarero['Mesa'])): ?>
    <p>No tiene mesas asociadas</p>
<?php  endif ?>

<!---Recorre las mesas asignadas al camarero-->
<?php foreach($camarero['Mesa'] as $m): ?>
    <p>
        Serie: <?php echo $m['serie']; ?>
        <br />
        Puestos: <?php echo $m['puestos']; ?>
        <br />
        Posicion: <?php echo $m['posicion']; ?>
        <br />
        Creado: <?php echo $m['created']; ?>
        <br />
    </p>
<?php endforeach ?>

<?php
    echo $this->Html->link('Volver al listado de camarero', array('controller' => 'camareros', 'action' => 'index'));
?>