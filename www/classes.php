<?php

/*
class usuario{
    public $nome;
    private $tipo; 
    private $cpf;
    private $email;
    private $senha;
    private $carteira;


    public function pagamento($pagador,$beneficiario,$valor){
        if($this->getTipo() == 'comprador'){
            
            if($pagador->carteira > $valor){
            
                $validacao = file_get_contents('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6/');
                $validar = json_decode($validacao);
                print_r($validar);
                
                if($validar->message == "Autorizado"){
                    $pagador->setCarteira($pagador->getCarteira() - $valor);
                    $beneficiario->setCarteira($beneficiario->getCarteira() + $valor);
                    
                    print_r($pagador->carteira);
                }else echo "operação não pode ser validada";
                
                
            }else{
                echo "Saldo Insuficiente";
            }
        }else{
            echo "Apenas compradores podem efetuar este tipo de transação.";
        }
    
    }










    public function setNome($n){
        $this->nome = $n;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setTipo($t){
        $this->tipo = $t;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setCpf($c){
        $this->cpf = $c;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setEmail($e){
        $this->email=$e;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setSenha($s){
        $this->senha = $s;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setCarteira($c){
        $this->carteira=$c;
    }
    public function getCarteira(){
        return $this->carteira;
    }

}

*/