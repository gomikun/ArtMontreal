<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-10
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			switch ($_GET['requete']) {
				case 'accueil':
                    if($_GET['idOeuvre'] != '')
                    {
                        $this->unOeuvre($_GET['idOeuvre']);    
                    }
                    else
                    {
                        $this->accueil();
                    }
					break;
                
                case 'artistes':
                    if($_GET['idOeuvre'] != '')
                    {
                        $this->unOeuvre($_GET['idOeuvre']);    
                    }
                    else
                    {
                        $this->artistes();
                    }

                    break;
                    
                case 'listeModifierArtistes':
                        $this->listeModifierArtistes();
                    break;
                case 'listeEliminerArtistes':
                        $this->listeEliminerArtistes();
                    break;
                case 'modifierArtistes':
                        $this->modifierArtistes($_GET['idArtiste']);
                    break;
                case 'eliminerArtistes':
                        $this->eliminerArtistes($_GET['idArtiste']);
                    break;
                                    
                case 'inscription':
                    $this->inscription();
                    break;
                case 'connexion':
                    $this->connexion();
                    break;
                case 'recherche':
                    $this->rechercheOeuvre();
                    break;
                
                case 'arrondissements':
                    if($_GET['idArrondissement'] !='')
                    {
                        $this->oeuvresParArr($_GET['idArrondissement']);
                    }
                    else
                    {
                        $this->arrondissements();
                    } 
                    break;

                case 'unOeuvre':
                    $this->unOeuvre($_GET['idOeuvre']);
                    break;

                case 'categories':
                    $this->categories();
                    break;
                case 'oeuvresParCat':
                    $this->oeuvresParCat();
                    break;
                case 'oeuvresParArr';
                 	$this->oeuvresParArr();
                 	break;

                case 'admin':
                    $this->admin();
                    break;

                default:
			    $this->accueil();
				break;
			}
            
		}
		
        private function accueil()
		{
            $oOeuvres = new MOeuvres ('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $aOeuvres = $oOeuvres::listeOeuvres();
            $oVue = new VueDefaut();
			$oVue->afficheHeader();
            $oVue->afficheMoteurRecherche();
			$oVue->afficheAccueil($aOeuvres);
			$oVue->afficheFooter();
			
		} 

        private function unOeuvre($idget)
		{
            $oOeuvre = new MOeuvres ('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $oeuvre = $oOeuvre::listeUnOeuvre($idget);
            $oVue = new VueDefaut();
			$oVue->afficheHeader();
			$oVue->afficheUnOeuvre($oeuvre);
			$oVue->afficheFooter();
			
		}
		
		
         private function artistes()
		{
            $oArtistes = new MArtistes('', '', '' ,'', '', '');
            $oOeuvres = new MOeuvres ('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
              
            $aArtistes = $oArtistes::listeArtistes();
              
            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheMoteurRecherche();
			$oVue->afficheArtistes($aArtistes, $oOeuvres);
            $oVue->afficheFooter();
    
		}
    
        private function listeModifierArtistes()
		{
            $oArtistes = new MArtistes('', '', '' ,'', '', '');
            $aArtistes = $oArtistes::listeArtistes();
              
            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheMoteurRecherche();
			$oVue->afficheListeModifierArtistes($aArtistes);
            $oVue->afficheFooter();
    
		}
        private function listeEliminerArtistes()
		{
            $oArtistes = new MArtistes('', '', '' ,'', '', '');
            $aArtistes = $oArtistes::listeArtistes();
              
            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheMoteurRecherche();
			$oVue->afficheListeEliminerArtistes($aArtistes);
            $oVue->afficheFooter();
    
		}
    
        private function modifierArtiste($idArt)
        {
            
            
            
            
        }
    
        private function eliminerArtiste($idArt)
        {
            
            
            
        }
    
		private function arrondissements()
		{

			$oArrondisement = new MArrondissement('', '');
			//$aArrondissements = $oArrondisement::listeArrondissement($id_Arrondissement);
			$aArrondissements = $oArrondisement::listeArrondissement();

            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheMoteurRecherche();
			$oVue->afficheArrondissements($aArrondissements);
            $oVue->afficheFooter();
    
		}
    
		private function categories()
		{
            $oCategories = new MCategories('', '', '' ,'', '','');
            $aCategories = $oCategories::listeCategories();
            $oVue = new VueDefaut();

            $oVue->afficheHeader();
            $oVue->afficheMoteurRecherche();
			$oVue->afficheCategories($aCategories);
            $oVue->afficheFooter();
    
		}


        private function oeuvresParCat()
        {   
            $id_cat = $_GET['idCategorie'];
            $oOeuvreParCat = new MOeuvres('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $aOeuvreParCat = $oOeuvreParCat::listeOeuvresParCat($id_cat);

            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheOeuvre_Par_Cat($aOeuvreParCat);
            $oVue->afficheFooter();
    
        }

		private function oeuvresParArr($getIdArr)
        {   
            $oOeuvreParArr = new MOeuvres('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
            $aOeuvreParArr = $oOeuvreParArr::listerOeuvresParArr($getIdArr);

            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheOeuvre_Par_Arr($aOeuvreParArr);
            $oVue->afficheFooter();
        }
    
        private function inscription()
        {
          
            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheInscription();
            $oVue->afficheFooter();
            
        } 

        private function connexion()
        {
            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->afficheConnexion();
            $oVue->afficheFooter();
            
        } 

        private function rechercheOeuvre()
        {
            $oVue = new VueDefaut();
            $oVue->afficheHeader();
            $oVue->rechercheOeuvre();
            $oVue->afficheFooter();
                
        }
    
        private function admin()
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
            $oVue->afficheHeaderAdmin();
            
            if($_GET['action'] == 'ajoutOeuvre') {
                $oOeuvre = new MOeuvres('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                
                $oOeuvre->ajouterAdresse($_POST['adresse'], $_POST['batiment'], $_POST['parc'], $_POST['latitude'], $_POST['longitude']);
                $idAdresse = $oOeuvre->recupererDernierId();
                                         
                try
                {
                    $oOeuvre->ajouterOeuvre($_POST['titre'], $_POST['titreVariante'],  $_POST['technique'], $_POST['techniqueAng'], $_POST['description'], $_POST['validation'], $_POST['arrondissement'], $idAdresse, $_POST['artiste'], $_POST['categorie'], $_POST['sousCategorie'], $_POST['materiaux'], $_POST['materiauxAng']);
                
                $message = "Oeuvre ajoutée.";
                    
                }
                catch (Exception $e)
                {
                    $message = $e->getMessage();     
                }
                
            }
            
            $oVue->afficheContenuAdmin($aArtistes, $aCategories, $aArrondissements, $aSousCategories, $erreurTitre, $message);
            $oVue->afficheFooter();

        }

}
?>