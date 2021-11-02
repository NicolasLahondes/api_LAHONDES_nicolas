<?php class Car
{

    private $id_car;
    private $seats;
    private $licencePlate;
    private $serialNumber;
    private $color;
    private $brand_id_brand;
    private $model_id_model;

    public function __construct()
    {
    }


    /**
     * Get the value of id_car
     */
    public function getId_car()
    {
        return $this->id_car;
    }

    /**
     * Set the value of id_car
     *
     * @return  self
     */
    public function setId_car($id_car)
    {
        $this->id_car = $id_car;

        return $this;
    }

    /**
     * Get the value of seats
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set the value of seats
     *
     * @return  self
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get the value of licencePlate
     */
    public function getLicencePlate()
    {
        return $this->licencePlate;
    }

    /**
     * Set the value of licencePlate
     *
     * @return  self
     */
    public function setLicencePlate($licencePlate)
    {
        $this->licencePlate = $licencePlate;

        return $this;
    }

    /**
     * Get the value of serialNumber
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set the value of serialNumber
     *
     * @return  self
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of brand_id_color
     */
    public function getBrand_id_color()
    {
        return $this->brand_id_color;
    }

    /**
     * Set the value of brand_id_color
     *
     * @return  self
     */
    public function setBrand_id_color($brand_id_color)
    {
        $this->brand_id_color = $brand_id_color;

        return $this;
    }

    /**
     * Get the value of brand_id_brand
     */
    public function getBrand_id_brand()
    {
        return $this->brand_id_brand;
    }

    /**
     * Set the value of brand_id_brand
     *
     * @return  self
     */
    public function setBrand_id_brand($brand_id_brand)
    {
        $this->brand_id_brand = $brand_id_brand;

        return $this;
    }

    /**
     * Get the value of model_id_model
     */
    public function getModel_id_model()
    {
        return $this->model_id_model;
    }

    /**
     * Set the value of model_id_model
     *
     * @return  self
     */
    public function setModel_id_model($model_id_model)
    {
        $this->model_id_model = $model_id_model;

        return $this;
    }

    public static function listAllCarsJson($bddConn, $tableName, $limit, $className, $where, $what, $order, $by)
    {
        $fetchedResults = $bddConn->listjson($bddConn, $tableName, $limit, $className, $where, $what, $order, $by);
        return $fetchedResults;
    }

    public static function addCar($bddConn, $tableName, $bindParam)
    {
        $fetchedResults = $bddConn->add($bddConn, $tableName, $bindParam);
        return $fetchedResults;
    }

    public static function modifyCar($bddConn, $bindParam)
    {
        $results = $bddConn->modify($bddConn, $bindParam);
        return $results;
    }

    public static function deleteCar($bddConn, $id, $tableName)
    {
        $results = $bddConn->delete($bddConn, $id, $tableName);
        return $results;
    }
}
