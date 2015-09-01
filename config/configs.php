<?php
class configs{
    public function dateToBR($dataAmericana){
        //2015-09-01
        $d = explode('-',$dataAmericana);
        $dbr = $d[2].'/'.$d[1].'/'.$d[0];
        return $dbr;
        }
    public function dateToUS($dataBrasil){
        $d = explode('-',$dataBrasil);
        $dam = $d[2].'/'.$d[1].'/'.$d[0];
        return $dam;
        }
    public function dateTimeToBR($dataTimeAmericana){
        //2015-09-01
        $d = explode(' ',$dataTimeAmericana);
        $dtbr = $this->dateToBR($d[0].' '.$d[1]);
        return $dbr;
        }
    public function dateTimeToUS($dataTimeBrasil){
        $d = explode(' ',$dataTimeBrasil);
        $dtam = $this->dateToUS($d[0].' '.$d[1]);
        return $dam;
        } 
        
}
