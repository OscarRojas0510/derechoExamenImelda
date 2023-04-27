<?php


class Consultas
{
    private $servernme;
    private $username ;
    private $password;
    private $database;
    function __construct()
    {
        $servernme = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'oscar_db';

        try {
            $this->db = new PDO("mysql:host=$servernme;dbname=$database;", $username, $password);
        } catch (PDOException $e) {
            die('Connection Failed: ' . $e->getMessage());
        }
    }

    function item($sql)
    {
        $resultado = $this->db->prepare($sql);
        if ($resultado->execute()) {
            $arreglo =  $this->utf8_converter($resultado->fetchAll(PDO::FETCH_ASSOC));
            if (sizeof($arreglo) > 0) {
                return $arreglo[0];
            } else return null;
        } else return null;
    }

    function lista($sql)
    {
        $resultados = $this->db->prepare($sql);
        if ($resultados->execute()) {
            $res = $this->utf8_converter($resultados->fetchAll(PDO::FETCH_ASSOC));
            if (is_array($res)) {
                return $res;
            }
            return array();
        } else return array();
    }

    function query($sql)
    {
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }

    function utf8_converter($array)
    {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }
}
