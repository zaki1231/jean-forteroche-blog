<?php

abstract class Manager
{
    protected $_bd;

    public function __construct()
    {
        $bd = new PDO('mysql:host=localhost;dbname=blog_ecrivain;port=3306', 'root', '');
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->setBD($bd);
    }

    public function bd()
    {
        return $this->_bd;
    }
    public function setBD(PDO $bd)
    {
        $this ->_bd = $bd;
    }
}
