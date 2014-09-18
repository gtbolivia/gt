<?php




class Categories extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var integer
     */
    public $category_parent_id;
     
    /**
     *
     * @var integer
     */
    public $weight;
     
    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var integer
     */
    public $pge;

    /**
     *
     * @var integer
     */
    public $pge_percent;

  /**
   * @return int
   */
  public function getPge() {
    return $this->pge;
  }

  /**
   * @param int $pge
   */
  public function setPge($pge) {
    $this->pge = $pge;
  }

  /**
   * @return int
   */
  public function getPgePercent() {
    return $this->pge_percent;
  }

  /**
   * @param int $pge_percent
   */
  public function setPgePercent($pge_percent) {
    $this->pge_percent = $pge_percent;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
  }

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
     * Method to set the value of field category_parent_id
     *
     * @param integer $category_parent_id
     * @return $this
     */
    public function setCategoryParentId($category_parent_id)
    {
        $this->category_parent_id = $category_parent_id;

        return $this;
    }

    /**
     * Method to set the value of field weight
     *
     * @param integer $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

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
     * Returns the value of field category_parent_id
     *
     * @return integer
     */
    public function getCategoryParentId()
    {
        return $this->category_parent_id;
    }

    /**
     * Returns the value of field weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

}
