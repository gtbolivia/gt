<?php




class SimilarProjects extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;
     
    /**
     *
     * @var integer
     */
    protected $similar_project_id;
     
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
     * Method to set the value of field similar_project_id
     *
     * @param integer $similar_project_id
     * @return $this
     */
    public function setSimilarProjectId($similar_project_id)
    {
        $this->similar_project_id = $similar_project_id;

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
     * Returns the value of field similar_project_id
     *
     * @return integer
     */
    public function getSimilarProjectId()
    {
        return $this->similar_project_id;
    }

}
