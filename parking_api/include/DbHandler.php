<?php

/**
 * Classe pour gérer toutes les opérations de db
 * Cette classe aura les méthodes CRUD pour les tables de base de données
 *
date_default_timezone_set("Africa/Algiers");
 */
require '.././libs/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();



//  $logDate = new DateTime();
$logWriter = new \Slim\LogWriter(fopen('.././logs/'.'errors.log', 'a'));
$logger = new \Slim\Slim(array('log.writer' => $logWriter , 'log.level' => \Slim\Log::DEBUG));
$logger = $logger->log;


date_default_timezone_set('Africa/Algiers');


class DbHandler
{




    private $conn;

    function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';
        //Ouverture connexion db
        $db = new DbConnect();
        $this->conn = $db->connect();

    }


    public function  insertHisto($code,$date_scan,$type,$statut)
    {

        $stmtInsrtHisto=$this->conn->prepare("INSERT INTO historique (code, date_scan,type_scan,statut) VALUES
        ('$code', '$date_scan', '$type',$statut) ");

        //echo "INSERT INTO historique (code, date_scan,type_scan) VALUES('$code', '$date_scan', '$type') ";
        if (!$stmtInsrtHisto) {

            global $logger;
            $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " controlAccessPassag()" . mysqli_error($this->conn));

        }
        $stmtInsrtHisto->execute();


    }
    public function updateStatut($numAbonne,$statut)
    {

        $stmtUPDTSTATUT=$this->conn->prepare("UPDATE abonnes SET statut=$statut WHERE code= '$numAbonne' ");
        if (!$stmtUPDTSTATUT) {

            global $logger;
            $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " controlAccessPassag()" . mysqli_error($this->conn));
            return NULL;

        }
        if ($stmtUPDTSTATUT->execute()) {

            //$rsltUpdtStatut=$stmtUPDTSTATUT->execute();

            $stmtUPDTSTATUT->close();
        }

    }

    public function accesZone($zone,$type)
    {
        $stmt1 = $this->conn->prepare("SELECT NB_PLACES_DISPO from niveau 
              where LIBELLE_NIVEAU='$zone' ");

        $stmt1->execute();
        $rslt = $stmt1->get_result();
        $stmt1->close();

        while ($row_data = $rslt->fetch_assoc()) {
            # Action to do
            $rsltTrouve = $row_data['NB_PLACES_DISPO'];
        }

        if($type=='entree')
        {

            $stmt2= $this->conn->prepare("UPDATE niveau set NB_PLACES_DISPO= NB_PLACES_DISPO-1 
              where LIBELLE_NIVEAU='$zone' AND NB_PLACES_DISPO > 0");
            $stmt2->execute();
            if($rsltTrouve==0)
            {
                echo "0";
            }

        }
        elseif ($type=='sortie')
        {
            $stmt33= $this->conn->prepare("select NB_PLACES_MAX from niveau where LIBELLE_NIVEAU='$zone'");
            $stmt33->execute();
            $rslt33 = $stmt33->get_result();
            $stmt33->close();
            while ($row_data = $rslt33->fetch_assoc()) {
                # Action to do
                $max = $row_data['NB_PLACES_MAX'];
            }







            $stmt2= $this->conn->prepare("UPDATE niveau set NB_PLACES_DISPO= NB_PLACES_DISPO+1 where LIBELLE_NIVEAU='$zone' AND NB_PLACES_DISPO < '$max' ; ");
            $stmt2->execute();
            if($rsltTrouve==$row_data['NB_PLACES_MAX']){
                echo "0";
            }
        }
    }
    public function retourProcessing($zone)
    {
        $stmt1 = $this->conn->prepare("SELECT NB_PLACES_DISPO from niveau 
              where LIBELLE_NIVEAU='$zone' ");

        $stmt1->execute();
        $rslt = $stmt1->get_result();
        $stmt1->close();

        while ($row_data = $rslt->fetch_assoc()) {
            # Action to do
            $rsltTrouve = $row_data['NB_PLACES_DISPO'];
        }
        return $rsltTrouve;
    }

    public function controlAccessAbonne($numAbonne,$todayDate,$type)
    {
        if($type=='sortie')
        {
            $stmtCheckAbonne = $this->conn->prepare("SELECT id,statut FROM abonnes WHERE code= '$numAbonne' ");
            $stmtCheckAbonne->execute();
            $abonne = $stmtCheckAbonne->get_result();
            $stmtCheckAbonne->close();

            while ($row_data = $abonne->fetch_assoc()) {
                # Action to do
                $statutTrouve = $row_data['statut'];
                $idAbonne=$row_data['id'];
            }
            if ($statutTrouve == 1)
            {
                echo "20";
                $rsltUpdtStatut= $this->updateStatut($numAbonne,0);
                //enregistrement dans la table historique


                $retourInsrtHisto=$this->insertHisto($numAbonne,$todayDate,$type,0);
            }



        }
        //
        elseif ($type=='entree')
        {
            $stmtCheckplaceMax = $this->conn->prepare("SELECT count(ID) as nbre FROM niveau WHERE etat='accessible'");

            $stmtCheckplaceMax->execute();
            $zoneAccessible = $stmtCheckplaceMax->get_result();
            $stmtCheckplaceMax->close();

            while ($row_data = $zoneAccessible->fetch_assoc()) {
                # Action to do
                $rsltTrouve = $row_data['nbre'];
            }
            if($rsltTrouve>0)
            {
                $stmtCheckAbonne = $this->conn->prepare("SELECT id,statut FROM abonnes WHERE code= '$numAbonne' "); // requete qui vérifie directement si cet abonné existe ou pas
                $statutTrouve = -1;
                if (!$stmtCheckAbonne) {

                    global $logger;
                    $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " controlAccessPassag()" . mysqli_error($this->conn));
                    return NULL;
                }
                if ($stmtCheckAbonne->execute()) {

                    $stmtCheckAbonne->execute();
                    $abonne = $stmtCheckAbonne->get_result();
                    $stmtCheckAbonne->close();

                    while ($row_data = $abonne->fetch_assoc()) {
                        # Action to do
                        $statutTrouve = $row_data['statut'];
                        $idAbonne=$row_data['id'];
                    }

                    if ($statutTrouve == -1) {
                        //cet abonne n existe pas
                        echo "-1";
                    } else {
                        if ($statutTrouve == 1) {
                            //Cet abonne est deja dans un parking
                            echo "2";
                        } else if ($statutTrouve == 0) {
                            $checkDateResult = -1;
                            //verification de date<
                            $stmtCheckDate = $this->conn->prepare("SELECT id FROM abonnes WHERE date_debut<= '$todayDate' and date_fin>='$todayDate' and code='$numAbonne'");


                            if (!$stmtCheckDate) {
                                global $logger;
                                $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " controlAccessPassag()" . mysqli_error($this->conn));
                                return NULL;
                            }
                            if ($stmtCheckDate->execute()) {
                                $stmtCheckDate->execute();
                                $resultCheckDate = $stmtCheckDate->get_result();
                                $stmtCheckDate->close();

                                while ($row_data = $resultCheckDate->fetch_assoc()) {
                                    # Action to do
                                    $checkDateResult = $row_data['id'];
                                }
                                if ($checkDateResult == -1) {
                                    //acces refuse
                                    echo "0";
                                    $this->insertHisto($numAbonne,$todayDate,$type,1);
                                } elseif ($checkDateResult != -1) {
                                    $Dayofweek = date("w");
                                    $hour = date("H:i");
                                    //echo $hour;
                                    $stmtCheckHour = $this->conn->prepare("SELECT count(id) as result1 FROM plageAbonne WHERE heure_debut<= '$hour' and heure_fin>='$hour' and jour=$Dayofweek and id_abonne='$idAbonne' and acces=1");

                                    if(!$stmtCheckHour)
                                    {

                                    }
                                    if($stmtCheckHour->execute())
                                    {
                                        $resultCheckHour=$stmtCheckHour->get_result();
                                        while ($row_data1 = $resultCheckHour->fetch_assoc()) {
                                            # Action to do
                                            $countResult = $row_data1['result1'];
                                        }

                                    }
                                    //echo "count:".$countResult;
                                    //ici se fera le controle pour les heures de LA JOURNEE
                                    //accee autorise
                                    if($countResult==0)
                                    {
                                        echo "0";
                                    }
                                    else{
                                        echo "20";
                                        echo  $this->updateStatut($numAbonne,1);
                                        echo $this->insertHisto($numAbonne,$todayDate,$type,1);
                                    }


                                }
                            }
                        }
                    }

                }
            }
            elseif ($rsltTrouve==0)
            {
                global $logger;
                $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " controlAccessPassag()" . mysqli_error($this->conn));
                return NULL;
            }


        }// fin elseeeeeeeeeeee
        //---------------------------




    }

    public function incrementZone()
    {

    }

