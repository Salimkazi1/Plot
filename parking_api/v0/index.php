<?php

require_once '../include/DbHandler.php';
require_once '../include/PassHash.php';
//require '.././libs/Slim/Slim.php';

date_default_timezone_set('Africa/Algiers');
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
// ID utilisateur - variable globale
$user_id = NULL;

/*$app = new \Slim\Slim(array(
         'debug' =>          false,
      'log.enabled' =>    true,
      'log.level' =>      \Slim\Log::DEBUG,
      'mode' =>           'development',
      'slim.errors' => fopen('.././logs/tt.log', 'w'),

 ));*/

/*$app = new \Slim\Slim(array(
    'log.level' => \Slim\Log::DEBUG
));*/
/*$logDate = new DateTime();
$logWriter = new \Slim\LogWriter(fopen('.././logs/'. $logDate->format('Y-m-d').'errors.log', 'a'));
$logger = new \Slim\Slim(array('log.writer' => $logWriter));
$logger = $logger->log;
*/
/*$app->get('/log', function() {
    GLOBAL $logger;
    $logger->info("test log2");

});*/


/**
 * Ajout de Couche intermédiaire pour authentifier chaque demande
 * Vérifier si la demande a clé API valide dans l'en-tête "Authorization"
 */

function authenticate(\Slim\Route $route) {
    // Obtenir les en-têtes de requêtes
    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();

    // Vérification de l'en-tête d'autorisation
    if (isset($headers['Authorization'])) {
        $db = new DbHandler();

        // Obtenir la clé d'api
        $api_key = $headers['Authorization'];
        // Valider la clé API
        if (!$db->isValidApiKey($api_key)) {
            //  Clé API n'est pas présente dans la table des utilisateurs
            $response["error"] = true;
            $response["message"] = "Accès Refusé. Clé API invalide";
            echoRespnse(401, $response);
            $app->stop();
        } else {
            global $user_id;
            // Obtenir l'ID utilisateur (clé primaire)
            $user_id = 5;
        }
    } else {
        // Clé API est absente dans la en-tête
        $response["error"] = true;
        $response["message"] = "Clé API est manquante";
        echoRespnse(400, $response);
        $app->stop();
    }
}


//
///*
// * ------------------------ METHODES Avec AUTHENTICATION ------------------------
// */
//// getData
////------------------------------------ methode controle d acces -----------------------------------------------
//
//
//
//
//$app->get('/getData', function() {
//
//    $response = array();
//    $db = new DbHandler();
//
//         // appele des requettes
//          $result  =  $db->getServices();
//          $result1 = $db->getLigneCarteProduit();
//          $result2 = $db->getPlageHoraire();
//          $result3 = $db->getUser();
//          $result4 = $db->getTraverse();
//          $result5 =  $db->getCarteActiveNonAutorisees();
//
//        //$Emplacements = $db->getEmplacement();
//
//        if($result == NULL && $result1==null )
//        {
//            $response["error"] = true;
//            $response["message"] = "une erreur s'est produite lors de la récupération des services";
//            echoRespnse(400, $response);
//
//        }
//        else
//        {
//
//            $response["error"] = false;
//            $response["service"] = array();
//            $response["LigneCarteProduit"] = array();
//            $response["PlageHoraire"] = array();
//            $response["User"] = array();
//            $response["traversee"] = array();
//
//            // boucle pour recuperer  les données
//            while ($service = $result->fetch_assoc()) {
//                $tmp = array();
//                $tmp["idService"] = $service["idP"];
//                $tmp["nomService"] = utf8_encode($service["nom_produit"]);
//
//                array_push($response["service"], $tmp);
//            }
//
//            // boucle pour recuperer  les données
//            while ($traverse = $result4->fetch_assoc()) {
//                $tmp4 = array();
//                $tmp4["idTraverse"] = $traverse["idT"];
//                $tmp4["nomTraverse"] = utf8_encode($traverse["code_traversee"]);
//
//                array_push($response["traversee"], $tmp4);
//            }
//
//            while ($obj = $result5->fetch_assoc()) {
//                $tmp6= array();
//                $tmp6["id_ligne_carte_produit"] = "none";
//                $tmp6["num_carte"] = $obj["num_carte"];
//                $tmp6["id_produit"] = "none";
//
//                array_push($response["LigneCarteProduit"], $tmp6);
//            }
//
//            while ($LigncarteProd = $result1->fetch_assoc()) {
//                $tmp1 = array();
//                $tmp1["id_ligne_carte_produit"] = $LigncarteProd["id_ligne_carte_produit"];
//                $tmp1["num_carte"] = $LigncarteProd["num_carte"];
//                $tmp1["id_produit"] = $LigncarteProd["id_produit"];
//
//                array_push($response["LigneCarteProduit"], $tmp1);
//            }
//
//            while ($PlageHoraire = $result2->fetch_assoc()) {
//                $tmp2 = array();
//                $tmp2["id_horaire"] = $PlageHoraire["id_horaire"];
//                $tmp2["libelle"] = utf8_encode($PlageHoraire["libelle"]);
//                $tmp2["heure_debut"] = $PlageHoraire["heure_debut"];
//                $tmp2["heure_fin"] = $PlageHoraire["heure_fin"];
//
//                array_push($response["PlageHoraire"], $tmp2);
//            }
//
//
//             while ($user = $result3->fetch_assoc()) {
//                $tmp3 = array();
//                $tmp3["login"] = utf8_encode($user["login"]);
//                $tmp3["password"] = utf8_encode($user["password"]);
//
//                array_push($response["User"], $tmp3);
//            }
//
//                echoRespnse(200, $response);
//
//        }
//
//
//});
//
//
//
//$app->post('/controlAccess', function() use ($app) {
//            // vérifier les paramètres requises
//            verifyRequiredParams(array('numCarte'));
//            verifyRequiredParams(array('idService'));
//
//            // lecture des params de post
//            $numCarte = $app->request()->post('numCarte');
//            $idService = $app->request()->post('idService');
//
//
//            $responseAccess = array();
//
//            $db = new DbHandler();
//            $resultAccess = $db->controlAccessPassag($numCarte,$idService);
//            $responseAccess["error"] = false;
//            $responseAccess["controlAccess"]=array();
//            	// boucle pour recuperer les valeur de preparations
//
//            if($resultAccess==null)
//            {
//               echo "erreur dans la requete";
//            }
//            else
//            {
//                if($resultAccess["reslutRapport"]=="0")
//                {
//
//                    //echo "acces non autorisé";
//                }
//                elseif($resultAccess["reslutRapport"]=="1")
//                {
//                    //echo "acces autorisé";
//                }
//                elseif($resultAccess["reslutRapport"]=="2")
//                {
//                    //echo "Déja passé";
//                }
//                elseif($resultAccess["reslutRapport"]=="-1")
//                {
//                    //la carte n'existe pas ";
//                }
//
//                 $responseAccess["controlAccess"]= $resultAccess["reslutRapport"];
//            }
//
//
//
//
//
//                //$responseAccess['numCarte'] = $code;
//                //$responseAccess['service'] = $restauration;
//
//            echoRespnse(200, $responseAccess);
//
//        });
//
//$app->post('/rapport', function() use ($app) {
//            // vérifier les paramètres requises
//
//
//        $db = new DbHandler();
//
//        $json= verifyRequiredParams(array('rapport'));
//        $json = $app->request()->post('rapport');
//        $db->insertRapport($json);
//
//        });

