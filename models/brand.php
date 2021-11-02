<?php

class Brand
{

    private $id_brand;
    private $name;

    public function __construct()
    {
    }

    /**
     * Get the value of id_brand
     */
    public function getId_brand()
    {
        return $this->id_brand;
    }

    /**
     * Set the value of id_brand
     *
     * @return  self
     */
    public function setId_brand($id_brand)
    {
        $this->id_brand = $id_brand;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public static function addBrand($bddConn, $tableName, $bindParam)
    {
        $fetchedResults = $bddConn->add($bddConn, $tableName, $bindParam);
        return $fetchedResults;
    }
}