//    public function insertRapport($JsonRapport)
//    {
//
//        $t=json_decode($JsonRapport,true);
//        //var_dump($t);
//        $preparationData = $t["rapport"];
//        //var_dump($preparationData) ;
//        $nbr=0;
//        $this->conn->begin_transaction();
//            foreach ($preparationData as $preparation)
//            {
//                    $numCarte= $preparation['NumCarte'];
//                    $date= $preparation['DateEnregistrement'];
//                    $access= $preparation['Access'];
//                    $idpro= $preparation['IdProduit'];
//                    $libelleHor= $preparation['IdPlageHoraire'];
//
//            //echo "requete: INSERT INTO historique(num_carte,date_scan,type,id_produit,id_horaire) VALUES ('$numCarte' ,'$date' ,$access, $idpro, '$libelleHor')";
//                    $stmt = $this->conn->prepare("INSERT INTO historique(num_carte,date_scan,type,id_produit,id_horaire) VALUES ('$numCarte' ,'$date' ,$access, $idpro, '$libelleHor')");
//
//
//
//                    if (!$stmt)
//                    {
//                        global $logger;
//                        $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " insertRapport()" . mysqli_error($this->conn));
//                        return null;
//                        echo $stmt;
//
//                    }
//                    else
//                    {
//
//                        $result = $stmt->execute();
//                    }
//
//
//                    if($result==1)
//                    {
//                        $nbr++;
//                    }
//                    $stmt->close();
//
//                    // return $result;
//            }
//            $this->conn->commit();
//
//            $this->conn->close();
//            if(sizeof($preparationData) == $nbr)
//            {
//                echo "terminee";
//            }
//            else
//            {
//                echo "erreur";
//            }
//
//
//    }
    //------------------------------- fin methode control d access ----------------------------------
    //get preparations
