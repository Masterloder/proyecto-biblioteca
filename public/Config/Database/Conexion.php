<?php
class Conexion
{

    private $host = 'localhost';
    private $user = 'biblioteca_unefa';
    private $Contraseña = '1FcRs5s6[)W]oTGW';
    private $dbname = 'biblioteca_unefa';
    public $conect;


    public function __construct()
    {
        $Conectectionstring = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8";
        try {
            $this->conect = new PDO($Conectectionstring, $this->user, $this->Contraseña);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $this->conect = 'Error en la Conexion';
            echo "ERROR: " . $e->getMessage();
        }

    }

    public function connect()
    {
        return $this->conect;
    }


}

?>