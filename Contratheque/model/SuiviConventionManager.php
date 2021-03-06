<?php

namespace Contratheque\Model; // La classe sera dans ce namespace

require_once("model/DB.php");

// class pour y regrouper toutes nos fonctions qui concernent les posts
class SuiviConventionManager extends DB
{
    
    // fonction pour Afficher l'historique des commentaires de modification du client en fonction de son SIRET
    public function readDernierSuiviConvention($siret_client)
    {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->getPDO();
    
        $req = $db->prepare('SELECT auteur_conv, statut_conv, commentaire_conv, siret_info_convention, DATE_FORMAT(datetime_conv, \'%d/%m/%Y %Hh%imin%ss\') AS datetime_conv_fr FROM suivi_convention, informations_convention WHERE id_info_convention = id_info_suivi_convention AND siret_info_convention = ? ORDER BY datetime_conv_fr DESC');
        $req->execute(array($siret_client)); 
        $postSuiviConvention = $req->fetch();   

        return $postSuiviConvention;
    }

    // fonction pour Afficher l'historique des commentaires de modification du client en fonction de son SIRET
    public function readHistoriqueSuiviConvention($siret_client)
        {
        // Connexion à la base de données rappelle de la fonction
        $db = $this->getPDO();
        
        $req = $db->prepare('SELECT auteur_conv, statut_conv, commentaire_conv, siret_info_convention, DATE_FORMAT(datetime_conv, \'%d/%m/%Y %Hh%imin%ss\') AS datetime_conv_fr FROM suivi_convention, informations_convention WHERE id_info_convention = id_info_suivi_convention AND siret_info_convention = ? ORDER BY datetime_conv_fr DESC');
        $req->execute(array($siret_client)); 
        $postHistoriqueSuiviConvention = $req->fetchAll();   

        return $postHistoriqueSuiviConvention;
        }
}