<?php

class Connexion extends PDO
{

    private $dbAdress;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct($dbAdress, $dbName, $dbUser, $dbPassword)
    {
        $this->dbAdress = $dbAdress;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        parent::__construct('mysql:host=' . $dbAdress . ';dbname=' . $dbName . ";charset=utf8", $dbUser, $dbPassword);
    }

    /**
     * Get the value of dbAdress
     */
    public function getDbAdress()
    {
        return $this->dbAdress;
    }

    /**
     * Set the value of dbAdress
     *
     * @return  self
     */
    public function setDbAdress($dbAdress)
    {
        $this->dbAdress = $dbAdress;

        return $this;
    }

    /**
     * Get the value of dbName
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * Set the value of dbName
     *
     * @return  self
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;

        return $this;
    }

    /**
     * Get the value of dbUser
     */
    public function getDbUser()
    {
        return $this->dbUser;
    }

    /**
     * Set the value of dbUser
     *
     * @return  self
     */
    public function setDbUser($dbUser)
    {
        $this->dbUser = $dbUser;

        return $this;
    }

    /**
     * Get the value of dbPassword
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * Set the value of dbPassword
     *
     * @return  self
     */
    public function setDbPassword($dbPassword)
    {
        $this->dbPassword = $dbPassword;

        return $this;
    }

    // **********************************************************************************************************************************************
    // ************************************************************** ALL METHODS HERE **************************************************************
    // **********************************************************************************************************************************************

