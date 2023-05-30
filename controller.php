<?php
    require_once 'DAO.php';
    require_once 'Osoba.php';

    $action = isset($_REQUEST["action"])?$_REQUEST["action"]:"";

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if($action == "unesi")
        {
            $ime = isset($_POST["ime"])? $_POST["ime"]:"";
            $prezime = isset($_POST["prezime"])? $_POST["prezime"]:"";
            $godiste = isset($_POST["godiste"])? $_POST["godiste"]:"";

            $osoba=new Osoba(0, $ime,$prezime,$godiste);

            $dao = new DAO();
            $dao->insert($osoba);

            $osobe=$dao->selectOsobe();
            include 'prikaz.php'; 
        }
        elseif($action == "izmeni")
        {
            $ime = isset($_POST["ime"])? $_POST["ime"]:"";
            $prezime = isset($_POST["prezime"])? $_POST["prezime"]:"";
            $godiste = isset($_POST["godiste"])? $_POST["godiste"]:"";
            $id = isset($_POST["id"])? $_POST["id"]:"";

            $osoba = new Osoba($id, $ime, $prezime, $godiste);

            $dao = new DAO();
            $dao->editById($osoba);
            $osobe = $dao->selectOsobe();
            include 'prikaz.php';
        }
    }
    elseif($_SERVER['REQUEST_METHOD']=="GET")
    {
        if($action == 'all')
        {
            $dao = new DAO();
            $osobe=$dao->seelctOsobe();
            include 'prikazOsoba.php';
        }
        elseif($action =='izbrisi')
        {
            $id = isset($_GET['id'])? $_GET['id'] : "";
            $dao = new DAO();
            $dao->deleteById($id);
            $osobe = $dao->selectOsobe();
            include 'prikaz.php';
        }
        elseif($action =='izmeni')
        {
            $id = isset($_GET['id'])? $_GET['id'] : "";
            $dao = new DAO();
            $osoba = $dao->getById($id);
            include 'editOsoba.php'; //ovo ne radi ali neka ga...
        }
    }

?>