<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller {
  public function initialize() {

//    $this->assets ->collection('header') ->addCss('css/bootstrap.min.css');



    if ($this->request->isPost()) {
      $query = Criteria::fromInput($this->di, "Categories", $_POST);
      $this->persistent->parameters = $query->getParams();
    }

    $parameters = $this->persistent->parameters;
    if (!is_array($parameters)) {
      $parameters = array();
    }
    $parameters["order"] = "id";

    $categories = Categories::find(
      array(
        "conditions" => "category_parent_id = ?1",
        "bind"       => array(1 => 0),
        "order"      => "weight",
      )
    );

    $categoriesList = Categories::find(
      array(
        "conditions" => "category_parent_id != ?1",
        "bind"       => array(1 => 0),
        "order"      => "weight",
      )
    );
    if (count($categories) == 0) {
      $this->flash->notice("The search did not find any categories");

      return $this->dispatcher->forward(
        array(
          "controller" => "categories",
          "action"     => "index"
        )
      );
    }

    $this->view->categories = $categories;
    $this->view->categoriesList = $categoriesList;

  }
}
