<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProjectsCategoriesController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for projects_categories
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "ProjectsCategories", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $projects_categories = ProjectsCategories::find($parameters);
        if (count($projects_categories) == 0) {
            $this->flash->notice("The search did not find any projects_categories");

            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $projects_categories,
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
     * Edits a projects_categorie
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $projects_categorie = ProjectsCategories::findFirstByid($id);
            if (!$projects_categorie) {
                $this->flash->error("projects_categorie was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "projects_categories",
                    "action" => "index"
                ));
            }

            $this->view->id = $projects_categorie->id;

            $this->tag->setDefault("id", $projects_categorie->id);
            $this->tag->setDefault("project_id", $projects_categorie->project_id);
            $this->tag->setDefault("category_id", $projects_categorie->category_id);
            
        }
    }

    /**
     * Creates a new projects_categorie
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "index"
            ));
        }

        $projects_categorie = new ProjectsCategories();

        $projects_categorie->project_id = $this->request->getPost("project_id");
        $projects_categorie->category_id = $this->request->getPost("category_id");
        

        if (!$projects_categorie->save()) {
            foreach ($projects_categorie->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "new"
            ));
        }

        $this->flash->success("projects_categorie was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects_categories",
            "action" => "index"
        ));

    }

    /**
     * Saves a projects_categorie edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $projects_categorie = ProjectsCategories::findFirstByid($id);
        if (!$projects_categorie) {
            $this->flash->error("projects_categorie does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "index"
            ));
        }

        $projects_categorie->project_id = $this->request->getPost("project_id");
        $projects_categorie->category_id = $this->request->getPost("category_id");
        

        if (!$projects_categorie->save()) {

            foreach ($projects_categorie->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "edit",
                "params" => array($projects_categorie->id)
            ));
        }

        $this->flash->success("projects_categorie was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects_categories",
            "action" => "index"
        ));

    }

    /**
     * Deletes a projects_categorie
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $projects_categorie = ProjectsCategories::findFirstByid($id);
        if (!$projects_categorie) {
            $this->flash->error("projects_categorie was not found");

            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "index"
            ));
        }

        if (!$projects_categorie->delete()) {

            foreach ($projects_categorie->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects_categories",
                "action" => "search"
            ));
        }

        $this->flash->success("projects_categorie was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects_categories",
            "action" => "index"
        ));
    }

}
