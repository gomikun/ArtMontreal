<?php

/**
 * Controlleur AJAX. Ce fichier est la porte d'entrée des requêtes AJAX (XHR)
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-03-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

	require_once("./config.php");

    switch($_GET['requete'])
    {
        case 'chargerPlusOeuvres': 
            chargerPlusOeuvres();
            break;

        case 'artistes':
        artisteParLettre($_GET['lettre']);
        break;
        
    }

   

    
    
   
    
    
/*

    function ajoutOeuvre()
    {
        
        $erreurTitre ='';
        $message ='';

        $oArtistes = new MArtistes('', '', '' ,'', '', '');
        $aArtistes = $oArtistes::listeArtistes();

        $oCategories = new MCategories('', '', '' ,'', '','');
        $aCategories = $oCategories::listeCategories();

        $oSousCategories = new MSousCategories('', '', '', '');
        $aSousCategories = $oSousCategories::listeSousCategories();

        $oArrondissements = new MArrondissement('', '');
        $aArrondissements = $oArrondissements::listeArrondissement();
        
        $oVue = new VueDefaut();
        $oVue->;
    }*/

   //  private function chargerPlusOeuvres()
		//{
            
            //var_dump(chargerPlusOeuvres());
            
           // $oOeuvres = new MOeuvres('', '', '','', '', '', '', '', '', '', '', '', '','','','','','');
            
           // $aOeuvres = $oOeuvres->listeOeuvres();
            
//            if($nbreOeuvres !=0) {
//                $aOeuvres = $oOeuvres->listeOeuvres();
//            } else {
//                $aOeuvres = '';
//            }
          // $oVueDefaut = new VueDefaut();
            //$oVueAdmin = new VueAdmin();
            
			//$oVueDefaut->chargerPlusOeuvres($aOeuvres);
           
    
		//}




function artisteParLettre($lettre)

    {   

        $oArtisteParLettre=new MArtistes('', '', '' ,'', '', '');
        $aArtisteParLettre = $oArtisteParLettre->artisteParLettre($lettre);
        $oVue = new VueDefaut();
        $oVue->afficheArtisteParLettre($aArtisteParLettre);

    }








?>