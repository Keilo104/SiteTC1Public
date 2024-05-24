<?php

class ModelInscricao {
    private $id;
    private $nome;
    private $idade;
    private $telefone;
    private $inst_desejado;

    public static $inst_dict = [
        1 => "Violão",
        2 => "Violão clássico",
        3 => "Violino",
        4 => "Violoncelo",
        5 => "Contra baixo elétrico",
        6 => "Bateria",
        7 => "Clarinete",
        8 => "Saxofone",
        9 => "Trompete",
        10 => "Trombone",
        11 => "Piano",
        12 => "Teclado",
        13 => "Musicalização infantil (de 6 a 9 anos)"
    ];
    
    public function setInscricaoFromDataBase($linha) {
        $this->setId($linha["id"])
                ->setNome($linha["nome"])
                ->setIdade($linha["idade"])
                ->setTelefone($linha["telefone"])
                ->setInstDesejado($linha["inst_desejado"]);
    }

    public function setInscricaoFromPOST() {
        $this->setId(null)
                ->setNome($_POST["nome"])
                ->setIdade($_POST["idade"])
                ->setTelefone($_POST["telefone"])
                ->setInstDesejado($_POST["curso"]);
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
     * Get the value of idade
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade($idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone($telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of inst_desejado
     */
    public function getInstDesejado()
    {
        return $this->inst_desejado;
    }

    /**
     * Set the value of inst_desejado
     */
    public function setInstDesejado($inst_desejado): self
    {
        $this->inst_desejado = $inst_desejado;

        return $this;
    }
}
?>