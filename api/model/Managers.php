<?php
require('api/config/Configuration.php');
class Managers{
    private static $db;

    private static function setDb() {
        $config = new Configuration();
        self::$db = $config->getConnection();
    }

    public static function  file_post_contents($url, $data)
    {

        $postdata = http_build_query($data);

        $opts = array(
            'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        //print_r($opts); die($url);
        // if ($username && $password_) {
        //     $opts['http']['header'] = ("Authorization: Basic " . base64_encode("$username:$password_"));
        // }

        $context = stream_context_create($opts);
        return file_get_contents($url, false, $context);
    }

    public static function  file_put_contents($url, $data)
    {


        $postdata = json_encode($data);

        $opts = array(
            'http' =>
            array(
                'method'  => 'PUT',
                'header'  => 'Content-type: application/json',
                'content' => $postdata
            )
        );
        //print_r($opts); die($url);
        // if ($username && $password_) {
        //     $opts['http']['header'] = ("Authorization: Basic " . base64_encode("$username:$password_"));
        // }

        $context = stream_context_create($opts);
        return file_get_contents($url, false, $context);
    }

    public static function file_get_data($url)
    {
        // Create a curl handle to a non-existing location
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = '';
        if (($json = curl_exec($ch)) === false) {
            die('Curl error: ' . curl_error($ch));
        } else {
            return json_decode($json, true);
        }

        // Close handle
        curl_close($ch);
    }

    public static function getMultipleRecords($sql, $params = [])
    {
        self::setDb();
        $req = self::$db->prepare($sql);
        if (!empty($params) && !empty($params)) { // parameters must exist before you call bind_param() method
            $req->execute($params);
        }
        if($res = $req->fetchAll(PDO::FETCH_ASSOC)) {
            return $res;
        }
    }
    public static function getSingleRecord($sql, $params)
    {
        self::setDb();
        $req = self::$db->prepare($sql);
        $req->execute($params);
        if ($res = $req->fetch(PDO::FETCH_ASSOC)) {
            return $res;
        }
    }

    public static function modifyRecord($sql, $params)
    {
        self::setDb();
        $req = self::$db->prepare($sql);
        $res = $req->execute($params);
        return $res;
    }
}
