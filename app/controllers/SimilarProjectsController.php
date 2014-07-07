<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class SimilarProjectsController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for similar_projects
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "SimilarProjects", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $similar_projects = SimilarProjects::find($parameters);
        if (count($similar_projects) == 0) {
            $this->flash->notice("The search did not find any similar_projects");

            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $similar_projects,
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
     * Edits a similar_project
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $similar_project = SimilarProjects::findFirstByid($id);
            if (!$similar_project) {
                $this->flash->error("similar_project was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "similar_projects",
                    "action" => "index"
                ));
            }

            $this->view->id = $similar_project->id;

            $this->tag->setDefault("id", $similar_project->id);
            $this->tag->setDefault("similar_project_id", $similar_project->similar_project_id);
            
        }
    }

    /**
     * Creates a new similar_project
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "index"
            ));
        }

        $similar_project = new SimilarProjects();

        $similar_project->similar_project_id = $this->request->getPost("similar_project_id");
        

        if (!$similar_project->save()) {
            foreach ($similar_project->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "new"
            ));
        }

        $this->flash->success("similar_project was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "similar_projects",
            "action" => "index"
        ));

    }

    /**
     * Saves a similar_project edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $similar_project = SimilarProjects::findFirstByid($id);
        if (!$similar_project) {
            $this->flash->error("similar_project does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "index"
            ));
        }

        $similar_project->similar_project_id = $this->request->getPost("similar_project_id");
        

        if (!$similar_project->save()) {

            foreach ($similar_project->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "edit",
                "params" => array($similar_project->id)
            ));
        }

        $this->flash->success("similar_project was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "similar_projects",
            "action" => "index"
        ));

    }

    /**
     * Deletes a similar_project
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $similar_project = SimilarProjects::findFirstByid($id);
        if (!$similar_project) {
            $this->flash->error("similar_project was not found");

            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "index"
            ));
        }

        if (!$similar_project->delete()) {

            foreach ($similar_project->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "similar_projects",
                "action" => "search"
            ));
        }

        $this->flash->success("similar_project was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "similar_projects",
            "action" => "index"
        ));
    }

}