    /**
     * list
     *
     * @param  mixed $bddConn
     * @param  mixed $tableName
     * @param  mixed $limit
     * @param  mixed $className
     * @param  mixed $where
     * @param  mixed $what
     * @param  mixed $order
     * @param  mixed $by
     * @return void
     */
    public static function list($bddConn, $tableName, $limit = 50, $className, $where, $what, $order, $by)
    {

        try {
            $query = 'SELECT * FROM ' . $tableName . '';

            if ($where) :
                $query = $query . ' WHERE ' . $where . ' LIKE ' . '' . '\'%' . $what . '%\'' . '';
            endif;
            if ($order) :
                $query = $query . ' ORDER BY ' .  $order  . ' ' . $by;
            endif;
            if ($limit > 0) :
                $query =  $query . '  LIMIT ' . $limit . '';
            endif;

            $results = $bddConn->prepare($query);
            $results->execute();
            $fetchedResults = $results->fetchAll(PDO::FETCH_CLASS, $className);

            // $fetchedJson = $results->fetchAll();
            // echo "<br>";
            // var_dump(json_encode($fetchedJson));
            // json_encode($fetchedJson);
            // foreach ($fetchedJson as $key) {
            //     // echo $fetchedJson[$key]['name'];
            //     echo $key['name'];
            //     echo "<br>";
            // }
            if (count($fetchedResults) < 1) :
                throw new Exception("There is no results");
            endif;
            return $fetchedResults;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    // TODO replace parameters in good order
    // TODO check if $className is really usefull
    // TODO passer le "*" en paramètre?
    // TODO Can we pass the "FROM" in funparam if it's replacable by something else?

    public static function listjson($bddConn, $tableName, $limit = 50, $className, $where, $what, $order, $by)
    {

        try {
            $query = 'SELECT * FROM ' . $tableName . '';

            if ($where) :
                $query = $query . ' WHERE ' . $where . ' LIKE ' . '' . '\'%' . $what . '%\'' . '';
            endif;
            if ($order) :
                $query = $query . ' ORDER BY ' .  $order  . ' ' . $by;
            endif;
            if ($limit > 0) :
                $query =  $query . '  LIMIT ' . $limit . '';
            endif;
            $results = $bddConn->prepare($query);
            $results->execute();
            $fetchedJson = $results->fetchAll(PDO::FETCH_ASSOC);

            $fetchedJsonResults = json_encode($fetchedJson);



            return $fetchedJsonResults;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * takeOneElement
     *
     * @param  mixed $bddConn
     * @param  mixed $id
     * @return void
     */
    public static function takeOneElement($bddConn, $id)
    {
        $query = 'SELECT * FROM student WHERE id = :id';
        $objRes = $bddConn->prepare($query);
        $objRes->bindParam(':id', $id);
        $objRes->execute();
        // //  Le constructeur doit être vide pour utiliser la method ci dessous.
        $objRes->setFetchMode(PDO::FETCH_CLASS, "Trainees");
        $fetchedResults = $objRes->fetch();
        return $fetchedResults;
    }


    /**
     * add
     *
     * @param  mixed $bddConn
     * @param  mixed $tableName
     * @param  mixed $bindParam
     * @return void
     */
    public static function add($bddConn, $tableName, $bindParam)
    {
        // Unnecessary part but keep it because it's nice.
        // $arrayValuesFilled = array();
        // $arrayValues = array_values($bindParam);
        // foreach ($arrayValues as $key => $value) :
        //     array_push($arrayValuesFilled, $arrayValues[$key]);
        // endforeach;

        // This part get the Keys from the $bindParam var
        $arrayKeysFilled = array();
        $arrayKeys = array_keys($bindParam);
        foreach ($arrayKeys as $key => $value) :
            array_push($arrayKeysFilled, $arrayKeys[$key]);
        endforeach;

        // This part generate the dynamic query
        $inc = count($arrayKeys);
        for ($i = 0; $i < $inc; $i++) {
            if ($i == 0) :
                $e = ' ( ';
            endif;
            if ($i < $inc - 1) :
                $e = $e . $arrayKeysFilled[$i] . ', ';
            elseif ($i == $inc - 1) :
                $e = $e . $arrayKeysFilled[$i] . ' ) ';
            endif;
        }
        for ($i = 0; $i < $inc; $i++) {
            if ($i == 0) :
                $e = $e . 'VALUES ( ';
            endif;
            if ($i < $inc - 1) :
                $e = $e  . ":" . $arrayKeysFilled[$i] . ', ';
            elseif ($i == $inc - 1) :
                $e = $e  . ":" . $arrayKeysFilled[$i] . ' ) ';
            endif;
        }

        // DEBUG CHECK IF BUG HERE
        //       echo $e;
        //       echo "<br>";

        // EXECUTE THE QUERY

        $query = 'INSERT INTO ' . $tableName . $e;
        echo $query;
        $results = $bddConn->prepare($query);
        foreach ($bindParam as $key => $value) :
            echo $value;
            $results->bindValue(':' . $key, $value);
        endforeach;
        $results->execute();
        return $results;
    }

    /**
     * modify
     *
     * @param  mixed $bddConn
     * @param  mixed $bindParam
     * @return void
     */

    // TODO Generalize this function parameters like the list and add function
    public static function modify($bddConn, $bindParam)
    {
        $idQuery = 'UPDATE car SET seats= :seats, licencePlate= :licencePlate, serialNumber= :serialNumber, color= :color, brand_id_brand= :brand_id_brand, model_id_model= :model_id_model WHERE id_car = :id_car';
        $results = $bddConn->prepare($idQuery);
        foreach ($bindParam as $key => $value) :
            $results->bindValue(':' . $key, $value);
        endforeach;
        $results->execute();
        return;
    }

    /**
     * delete
     *
     * @param  mixed $bddConn
     * @param  mixed $id
     * @param  mixed $tableName
     * @return void
     */

    // TODO Generalize this function parameters like the list and add function
    public static function delete($bddConn, $id, $tableName)
    {
        $query = 'DELETE FROM ' . $tableName . ' WHERE `' . $tableName . '`.`id_car` = :id_car';
        $results = $bddConn->prepare($query);
        $results->bindParam(':id_car', $id);
        $results->execute();
        return $results;
    }
}
