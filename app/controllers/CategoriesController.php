<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CategoriesController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for categories
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Categories", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $categories = Categories::find($parameters);
        if (count($categories) == 0) {
            $this->flash->notice("The search did not find any categories");

            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $categories,
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
     * Edits a categorie
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $categorie = Categories::findFirstByid($id);
            if (!$categorie) {
                $this->flash->error("categorie was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "categories",
                    "action" => "index"
                ));
            }

            $this->view->id = $categorie->id;

            $this->tag->setDefault("id", $categorie->id);
            $this->tag->setDefault("name", $categorie->name);
            $this->tag->setDefault("category_parent_id", $categorie->category_parent_id);
            $this->tag->setDefault("weight", $categorie->weight);
            
        }
    }

    /**
     * Creates a new categorie
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "index"
            ));
        }

        $categorie = new Categories();

        $categorie->name = $this->request->getPost("name");
        $categorie->category_parent_id = $this->request->getPost("category_parent_id");
        $categorie->weight = $this->request->getPost("weight");
        

        if (!$categorie->save()) {
            foreach ($categorie->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "new"
            ));
        }

        $this->flash->success("categorie was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categories",
            "action" => "index"
        ));

    }

    /**
     * Saves a categorie edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $categorie = Categories::findFirstByid($id);
        if (!$categorie) {
            $this->flash->error("categorie does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "index"
            ));
        }

        $categorie->name = $this->request->getPost("name");
        $categorie->category_parent_id = $this->request->getPost("category_parent_id");
        $categorie->weight = $this->request->getPost("weight");
        

        if (!$categorie->save()) {

            foreach ($categorie->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "edit",
                "params" => array($categorie->id)
            ));
        }

        $this->flash->success("categorie was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categories",
            "action" => "index"
        ));

    }

    /**
     * Deletes a categorie
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $categorie = Categories::findFirstByid($id);
        if (!$categorie) {
            $this->flash->error("categorie was not found");

            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "index"
            ));
        }

        if (!$categorie->delete()) {

            foreach ($categorie->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "categories",
                "action" => "search"
            ));
        }

        $this->flash->success("categorie was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "categories",
            "action" => "index"
        ));
    }

}
