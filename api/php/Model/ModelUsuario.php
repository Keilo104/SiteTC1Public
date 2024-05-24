<?php

class ModelUsuario {

    private $id;
    private $nome;
    private $login;
    private $senha;
    private $idPermissao;

    public function setUsuarioFromDataBase($linha) {
        $this->setId($linha["id"])
                ->setNome($linha["nome"])
                ->setLogin($linha["login"])
                ->setSenha($linha["senha"])
                ->setIdPermissao($linha["idpermissao"]);
    }

    public function setUsuarioFromPOST() {
        $this->setId(null)
                ->setNome($_POST["nome"])
                ->setLogin($_POST["login"])
                ->setSenha(md5($_POST["login"] . $_POST["senha"]))
                ->setIdPermissao(null);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */
    public function setLogin($login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha($senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of idPermissao
     */
    public function getIdPermissao()
    {
        return $this->idPermissao;
    }

    /**
     * Set the value of idPermissao
     */
    public function setIdPermissao($idPermissao): self
    {
        $this->idPermissao = $idPermissao;

        return $this;
    }
}
?>