<?php

require './model/mTb_submissao_doctos.php';

class aTb_submissao_doctos extends mtb_submissao_doctos {

    protected $sqlInsert = "INSERT INTO tb_submissao_doctos(COD_Submissao, Nome_Docto, Assunto, Parecer, Documento, Data_Envio,Idioma_Documento, ID_Usuario, COD_Participante, ID_EVT) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update tb_submissao_doctos set Nome_Docto='%s', Assunto='%s', Parecer='%s', Documento='%s', Data_Envio='%s', Idioma_Documento='%s', ID_Usuario='%s', COD_Participante='%s', ID_EVT='%s' where COD_Submissao='%s'";
    protected $sqlDelete = "delete from tb_submissao_doctos where COD_Submissao='%s'";
    protected $sqlSelect = "select * from tb_submissao_doctos where 1=1 %s %s";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getCOD_Submissao(), $this->getNome_Docto(), $this->getAssunto(), $this->getParecer(), $this->getDocumento(), $this->getData_Envio(TRUE), $this->getIdioma_Documento(), $this->getID_Usuario(), $this->getCOD_Participante(), $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getNome_Docto(), $this->getAssunto(), $this->getParecer(), $this->getDocumento(), $this->getData_Envio(TRUE), $this->getIdioma_Documento(), $this->getID_Usuario(), $this->getCOD_Participante(), $this->getID_EVT(),$this->getCOD_Submissao());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getCOD_Submissao());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf(" and COD_Submissao ='%s'", $this->getCOD_Submissao()));
        $this->setCOD_Submissao($rs[0]['COD_Submissao']);
        $this->setNome_Docto($rs[0]['Nome_Docto']);
        $this->setAssunto($rs[0]['Assunto']);
        $this->setParecer($rs[0]['Parecer']);
        $this->setDocumento($rs[0]['Documento']);
        $this->setData_Envio($rs[0]['Data_Envio']);
        $this->setIdioma_Documento($rs[0]['Idioma_Documento']);
        $this->setID_Usuario($rs[0]['ID_Usuario']);
        $this->setCOD_Participante($rs[0]['COD_Participante']);
        $this->setID_EVT($rs[0]['ID_EVT']);
        return $this;
    }

}
