<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class GestionsController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for gestions
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Gestions", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $gestions = Gestions::find($parameters);
        if (count($gestions) == 0) {
            $this->flash->notice("The search did not find any gestions");

            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $gestions,
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
     * Edits a gestion
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $gestion = Gestions::findFirstByid($id);
            if (!$gestion) {
                $this->flash->error("gestion was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "gestions",
                    "action" => "index"
                ));
            }

            $this->view->id = $gestion->id;

            $this->tag->setDefault("id", $gestion->id);
            $this->tag->setDefault("name", $gestion->name);
            $this->tag->setDefault("description", $gestion->description);
            $this->tag->setDefault("budget", $gestion->budget);
            
        }
    }

    /**
     * Creates a new gestion
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "index"
            ));
        }

        $gestion = new Gestions();

        $gestion->name = $this->request->getPost("name");
        $gestion->description = $this->request->getPost("description");
        $gestion->budget = $this->request->getPost("budget");
        

        if (!$gestion->save()) {
            foreach ($gestion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "new"
            ));
        }

        $this->flash->success("gestion was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "gestions",
            "action" => "index"
        ));

    }

    /**
     * Saves a gestion edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $gestion = Gestions::findFirstByid($id);
        if (!$gestion) {
            $this->flash->error("gestion does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "index"
            ));
        }

        $gestion->name = $this->request->getPost("name");
        $gestion->description = $this->request->getPost("description");
        $gestion->budget = $this->request->getPost("budget");
        

        if (!$gestion->save()) {

            foreach ($gestion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "edit",
                "params" => array($gestion->id)
            ));
        }

        $this->flash->success("gestion was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "gestions",
            "action" => "index"
        ));

    }

    /**
     * Deletes a gestion
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $gestion = Gestions::findFirstByid($id);
        if (!$gestion) {
            $this->flash->error("gestion was not found");

            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "index"
            ));
        }

        if (!$gestion->delete()) {

            foreach ($gestion->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "gestions",
                "action" => "search"
            ));
        }

        $this->flash->success("gestion was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "gestions",
            "action" => "index"
        ));
    }

}
