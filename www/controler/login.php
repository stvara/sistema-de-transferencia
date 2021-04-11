<title>Entrada de login</title>
<h3>Entrada de usuários</h3>
<form action="logar.php" method="post">
    <p>
        Matricula: <input type="number" name="id"> 
    </p>
    <p>
        Senha: <input type="password" name="senha">
    </p>
    <p>
    Tipo: <input type="radio" name="tipo" id="comprador" value="comprador" checked>
              <label for="comprador">Comprador</label>
              <input type="radio" name="tipo" id="lojista" value="lojista">
              <label for="lojista">Lojista</label>
    </p>
    <input type="submit" value="entrar">
</form>
<a href="/docker/www/">voltar</a>