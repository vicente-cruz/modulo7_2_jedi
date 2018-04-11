<?php
/**
 *  1º - Configurar o BD e config.php
 *  2º - Criar controllers: classes homeController, controller
 *  3º - Criar as Models e buscar as info do DB
 *  4º - Criar as Views
 */
try {
    $pdo = new PDO("mysql:dbname=curso_php;host=localhost","root","");
} catch(PDOException $e) {
    echo "Error: ".$e->getMessage();
}
?>
<!--4º-->
<h1>Usuarios</h1>
<?php
// 3º
$sql = "SELECT * FROM usuarios LIMIT 10";
$query = $pdo->query($sql);

if ($query->rowCount() > 0) {
    foreach ($query->fetchAll() as $usuario) {
?>
    <h3><?php echo $usuario['email']?></h3>
    <?php echo $usuario['nome']." - ".$usuario['senha']?>
    <hr/>
<?php        
    }
}
?>