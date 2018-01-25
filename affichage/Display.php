<?php

/**
 * Created by PhpStorm.
 * User: Sami
 * Date: 23-01-18
 * Time: 14:03
 */
class Display
{
    private $idTeam;
    private $tableau_groupe = array();


    public function __construct($idTeam)
    {
        $this->idTeam = $idTeam;
    }


    public function affichageMembresParTeam()
    {
        $s = (' pas de donnees a afficher');

        $tableau = array('team1','team2','team3','team4','team5');
        if ($data = fopen('data_groupe'.$this->idTeam.'.txt','r'))
        {
            while (!feof($data))
            {
                $Name = fgets($data);
                if(!empty($Name))
                    array_push($this->tableau_groupe,$Name);
            }
            fclose($data);
        }
        $NbreData = sizeof($this->tableau_groupe);//nombre de membres dans le tableau de groupe
        // affichage
        echo '<h3>il existe  ' .$NbreData. '  membres dans '.$tableau[$this->idTeam-1].'<h3><br><br>';
        if (!empty($NbreData))
        {
            for ($i=0; $i< $NbreData; $i++)
            {
                echo $this->tableau_groupe[$i].'<br>';
            }

        } else
        {
            echo '<h1>' .$s. '</h1>';
        }
    }

    /**
     * @return array
     */
    public function getTableauGroupe()
    {

        return $this->tableau_groupe;
    }

    /**
     * @return mixed
     */
    public function getNombreMembres()
    {
        return sizeof($this->tableau_groupe);
    }
}