//-------------------------------------------------------------------------------------------------------------

           
/**
 * Vérification params nécessaires posté ou non
 */

function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    // Manipulation paramsde la demande PUT
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }

    if ($error) {
        //Champ (s) requis sont manquants ou vides
        // echo erreur JSON et d'arrêter l'application
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Champ(s) requis ' . substr($error_fields, 0, -2) . ' est (sont) manquant(s) ou vide(s)';
        echoRespnse(400, $response);
        $app->stop();
    }
}


/**
 * Faisant écho à la réponse JSON au client
 * @param String $status_code  Code de réponse HTTP
 * @param Int $response response Json
 */
function echoRespnse($status_code, $response) {

    $app = \Slim\Slim::getInstance();
    // Code de réponse HTTP
    $app->status($status_code);

    // la mise en réponse type de contenu en JSON
    $app->contentType('application/json');

    echo utf8_encode(json_encode($response));
      
}

//________________________________________ parking _______________________________________

$app->get('/testarduino', function() use ($app){


    $numAbonne = $_GET["arg1"];
    echo $numAbonne;
});

$app->get('/accesZone', function() use ($app){

    $zone = $_GET["zone"];
    $type = $_GET["type"];
    $db = new DbHandler();
    $resultAccess = $db->accesZone($zone,$type);


});

$app->get('/retourProcessing', function() use($app){
    $zone = $_GET["zone"];
    $db = new DbHandler();
    $rsltTrouve = $db->retourProcessing($zone);
});


$app->get('/controlAbonne1', function() use ($app) {
    // vérifier les paramètres requises
    /*
    verifyRequiredParams(array('numAbonne'));
    verifyRequiredParams(array('todayDate'));
    verifyRequiredParams(array('type'));

    // lecture des params de post
    $numAbonne = $app->request()->post('numAbonne');
    $todayDate = $app->request()->post('todayDate');
    $type = $app->request()->post('type');
*/
    $numAbonne = $_GET["numAbonne"];
    $todayDate =  date("Y-m-d H:i:s");
    //$todayhour = $_GET["todayhour"];



    //$todayDate=$todayDate.$todayhour;
    $type =$_GET["type"];

    $responseAccess = array();

    $db = new DbHandler();
    $resultAccess = $db->controlAccessAbonne($numAbonne,$todayDate,$type);


    //echoRespnse(200, $responseAccess);

});

$app->run();
?>