//    public function getPreparation($user_id)
//    {
//
//        $sql = "SELECT DISTINCT p.idPreparation,p.numPreparation,p.datePrevue,p.dateExpedition,p.statutPreparation,p.nombreUE,p.nombreProduits,p.totalPoids ,t.numTransporteur,t.nomTransporteur,t.prenomTransporteur FROM preparation p,ligne_produit l ,transporteur t WHERE l.idUser='$user_id' AND p.idPreparation = l.idPreparation AND t.idTransporteur=p.idTransporteur AND p.idCommande = 0  Order BY p.idPreparation";
//
//        $stmt = $this->conn->prepare($sql);
//        if (!$stmt) {
//            global $logger;
//            $logger->info(date("Y-m-d H:i:s") . " error_sql:" . " getPreparation()" . mysqli_error($this->conn));
//            return NULL;
//
//        }
//        $stmt->execute();
//        $Preparations = $stmt->get_result();
//        $stmt->close();
//        return $Preparations;
//
//
//    }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

    public function commit()
    {
        // mysqli_commit($this->conn);
        $this->conn->commit();
    }
    public function rollBack()
    {

        //  mysqli_rollback($this->conn);
        $this->conn->rollback();
    }

    /**
     * Obtention de l'identifiant de l'utilisateur par clé API
     * @param String $api_key
     */
//    public function getUserId($api_key)
//    {
//        $stmt = $this->conn->prepare("SELECT id_user FROM user WHERE api_key = ?");
//        $stmt->bind_param("s", $api_key);
//        if ($stmt->execute()) {
//            $stmt->bind_result($user_id);
//            $stmt->fetch();
//
//            $stmt->close();
//            return $user_id;
//        } else {
//            return NULL;
//        }
//    }
//    public function getQntStock($idStock)
//    {
//        $stmt = $this->conn->prepare("SELECT quantite FROM stock_produit WHERE id_stock_produit = ?");
//        $stmt->bind_param("s", $idStock);
//        if ($stmt->execute()) {
//            $stmt->bind_result($QntStock);
//            $stmt->fetch();
//
//            $stmt->close();
//            return $QntStock;
//        } else {
//            return NULL;
//        }
//    }


    public function isValidApiKey($api_key) {
        /* $stmt = $this->conn->prepare("SELECT id_user from user WHERE api_key = ?");
         $stmt->bind_param("s", $api_key);
         $stmt->execute();
         $stmt->store_result();
         $num_rows = $stmt->num_rows;
         $stmt->close();
         return $num_rows > 0; */
        return 1;
    }



}

?>
