<?php
include "Offer.php";
class Szolgaltato
{
    protected $id;
    protected $nev;
    protected $cim;
    protected $cege;
    protected $szolgaltatasok;
    private $ertekeles;
    private $ertekelesek;
    private $i=0;

    /**
     * @param $nev
     * @param $cim
     * @param $cege
     * @param $szolgaltatasok
     */
    public function __construct($nev, $cim, $cege,$szolgaltatasok)
    {
        $this->nev = $nev;
        $this->cim = $cim;
        $this->cege = $cege;
        $this->szolgaltatasok = $szolgaltatasok;
    }
    public function addOffer($AdId,$price,$discription){
        $offer=new Offer($AdId,$price,$discription);
    }

    /**
     * @return mixed
     */
    public function getErtekeles()
    {
        return $this->ertekeles;
    }

    /**
     * @param mixed $ertekeles
     */
    public function setErtekeles($ertekeles): void
    {
        $this->i++;
        $this->ertekeles+=$ertekeles;
        $this->ertekeles = $this->ertekeles/$this->i;
    }




}
