<?php




class Projects extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;
     
    /**
     *
     * @var string
     */
    protected $name;
     
    /**
     *
     * @var string
     */
    protected $description;
     
    /**
     *
     * @var double
     */
    protected $investment;
     
    /**
     *
     * @var string
     */
    protected $implementation_period;
     
    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field investment
     *
     * @param double $investment
     * @return $this
     */
    public function setInvestment($investment)
    {
        $this->investment = $investment;

        return $this;
    }

    /**
     * Method to set the value of field implementation_period
     *
     * @param string $implementation_period
     * @return $this
     */
    public function setImplementationPeriod($implementation_period)
    {
        $this->implementation_period = $implementation_period;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field investment
     *
     * @return double
     */
    public function getInvestment()
    {
        return $this->investment;
    }

    /**
     * Returns the value of field implementation_period
     *
     * @return string
     */
    public function getImplementationPeriod()
    {
        return $this->implementation_period;
    }

}
