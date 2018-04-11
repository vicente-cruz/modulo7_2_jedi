<h1>Usuarios</h1>

<?php foreach($usuarios as $usuario): ?>
    <h3><?php echo $usuario['email']?></h3>
    <?php echo $usuario['nome']." - ".$usuario['senha']?>
    <hr/>
<?php endforeach; ?>
