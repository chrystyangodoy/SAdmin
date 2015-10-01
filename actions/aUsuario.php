<?php

require './model/mUsuario.php';

class aUsuario extends mUsuario {

    protected $sqlInsert = "INSERT INTO seg_usuario(ID_Usuario,DSC_Login, DSC_Senha, DTM_Inicio, DTM_Fim, ID_SEG_Grupo) VALUES ('%s','%s',MD5('%s'),'%s','%s','%s')";
    protected $sqlUpdate = "UPDATE seg_usuario set DSC_Login = '%s',DSC_Senha= '%s',DTM_Inicio= '%s' as DTM_Inicio,DTM_Fim= '%s' as DTM_Fim, ID_SEG_Grupo='%s' where ID_Usuario = '%s'";
    protected $sqlDelete = "DELETE FROM seg_usuario WHERE ID_Usuario = '%s'";
    protected $sqlSelect = "SELECT *  FROM seg_usuario WHERE 1=1 %s %s";
    protected $sqlSelectInnerGrupo = "SELECT *,seg_grupo.ID_Grupo,seg_grupo.DSC_Nome from seg_usuario inner join seg_grupo on (seg_usuario.ID_SEG_Grupo = seg_grupo.ID_Grupo) where 1=1 %s %s";
    protected $sqlSelectInnerTrans = "SELECT *,seg_detalhe_transacao.COD_TIPO_Origem_Transacao seg_detalhe_transacao.COD_Tipo_Sistema_Transacao,seg_detalhe_transacao.DSC_Login_Transacao from seg_usuario inner join seg_detalhe_transacao on (seg_usuario.ID_Usuario = seg_detalhe_transacao.ID_SEG_Usuario) where 1=1 %s %s";
    protected $sqlSelectExists = "SELECT count(*) FROM seg_usuario WHERE 1=1 and DSC_Login='%s'";
    protected $sqlSelectID = "SELECT ID_Usuario FROM seg_usuario WHERE 1=1 and DSC_Login=%s";
    protected $sqlUpdateSenha = "UPDATE seg_usuario set DSC_Senha= MD5('%s') where ID_Usuario = '%s'";

    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_Usuario(), $this->getDSC_Login(), $this->getDSC_Senha(), $this->getDTM_Inicio(true), $this->getDTM_Fim(true), $this->getID_SEG_Grupo());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Login(), $this->getDSC_Senha(), $this->getDTM_Inicio(true), $this->getDTM_Fim(true), $this->getID_SEG_Grupo(), $this->getID_Usuario());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_Usuario());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function loginAc($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunLog($sql);
    }

    public function selectInnerGrupo($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelectInnerGrupo, $where, $order);
        return $this->RunSelect($sql);
    }

    public function selectInnerTrans($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelectInnerTrans, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID_Usuario='%s'", $this->getID_Usuario()));
        $this->setID_Usuario($rs[0]['ID_Usuario']);
        $this->setDSC_Login($rs[0]['DSC_Login']);
        $this->setDSC_Senha($rs[0]['DSC_Senha']);
        $this->setDTM_Inicio($rs[0]['DTM_Inicio']);
        $this->setDTM_Fim($rs[0]['DTM_Fim']);
        $this->setID_SEG_Grupo($rs[0]['ID_SEG_Grupo']);
        return $this;
    }

    public function login($login, $senha)
    {
        $rs = $this->select(sprintf("and DSC_Login='%s' and DSC_Senha=md5('%s')", $login, $senha));
        if (!empty($rs))
        {
            $ID_Usuario = $rs[0]['ID_Usuario'];
            $DSC_Login = $rs[0]['DSC_Login'];
            $DSC_Senha = $rs[0]['DSC_Senha'];
            $DTM_Inicio = $rs[0]['DTM_Inicio'];
            $DTM_Fim = $rs[0]['DTM_Fim'];
            $ID_SEG_Grupo = $rs[0]['ID_SEG_Grupo'];

            $this->setID_Usuario($ID_Usuario);
            $this->setDSC_Login($DSC_Login);
            $this->setDSC_Senha($DSC_Senha);
            $this->setDTM_Inicio($DTM_Inicio);
            $this->setDTM_Fim($DTM_Fim);
            $this->setID_SEG_Grupo($ID_SEG_Grupo);
        }
        return $this;
    }

    public function selectExists($login)
    {
        $sql = sprintf($this->sqlSelectExists, $login);
        return $this->RunQuery($sql);
    }

    public function selectID($where = '')
    {
        $sql = sprintf($this->sqlSelectID, $where);
        return $this->RunID($sql);
    }

    public function SelectUserID()
    {
        $sql = $this->selectID(sprintf("and DSC_Login='%s'", $this->getDSC_Login()));
        $ID_Usuario = $sql[0]['ID_Usuario'];
        return $this;
    }

    public function updateSenha()
    {
        require ('./actions/aBsc_Participante.php');
        $partic = new aBsc_Participante();
        require ('./config/geraSenha.php');
        $gerasenha = new geraSenha();
        $senha = $gerasenha->geraSenha(6);

        $rs = $this->select(sprintf("and DSC_Login='%s'", $this->getDSC_Login()));

        if (!empty($rs))
        {
            $ID_Usuario = $rs[0]['ID_Usuario'];
            $DSC_Login = $rs[0]['DSC_Login'];

            $partic->selectInfoPartic($ID_Usuario);

            $sql = sprintf($this->sqlUpdateSenha, $senha, $ID_Usuario);

            $ass = "Nova Senha gerada com sucesso!";
            $mens = ("Seu usuário é " . $DSC_Login . "  e sua senha agora é " . $senha . ".");
            require_once './config/eMail.php';
            $emailObj = new eMail();

            $envio = $emailObj->enviarEMail($partic->getDSC_Email(), $partic->getDSC_Nome(), $ass, $mens);
            return $this->RunQuery($sql);
        }
        return false;
    }

}
