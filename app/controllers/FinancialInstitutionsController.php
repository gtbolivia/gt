<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class FinancialInstitutionsController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for financial_institutions
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "FinancialInstitutions", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $financial_institutions = FinancialInstitutions::find($parameters);
        if (count($financial_institutions) == 0) {
            $this->flash->notice("The search did not find any financial_institutions");

            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $financial_institutions,
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
     * Edits a financial_institution
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $financial_institution = FinancialInstitutions::findFirstByid($id);
            if (!$financial_institution) {
                $this->flash->error("financial_institution was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "financial_institutions",
                    "action" => "index"
                ));
            }

            $this->view->id = $financial_institution->id;

            $this->tag->setDefault("id", $financial_institution->id);
            $this->tag->setDefault("name", $financial_institution->name);
            
        }
    }

    /**
     * Creates a new financial_institution
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "index"
            ));
        }

        $financial_institution = new FinancialInstitutions();

        $financial_institution->name = $this->request->getPost("name");
        

        if (!$financial_institution->save()) {
            foreach ($financial_institution->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "new"
            ));
        }

        $this->flash->success("financial_institution was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "financial_institutions",
            "action" => "index"
        ));

    }

    /**
     * Saves a financial_institution edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $financial_institution = FinancialInstitutions::findFirstByid($id);
        if (!$financial_institution) {
            $this->flash->error("financial_institution does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "index"
            ));
        }

        $financial_institution->name = $this->request->getPost("name");
        

        if (!$financial_institution->save()) {

            foreach ($financial_institution->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "edit",
                "params" => array($financial_institution->id)
            ));
        }

        $this->flash->success("financial_institution was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "financial_institutions",
            "action" => "index"
        ));

    }

    /**
     * Deletes a financial_institution
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $financial_institution = FinancialInstitutions::findFirstByid($id);
        if (!$financial_institution) {
            $this->flash->error("financial_institution was not found");

            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "index"
            ));
        }

        if (!$financial_institution->delete()) {

            foreach ($financial_institution->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "financial_institutions",
                "action" => "search"
            ));
        }

        $this->flash->success("financial_institution was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "financial_institutions",
            "action" => "index"
        ));
    }

}
