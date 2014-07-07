<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProjectsController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for projects
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Projects", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $projects = Projects::find($parameters);
        if (count($projects) == 0) {
            $this->flash->notice("The search did not find any projects");

            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $projects,
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
     * Edits a project
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $project = Projects::findFirstByid($id);
            if (!$project) {
                $this->flash->error("project was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "projects",
                    "action" => "index"
                ));
            }

            $this->view->id = $project->id;

            $this->tag->setDefault("id", $project->id);
            $this->tag->setDefault("name", $project->name);
            $this->tag->setDefault("description", $project->description);
            $this->tag->setDefault("investment", $project->investment);
            $this->tag->setDefault("implementation_period", $project->implementation_period);
            
        }
    }

    /**
     * Creates a new project
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "index"
            ));
        }

        $project = new Projects();

        $project->name = $this->request->getPost("name");
        $project->description = $this->request->getPost("description");
        $project->investment = $this->request->getPost("investment");
        $project->implementation_period = $this->request->getPost("implementation_period");
        

        if (!$project->save()) {
            foreach ($project->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "new"
            ));
        }

        $this->flash->success("project was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects",
            "action" => "index"
        ));

    }

    /**
     * Saves a project edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $project = Projects::findFirstByid($id);
        if (!$project) {
            $this->flash->error("project does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "index"
            ));
        }

        $project->name = $this->request->getPost("name");
        $project->description = $this->request->getPost("description");
        $project->investment = $this->request->getPost("investment");
        $project->implementation_period = $this->request->getPost("implementation_period");
        

        if (!$project->save()) {

            foreach ($project->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "edit",
                "params" => array($project->id)
            ));
        }

        $this->flash->success("project was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects",
            "action" => "index"
        ));

    }

    /**
     * Deletes a project
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $project = Projects::findFirstByid($id);
        if (!$project) {
            $this->flash->error("project was not found");

            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "index"
            ));
        }

        if (!$project->delete()) {

            foreach ($project->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects",
                "action" => "search"
            ));
        }

        $this->flash->success("project was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects",
            "action" => "index"
        ));
    }

}
