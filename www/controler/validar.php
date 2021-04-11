<?php
include_once 'conexao.php';

$idPagador = intval(filter_var($_POST["idpagador"]));
$idBeneficiario = intval(filter_var($_POST["idbeneficiario"]));
$tipoPagador = filter_var($_POST["tipopagador"]);
$debitado = intval(filter_var($_POST["valor"]));
$senha = filter_var($_POST["senha"]);
$tipoBeneficiario = filter_var($_POST["tipo"]);



if(empty($idPagador)){
    echo "<p>sua matricula não foi carregada </p><br>";
    echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
    die();
}
if(empty($idBeneficiario)){
    echo "<p>matricula do recebedor não informada: </p><br>";
    echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
    die();
}
if(empty($debitado)){
    echo "<p>valor da transação não foi informado</p><br>";
    echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
    die();
}
if(empty($senha)){
    echo "<p>sua senha não foi informada: </p><br>";
    echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
    die();
}
if(empty($tipoBeneficiario)){
    echo "<p>O tipo do recebedor não foi informado: </p><br>";
    echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
    die();
}

if($tipoPagador == "lojista"){
    echo "Lojistas não podem realizar transferencias:<br>";
    echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
    die();
}

if($tipoPagador == "comprador"){

    try{    //verificador de senha do pagador
        $consulta = $conectar->query("SELECT * FROM comprador where id = '$idPagador'");
        $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
            if($senha === $verificador['senha']){
               // echo  "você está logado como comprador"; \\teste para a senha;
                    $saldoPagador = $verificador['dinheiro'];
                    
                        if($saldoPagador > $debitado){
                            $valorDebitado = $saldoPagador - $debitado;
                            $valorExtorno = $saldoPagador;
                            $valorDeposito = $saldoPagador + $debitado;
                            
                                 try{ //desconto do pagador
                                        $update = $conectar->prepare("UPDATE comprador SET dinheiro=:dinheiro WHERE id=:id");
                                        $update->bindParam(':id', $idPagador);
                                        $update->bindParam(':dinheiro', $valorDebitado);
                                        $update->execute();
                                        //echo "seu novo saldo é de $valorDebitado";
                                                     
                                    }catch(PDOException $e){
                                        echo $e;            
                                
                                    }

                                    






                                    if($tipoBeneficiario == "comprador"){
                                        $validacao = file_get_contents('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6/');
                                        $validar = json_decode($validacao);
                                        if($validar->message === 'Autorizado'){
                                                try{ //acrescimo em caso de usuario comprador
                                                    //verificador saldo beneficiario comprador
                                                    $consulta = $conectar->query("SELECT * FROM comprador where id = '$idBeneficiario'");
                                                    $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
                                                    $saldoBeneficiario = $verificador['dinheiro'];
                                                    $valorDepositado = $saldoBeneficiario + $debitado;


                                                    $update = $conectar->prepare("UPDATE comprador SET dinheiro=:dinheiro WHERE id=:id");
                                                    $update->bindParam(':id', $idBeneficiario);
                                                    $update->bindParam(':dinheiro', $valorDepositado);
                                                    $update->execute();
                                                    $comprovanteExterno = file_get_contents('https://run.mocky.io/v3/b19f7b9f-9cbf-4fc6-ad22-dc30601aec04');
                                                    $comprovante = json_decode($comprovanteExterno);

                                                    //echo "O novo saldo do beneficiario é de $valorDepositado";
                                                }catch(PDOException $e){
                                                    echo $e;            
                                            
                                                }
                                   
                                        echo"Transação Efetuada com Sucesso, seu novo saldo é de $valorDepositado";
                                        }else{
                                            echo "Transação Efetuada com Sucesso, obrigado por utilizar nossos serviços<br>";
                                            echo "<a href='/docker/www/'>voltar a tela inicial</a>";                                        }


                                    }else{
                                            if($tipoBeneficiario == "lojista" ){
                                                $validacao = file_get_contents('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6/');
                                                $validar = json_decode($validacao);
                                                if($validar->message === 'Autorizado'){
                                                    try{ //acrecimo em caso de usuario lojista
                                                        //verificador saldo beneficiario lojista
                                                        $consulta = $conectar->query("SELECT * FROM lojista where id = '$idBeneficiario'");
                                                        $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
                                                        $saldoBeneficiario = $verificador['dinheiro'];
                                                        $valorDepositado = $saldoBeneficiario + $debitado;

                                                        $update = $conectar->prepare("UPDATE lojista SET dinheiro=:dinheiro WHERE id=:id");
                                                        $update->bindParam(':id', $idBeneficiario);
                                                        $update->bindParam(':dinheiro', $valorDepositado);
                                                        $update->execute();
                                                        $comprovanteExterno = file_get_contents('https://run.mocky.io/v3/b19f7b9f-9cbf-4fc6-ad22-dc30601aec04');
                                                        $comprovante = json_decode($comprovanteExterno);
                                                       // echo "O novo saldo do beneficiario é de $valorDepositado";      
                                                    }catch(PDOException $e){
                                                        echo $e;            
                                                
                                                    }  
                                                    echo "Transação Efetuada com Sucesso, obrigado por utilizar nossos serviços<br>";
                                                    echo "<a href='/docker/www/'>voltar a tela inicial</a>";

                                                }else{
                                                    echo "a transação não pode ser validada";
                                                }
                                            
                                            }else{//extorno ao comprador
                                                    try{                                                    
       
                                                        $update = $conectar->prepare("UPDATE comprador SET dinheiro=:dinheiro WHERE id=:id");
                                                        $update->bindParam(':id', $idPagador);
                                                        $update->bindParam(':dinheiro', $valorExtorno);
                                                        $update->execute();
                                                                   
                                                    }catch(PDOException $e){
                                                        echo $e;            
                                                
                                                    }
            
       



                                            }
                                }




                                }else{
                                    echo "saldo insuficiente para realizar esta transação";
                                }

   

            }else{
                echo "senha incorreta <br>";
                echo "<a href='/docker/www/controler/aplicacao.php?id=$idPagador&tipo=$tipoPagador'>Voltar a pagina anterior</a>";
                die(); 
                
            }
    }catch(PDOException $e){
        echo $e;            

    }  
}//apagar

    /*faz a transferencia;
    try{
        $update = $conectar->prepare("UPDATE comprador SET dinheiro=:dinheiro WHERE id=:id");
        $update->bindParam(':id', $idPagador);
        $update->bindParam(':dinheiro', $debitado);
        $update->execute();
                          
    }catch(PHPExcetion $e){
        echo $e;            

    }
}
 }*/


/*
print_r($idPagador);
print_r($idBeneficiario);
print_r($debitado); 
print_r($senha);
print_r($tipoBeneficiario);
*/

$validacao = file_get_contents('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6/');
                $validar = json_decode($validacao);


function notificarTransferencia(){
    $notificação = file_get_contents('https://run.mocky.io/v3/b19f7b9f-9cbf-4fc6-ad22-dc30601aec04');
        $notaDeTransferencia = json_decode($notificação);
}