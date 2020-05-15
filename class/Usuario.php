<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function setIdusuario ($id) {
        $this->idusuario = $id;
    }

    public function getDeslogin (){
        return $this->deslogin;
    }

    public function setDeslogin ($deslogin) {
        $this->deslogin = $deslogin;
    }

    public function getDessenha () {
        return $this->dessenha;
    }

    public function setDessenha ($senha) {
        $this->dessenha = $senha;
    }

    public function getDtcadastro () {
        return $this->dtcadastro;
    }

    public function setDtcadastro ($data) {
        $this->dtcadastro = $data;
    }

    public static function getList () {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
        return $result;
    }

    public function search ($login) {

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ":SEARCH"=>"%".$login."%"
        ));
    }

    public function login ($login, $senha) {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$senha
        ));

        //var_dump($result);

        if(isset($result[0])){

            $row = $result[0];   

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        } else {

            throw new Exception("Email ou senha incorretors", 1);
        }
    }

    public function loadById ($id) {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if(isset($result[0])){

            $row = $result[0];
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }
    }

    public function __toString() {

        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")
        ));
    }
}






















?>