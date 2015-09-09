<?php

require './model/mUsuario.php';

class aUsuario extends mUsuario {

    protected $sqlInsert = "INSERT INTO seg_usuario(DSC_Login, DSC_Senha, DTM_Inicio, DTM_Fim, ID_SEG_Grupo) VALUES ('%s',MD5('%s'),'%s','%s','%s')";
    protected $sqlUpdate = "UPDATE seg_usuario set DSC_Login = '%s',DSC_Senha= '%s',DTM_Inicio= '%s' as DTM_Inicio,DTM_Fim= '%s' as DTM_Fim, ID_SEG_Grupo='%s' where ID_Usuario = '%s'";
    protected $sqlDelete = "DELETE FROM seg_usuario WHERE ID_Usuario = '%s'";
    protected $sqlSelect = "SELECT * FROM seg_usuario WHERE 1=1 %s %s";
    protected $sqlSelectInnerGrupo = "SELECT *,seg_grupo.ID_Grupo,seg_grupo.DSC_Nome from seg_usuario inner join seg_grupo on (seg_usuario.ID_SEG_Grupo = seg_grupo.ID_Grupo) where 1=1 %s %s";
    protected $sqlSelectInnerTrans = "SELECT *,seg_detalhe_transacao.COD_TIPO_Origem_Transacao seg_detalhe_transacao.COD_Tipo_Sistema_Transacao,seg_detalhe_transacao.DSC_Login_Transacao from seg_usuario inner join seg_detalhe_transacao on (seg_usuario.ID_Usuario = seg_detalhe_transacao.ID_SEG_Usuario) where 1=1 %s %s";
    protected $sqlSelectExists = "SELECT count(*) FROM seg_usuario WHERE 1=1 and DSC_Login='%s'";
    protected $sqlSelectID = "SELECT ID_Usuario FROM seg_usuario WHERE 1=1 and DSC_Login=%s";

    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getDSC_Login(), $this->getDSC_Senha(), $this->getDTM_Inicio(true), $this->getDTM_Fim(true), $this->getID_SEG_Grupo());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Login(), $this->getDSC_Senha(), $this->getDTM_Inicio(true), $this->getDTM_Fim(true), $this->getID_SEG_Grupo());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_Usuario());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function loginAc($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunLog($sql);
    }

    public function selectInnerGrupo($where = '', $order = '') {
        $sql = sprintf($this->sqlSelectInnerGrupo, $where, $order);
        return $this->RunSelect($sql);
    }

    public function selectInnerTrans($where = '', $order = '') {
        $sql = sprintf($this->sqlSelectInnerTrans, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
        $rs = $this->select(sprintf("and ID_Usuario='%s'", $this->getUser_ID()));
        $this->setUser_ID($rs[0]['ID_Usuario']);
        $this->setUser_ID($rs[0]['DSC_Login']);
        $this->setUser_ID($rs[0]['DSC_Senha']);
        $this->setUser_ID($rs[0]['DTM_Inicio']);
        $this->setUser_ID($rs[0]['DTM_Fim']);
        $this->setUser_ID($rs[0]['ID_SEG_Grupo']);
        return $this;
    }

    public function login($login, $senha) {
        $rs = $this->select(sprintf("and DSC_Login='%s' and DSC_Senha=md5('%s')", $login, $senha));
        if (!empty($rs)) {

            $this->setUser_ID($rs['ID_Usuario']);
            $this->setUser_ID($rs['DSC_Login']);
            $this->setUser_ID($rs['DSC_Senha']);
            $this->setUser_ID($rs['DTM_Inicio']);
            $this->setUser_ID($rs['DTM_Fim']);
            $this->setUser_ID($rs['ID_SEG_Grupo']);
        }
        return $this;
    }

    public function selectExists($login) {
        $sql = sprintf($this->sqlSelectExists, $login);
        return $this->RunQuery($sql);
    }

    public function selectID($where = '') {
        $sql = sprintf($this->sqlSelectID, $where);
        return $this->RunSelect($sql);
    }

    public function SelectUserID() {
        $sql = $this->selectID(sprintf("and DSC_Login='%s'", $this->getDSC_Login()));
        $this->setUser_ID($sql[0]['ID_Usuario']);
        return $this;
    }

}
