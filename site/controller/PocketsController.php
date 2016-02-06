<?php

class PocketsController extends Controller {

    function cron() {
        $this->loadModel('Pocket');

        /* On récupère le dernier timestamp du dernier pocket enregistré */
        $sql = "SELECT MAX(  `time_added` ) as time_added FROM pockets";
        $last_pocket_save_time_added = $this->Pocket->executer($sql);


        //Si jamais aucun enregistrement
        if (empty($last_pocket_save_time_added)) {
            $last_pocket_save_time_added = 0;
        }


        /* Config api pocket */
        $consumer_key = '31885-0034a573cf891f232ba37d80';
        $redirect_uri = 'http://local.dev/pocket/callback.php';
        $access_token = 'fd5566d8-c4fa-ed5d-8ae2-9ae9ea';

        /* On récupère les pockets */
        $url = 'https://getpocket.com/v3/get?detailType=complete';
        $data = array(
            'consumer_key' => $consumer_key,
            'access_token' => $access_token
        );
        $query = http_build_query($data);
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                "Content-Length: " . strlen($query) . "\r\n" .
                "User-Agent:MyAgent/1.0\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $result = json_decode($result, true);


        /* On enregistre en bdd les pockets */
        foreach ($result['list'] as $key => $pocket) {
            /* On enregistre uniquement les nouveaux */
            if ($pocket['time_added'] > $last_pocket_save_time_added['0']->time_added) {
                $sql = "INSERT INTO  `pockets` (given_url,time_added) VALUES ('" . $pocket['given_url'] . "'," . $pocket['time_added'] . ")";
                $result = $this->Pocket->executer($sql);
            }
        }
    }

}

?>