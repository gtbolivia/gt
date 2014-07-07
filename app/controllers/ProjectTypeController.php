<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProjectTypeController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for project_type
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "ProjectType", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $project_type = ProjectType::find($parameters);
        if (count($project_type) == 0) {
            $this->flash->notice("The search did not find any project_type");

            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $project_type,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displayes the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a project_type
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $project_type = ProjectType::findFirstByid($id);
            if (!$project_type) {
                $this->flash->error("project_type was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "project_type",
                    "action" => "index"
                ));
            }

            $this->view->id = $project_type->id;

            $this->tag->setDefault("id", $project_type->id);
            $this->tag->setDefault("name", $project_type->name);
            
        }
    }

    /**
     * Creates a new project_type
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "index"
            ));
        }

        $project_type = new ProjectType();

        $project_type->name = $this->request->getPost("name");
        

        if (!$project_type->save()) {
            foreach ($project_type->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "new"
            ));
        }

        $this->flash->success("project_type was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "project_type",
            "action" => "index"
        ));

    }

    /**
     * Saves a project_type edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $project_type = ProjectType::findFirstByid($id);
        if (!$project_type) {
            $this->flash->error("project_type does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "index"
            ));
        }

        $project_type->name = $this->request->getPost("name");
        

        if (!$project_type->save()) {

            foreach ($project_type->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "edit",
                "params" => array($project_type->id)
            ));
        }

        $this->flash->success("project_type was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "project_type",
            "action" => "index"
        ));

    }

    /**
     * Deletes a project_type
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $project_type = ProjectType::findFirstByid($id);
        if (!$project_type) {
            $this->flash->error("project_type was not found");

            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "index"
            ));
        }

        if (!$project_type->delete()) {

            foreach ($project_type->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "project_type",
                "action" => "search"
            ));
        }

        $this->flash->success("project_type was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "project_type",
            "action" => "index"
        ));
    }

}
