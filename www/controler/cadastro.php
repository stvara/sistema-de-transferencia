<title>Cadastro de Usuários</title>
<h3>Cadastro de usuários</h3>
<form action="cadastrar.php" method="post">
    <p>
        Nome: <input type="text" name="nome"> 
    </p>
    <p>
        Tipo: <input type="radio" name="tipo" id="comprador" value="comprador" checked>
              <label for="comprador">Comprador</label>
              <input type="radio" name="tipo" id="lojista" value="lojista">
              <label for="lojista">Lojista</label>
    </p>

    <p>
        CPF: <input type="number" max="99999999999" name="cpf">
    </p>

    <p>
        Email: <input type="email" name="email">
    </p>
    
    <p>
        Senha: <input type="password" name="senha">
    </p>

    <input type="submit" value="cadastrar">
</form>
<a href="/docker/www/">voltar</a>