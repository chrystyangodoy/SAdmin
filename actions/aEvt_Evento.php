<?php

require './model/mEvt_Evento.php';

class aEvt_Evento extends mEvt_Evento {

    protected $sqlInsert = "INSERT INTO evt_evento(ID_EVT,DSC_Nome, DSC_Presidente, DT_Inicio, DT_Fim, COD_CNPJ_Promotora, DSC_Nome_Promotora, DSC_Presidente_Promotora, DSC_Endereco_Promotora, NUM_CEP_Promotora, DSC_Cidade_Promotora, NUM_Fone_Promotora, NUM_FAX_Promotora, DSC_EMAIL_Promotora, QTD_CargaHorariaMinima, ID_BSC_Local_Evento, COD_Tipo_Estado_promotora,isPromotora,ID_Banco) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    protected $sqlUpdate = "update evt_evento set DSC_Nome= '%s', DSC_Presidente= '%s', DT_Inicio= '%s', DT_Fim= '%s', COD_CNPJ_Promotora= '%s', DSC_Nome_Promotora= '%s', DSC_Presidente_Promotora= '%s', DSC_Endereco_Promotora= '%s', NUM_CEP_Promotora= '%s', DSC_Cidade_Promotora= '%s', NUM_Fone_Promotora= '%s', NUM_FAX_Promotora= '%s', DSC_EMAIL_Promotora= '%s', QTD_CargaHorariaMinima= '%s', ID_BSC_Local_Evento= '%s', COD_Tipo_Estado_promotora= '%s', isPromotora = '%s', ID_Banco = '%s', ID_Empresa = '%s' where ID_EVT = '%s'";
    protected $sqlDelete = "delete from evt_evento where ID_EVT = '%s'";
    protected $sqlSelect = "select * from evt_evento where 1=1 %s %s";
    protected $sqlInnerEventoLocal = "SELECT 	evento.ID_EVT, 
                                                evento.DSC_Nome, 
                                                DATE_FORMAT( evento.DT_Inicio , '%d/%m/%Y' ) as DT_Inicio, 
                                                DATE_FORMAT( evento.DT_Fim , '%d/%m/%Y' ) as DT_Fim, 
                                                localEvento.DSC_Endereco,
                                                localEvento.DSC_Bairro,
                                                localEvento.DSC_Cidade,
                                                localEvento.NUM_Fone,
                                                localEvento.DSC_EMAIL
                                    FROM        evt_evento as evento inner join bsc_local_evento as localEvento on (ID_BSC_Local_Evento = ID_BSC_Local_Evento) 
                                    WHERE       CURRENT_DATE() < DT_Fim";

        protected $sqlSelectXML = "SELECT	bsc_participante.COD_CPF,
                                        bsc_participante.DSC_Nome AS NOME_COMPLETO,
                                        evt_evento_participante.DSC_Nome_Crachav AS nomeCracha,
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
                                        bsc_participante.DSC_Profissao_Especialidade

                                FROM	bsc_participante 
                                                                LEFT JOIN 	evt_evento_participante ON(bsc_participante.ID_Participante = evt_evento_participante.ID_BSC_Participante)
                                                                LEFT JOIN	tb_tipo_estado	ON(bsc_participante.COD_Tipo_Estado = tb_tipo_estado.COD_TIPOEstado)
                                                LEFT JOIN	evt_evento_categoria ON(evt_evento_participante.ID_EVT_Categoria = evt_evento_categoria.ID_Evento_Categoria)
                                                LEFT JOIN	bsc_profissao	ON (bsc_participante.ID_BSC_Profissao = bsc_profissao.ID_Profissao)
                                WHERE	evt_evento_participante.ID_BSC_Participante = '%s'";

    
    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getID_EVT(), $this->getDSC_Nome(), $this->getDSC_Presidente(), $this->getDT_Inicio(), $this->getDT_Fim(), $this->getCOD_CNPJ_Promotora(), $this->getDSC_Nome_Promotora(), $this->getDSC_Presidente_Promotora(), $this->getDSC_Endereco_Promotora(), $this->getNUM_CEP_Promotora(), $this->getDSC_Cidade_Promotora(), $this->getNUM_Fone_Promotora(), $this->getNUM_FAX_Promotora(), $this->getDSC_EMAIL_Promotora(), $this->getQTD_CargaHorariaMinima(), $this->getID_BSC_Local_Evento(), $this->getCOD_Tipo_Estado_promotora(), $this->getisPromotora(), $this->getID_Banco(), $this->getID_Empresa());
        return $this->RunQuery($sql);
    }

    public function update() {
        $sql = sprintf($this->sqlUpdate, $this->getDSC_Nome(), $this->getDSC_Presidente(), $this->getDT_Inicio(), $this->getDT_Fim(), $this->getCOD_CNPJ_Promotora(), $this->getDSC_Nome_Promotora(), $this->getDSC_Presidente_Promotora(), $this->getDSC_Endereco_Promotora(), $this->getNUM_CEP_Promotora(), $this->getDSC_Cidade_Promotora(), $this->getNUM_Fone_Promotora(), $this->getNUM_FAX_Promotora(), $this->getDSC_EMAIL_Promotora(), $this->getQTD_CargaHorariaMinima(), $this->getID_BSC_Local_Evento(), $this->getCOD_Tipo_Estado_promotora(), $this->getisPromotora(), $this->getID_Banco(), $this->getID_Empresa(), $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function delete() {
        $sql = sprintf($this->sqlDelete, $this->getID_EVT());
        return $this->RunQuery($sql);
    }

    public function select($where = '', $order = '') {
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }

    public function load() {
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
        return $this;
    }

    public function SelectEventoEmdia() {
        return $this->RunSelect($this->sqlInnerEventoLocal);
    }

    public function geraXMLEvento($EventoID) {

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
    public function SelectXML($evento_ID){
        $rs = $this->RunSelect(sprintf($this->sqlSelectXML,$evento_ID));
        return $rs ;
    }
}