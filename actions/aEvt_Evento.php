<?php

require './model/mEvt_Evento.php';

class aEvt_Evento extends mEvt_Evento {

    protected $sqlInsert = "INSERT INTO evt_evento(ID_EVT, DSC_Nome, DSC_Presidente, DT_Inicio, DT_Fim, COD_CNPJ_Promotora, DSC_Nome_Promotora, DSC_Presidente_Promotora, DSC_Endereco_Promotora, NUM_CEP_Promotora, DSC_Cidade_Promotora, NUM_Fone_Promotora, NUM_FAX_Promotora, DSC_EMAIL_Promotora, QTD_CargaHorariaMinima, ID_BSC_Local_Evento, COD_Tipo_Estado_promotora, isPromotora, ID_Banco, ID_Empresa, Logo_Evento, Ctrl_Inscricao, Cod_Evento) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento set DSC_Nome= '%s', DSC_Presidente= '%s', DT_Inicio= '%s', DT_Fim= '%s', COD_CNPJ_Promotora= '%s', DSC_Nome_Promotora= '%s', DSC_Presidente_Promotora= '%s', DSC_Endereco_Promotora= '%s', NUM_CEP_Promotora= '%s', DSC_Cidade_Promotora= '%s', NUM_Fone_Promotora= '%s', NUM_FAX_Promotora= '%s', DSC_EMAIL_Promotora= '%s', QTD_CargaHorariaMinima= '%s', ID_BSC_Local_Evento= '%s', COD_Tipo_Estado_promotora= '%s', isPromotora = '%s', ID_Banco = '%s', ID_Empresa = '%s', Logo_Evento = '%s',Ctrl_Inscricao = '%s', Cod_Evento='%s' where ID_EVT = '%s'";
    protected $sqlDelete = "delete from evt_evento where ID_EVT = '%s'";
    protected $sqlSelect = "select * from evt_evento where 1=1 %s %s";
    protected $sqlInnerEventoLocal = "SELECT 	evento.ID_EVT, 
                                                evento.DSC_Nome,
                                                evento.Logo_Evento,
                                                evento.Cod_Evento,
                                                DATE_FORMAT( evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, 
                                                DATE_FORMAT( evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, 
                                                localEvento.DSC_Endereco,
                                                localEvento.DSC_Bairro,
                                                localEvento.DSC_Cidade,
                                                localEvento.NUM_Fone,
                                                localEvento.DSC_EMAIL
                                    FROM        evt_evento as evento left join bsc_local_evento as localEvento on (ID_BSC_Local_Evento = ID_BSC_Local_Evento) 
                                    WHERE       CURRENT_DATE() < DT_Fim";
    
    protected $sqlSelectXML = "SELECT bsc_participante.COD_CPF,
		bsc_participante.DSC_Nome AS NOME_COMPLETO,
		evt_evento_participante.DSC_Nome_Cracha as nomeCracha,
		bsc_participante.DSC_EMAIL,
		bsc_participante.NUM_Fone,
		bsc_participante.NUM_Celular,
		bsc_participante.DSC_Endereco,
		bsc_participante.DSC_Bairro,
		bsc_participante.NUM_CEP,
		bsc_participante.DSC_Cidade,
		tb_tipo_estado.DSC_Nome AS UF,
		evt_evento_categoria.DSC_Nome categoria,
		bsc_profissao.DSC_Nome profissao,
		bsc_participante.DSC_Profissao_Especialidade,
		evt_evento_participante.VLR_Total,
                evt_evento_participante.Num_Inscricao,
		evt_pagamento.COD_Tipo_Situacao_Pagamento,
                evt_evento_participante.DataInscricao
                                FROM	bsc_participante 
								LEFT JOIN 	evt_evento_participante ON(bsc_participante.ID_Participante = evt_evento_participante.ID_BSC_Participante)
								LEFT JOIN	tb_tipo_estado	ON(bsc_participante.COD_Tipo_Estado = tb_tipo_estado.COD_TIPOEstado)
								LEFT JOIN	evt_evento_categoria ON(evt_evento_participante.ID_EVT_Categoria = evt_evento_categoria.ID_Evento_Categoria)
								LEFT JOIN	bsc_profissao	ON (bsc_participante.ID_BSC_Profissao = bsc_profissao.ID_Profissao)                                                
                                LEFT JOIN   evt_pagamento on evt_evento_participante.ID_EVT_Evento_Pariticipante = evt_pagamento.ID_EVT_Evento
                                WHERE	evt_evento_participante.ID_EVT_Evento = '%s'";
    
    protected $sqlSelectXMLBoleto = "SELECT	bsc_banco.numero_documento,
                                                evt_pagamento.QTD_Parcelas,
                                                evt_pagamento.VLR_Transacao,
                                                'N' as situacao, 
                                                evt_pagamento.DT_Transacao 
                                        FROM 	evt_pagamento 
                                                                                        LEFT JOIN evt_pagamento_boleto on evt_pagamento.ID_Pagamento = evt_pagamento_boleto.ID_EVT_Pagamento
                                                                                        LEFT JOIN evt_evento ON evt_evento.ID_EVT = evt_pagamento.ID_EVT_Evento
                                                                                        LEFT JOIN bsc_banco ON bsc_banco.ID = evt_evento.ID_Banco
                                        WHERE	evt_evento.ID_EVT = '%s'";
    //IMPLEMENTAR CRUDS CURSO RELACIONADO AO EVENTO.
    protected $sqlSelectXMLCurso = "";
    //IMPLEMENTAR CRUDS CURSO RELACIONADO AO EVENTO.
    
    protected $sqlUpdateCtrl_Insc = "update evt_evento set Ctrl_Inscricao = '%s' where ID_EVT = '%s'";

    protected $sqlWbEventoLocal = "SELECT 	evento.ID_EVT , 
                                                evento.DSC_Nome as DSC_Nome,
                                                evento.Logo_Evento,
                                                evento.Cod_Evento,
                                                DATE_FORMAT(evento.DT_Inicio ,'%d/%m/%Y') as DT_Inicio, 
                                                DATE_FORMAT(evento.DT_Fim ,'%d/%m/%Y') as DT_Fim, 
                                                localEvento.DSC_Endereco,
                                                localEvento.DSC_Bairro,
                                                localEvento.DSC_Cidade,
                                                localEvento.NUM_Fone,
                                                localEvento.DSC_EMAIL
                                    FROM        evt_evento as evento left join bsc_local_evento as localEvento on (ID_BSC_Local_Evento = ID_BSC_Local_Evento) 
                                    WHERE       CURRENT_DATE() < DT_Fim and ID_EVT = '%s'";
    protected $CheckVincEventoPagto =  
            "SELECT ID_EVT, DSC_Nome FROM evt_evento 
             WHERE evt_evento.ID_EVT not in (SELECT evento_condpagamento.ID_EVT
                                            FROM evento_condpagamento 
                        WHERE evento_condpagamento.Cod_TipoPagamento = '%s')";
    
    public function insert()
    {
        $sql = sprintf($this->sqlInsert, $this->getID_EVT(), $this->getDSC_Nome(), $this->getDSC_Presidente(), $this->getDT_Inicio(true), $this->getDT_Fim(true), $this->getCOD_CNPJ_Promotora(), $this->getDSC_Nome_Promotora(), $this->getDSC_Presidente_Promotora(), $this->getDSC_Endereco_Promotora(), $this->getNUM_CEP_Promotora(), $this->getDSC_Cidade_Promotora(), $this->getNUM_Fone_Promotora(), $this->getNUM_FAX_Promotora(), $this->getDSC_EMAIL_Promotora(), $this->getQTD_CargaHorariaMinima(), $this->getID_BSC_Local_Evento(), $this->getCOD_Tipo_Estado_promotora(), $this->getisPromotora(), $this->getID_Banco(), $this->getID_Empresa(), $this->getLogo_Evento(), $this->getCtrl_Inscricao(), $this->getCod_Evento());
        return $this->RunQuery($sql);
    }

    public function update()
    {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Presidente(), $this->getDT_Inicio(true), $this->getDT_Fim(true), $this->getCOD_CNPJ_Promotora(), $this->getDSC_Nome_Promotora(), $this->getDSC_Presidente_Promotora(), $this->getDSC_Endereco_Promotora(), $this->getNUM_CEP_Promotora(), $this->getDSC_Cidade_Promotora(), $this->getNUM_Fone_Promotora(), $this->getNUM_FAX_Promotora(), $this->getDSC_EMAIL_Promotora(), $this->getQTD_CargaHorariaMinima(), $this->getID_BSC_Local_Evento(), $this->getCOD_Tipo_Estado_promotora(), $this->getisPromotora(), $this->getID_Banco(), $this->getID_Empresa(), $this->getLogo_Evento(), $this->getCtrl_Inscricao(), $this->getCod_Evento(), $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function delete()
    {
        $sql = sprintf($this->sqlDelete, $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '')
    {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load()
    {
        $rs = $this->select(sprintf("and ID_EVT='%s'", $this->getID_EVT()));
        $this->setID_EVT($rs[0]['ID_EVT']);
        $this->setDSC_Nome($rs[0]['DSC_Nome']);
        $this->setDSC_Presidente($rs[0]['DSC_Presidente']);
        $this->setDT_Inicio($rs[0]['DT_Inicio']);
        $this->setDT_Fim($rs[0]['DT_Fim']);
        $this->setCOD_CNPJ_Promotora($rs[0]['COD_CNPJ_Promotora']);
        $this->setDSC_Nome_Promotora($rs[0]['DSC_Nome_Promotora']);
        $this->setDSC_Presidente_Promotora($rs[0]['DSC_Presidente_Promotora']);
        $this->setDSC_Endereco_Promotora($rs[0]['DSC_Endereco_Promotora']);
        $this->setNUM_CEP_Promotora($rs[0]['NUM_CEP_Promotora']);
        $this->setDSC_Cidade_Promotora($rs[0]['DSC_Cidade_Promotora']);
        $this->setNUM_Fone_Promotora($rs[0]['NUM_Fone_Promotora']);
        $this->setNUM_FAX_Promotora($rs[0]['NUM_FAX_Promotora']);
        $this->setDSC_EMAIL_Promotora($rs[0]['DSC_EMAIL_Promotora']);
        $this->setQTD_CargaHorariaMinima($rs[0]['QTD_CargaHorariaMinima']);
        $this->setID_BSC_Local_Evento($rs[0]['ID_BSC_Local_Evento']);
        $this->setCOD_Tipo_Estado_promotora($rs[0]['COD_Tipo_Estado_promotora']);
        $this->setisPromotora($rs[0]['isPromotora']);
        $this->setID_Banco($rs[0]['ID_Banco']);
        $this->setID_Empresa($rs[0]['ID_Empresa']);
        $this->setLogo_Evento($rs[0]['Logo_Evento']);
        $this->setCtrl_Inscricao($rs[0]['Ctrl_Inscricao']);
        $this->setCod_Evento($rs[0]['Cod_Evento']);
        return $this;
    }

    public function SelectEventoEmdia()
    {
        return $this->RunSelect($this->sqlInnerEventoLocal);
    }

    public function geraXMLEvento($EventoID)
    {

        $this->setID_EVT($EventoID);

        $this->load();

        #versao do encoding xml
        $dom = new DOMDocument("1.0", "windows-1252");
        #retirar os espacos em branco
        $dom->preserveWhiteSpace = false;
        #gerar o codigo
        $dom->formatOutput = true;
        #criando o nó principal (DadosCMATO)
        $root = $dom->createElement("DadosCMATO");

        #setanto nomes e atributos dos elementos xml (nós)
        $nomeEvento = $dom->createElement("nomeEvento", $this->getDSC_Nome());

        $dataAtual = $DateOfRequest = date("d-m-Y H:i:s", strtotime($_REQUEST["DateOfRequest"]));

        date_default_timezone_set($timezone_identifier);

        $dataHoraGeracao = $dom->createElement("dataHoraGeracao", $dataAtual);

        $participantes = $dom->createElement("participantes");

        $boletos = $dom->createElement("boletos");

        $root->appendChild($nomeEvento);
        $root->appendChild($dataHoraGeracao);
        $root->appendChild($nomeEvento);
        $root->appendChild($participantes);
        $root->appendChild($boletos);

        $dom->appendChild($root);

        # Para salvar o arquivo, descomente a linha
        $dom->save("evento.xml");

//        #cabeçalho da página
//
//        header("Content-Type: text/xml");
//
//        # imprime o xml na tela
//
//        print $dom->saveXML();
    }

    public function SelectXML($evento_ID)
    {
        $sql = sprintf($this->sqlSelectXML, $evento_ID);
        $rs = $this->RunSelect($sql);
        return $rs;
    }

    public function SelectXMLBoelto($evento_ID)
    {
        $sql = sprintf($this->sqlSelectXMLBoleto, $evento_ID);
        $rs = $this->RunSelect($sql);
        return $rs;
    }
    
    public function SelectXMLCurso($evento_ID)
    {
        $sql = sprintf($this->sqlSelectXMLCurso, $evento_ID);
        $rs = $this->RunSelect($sql);
        return $rs;
    }

    public function countEvt()
    {
        $COUNT = $this->RunSelect("SELECT COUNT(ID_EVT)+1 as COUNT FROM evt_evento");
        return $COUNT[0]['COUNT'];
    }

    public function updateCtrl_Insc($NroInscricao, $IDVento)
    {
        $sql = sprintf($this->sqlUpdateCtrl_Insc, $NroInscricao, $IDVento);
        return $this->RunQuery($sql);
    }

    public function wbEvento($evento_ID)
    {
        $sql = sprintf($this->sqlWbEventoLocal, $evento_ID);
        return $this->RunQuery($sql);
        
    }
    
    public function CheckVincEventoPagto($CodFpgto) {
        $sql = sprintf($this->CheckVincEventoPagto, $CodFpgto);
        return $this->RunSelect($sql);
    }
    
}
