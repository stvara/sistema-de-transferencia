<title>Area de Transferencias</title>
<?php

$id = intval(filter_var($_GET['id']));
$tipo = filter_var($_GET['tipo']);

?>

<h3> Você está logado com a matricula: <?php echo"$id"?> de <?php echo"$tipo"?> </h3>
<br>
<h3>deseja realizar uma transferencia para quem?<h3>

<form action="validar.php" method="post">
    <p>
        Matricula pagador: <input type="number" name="idpagador" value="<?php echo $id ?>" readonly="false" > 
    </p>
    <p>
        Tipo pagador: <input type="text" name="tipopagador" value="<?php echo $tipo ?>" readonly="false" > 
    </p>
    <p>
        Matricula beneficiario: <input type="number" name="idbeneficiario"> 
    </p>
    <p>
        valor da transferencia: <input type="number" name="valor"> 
    </p>
    <p>
        Senha: <input type="password" name="senha">
    </p>
    <p>
   <p> Tipo: <input type="radio" name="tipo" id="comprador" value="comprador" checked>
              <label for="comprador">Comprador</label>
              <input type="radio" name="tipo" id="lojista" value="lojista">
              <label for="lojista">Lojista</label>
    </p>
    </p>
    <input type="submit" value="entrar">
</form>

<a href="/docker/www/">Sair</a>


