<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProjectsBlogsController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for projects_blogs
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "ProjectsBlogs", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $projects_blogs = ProjectsBlogs::find($parameters);
        if (count($projects_blogs) == 0) {
            $this->flash->notice("The search did not find any projects_blogs");

            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $projects_blogs,
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
     * Edits a projects_blog
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $projects_blog = ProjectsBlogs::findFirstByid($id);
            if (!$projects_blog) {
                $this->flash->error("projects_blog was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "projects_blogs",
                    "action" => "index"
                ));
            }

            $this->view->id = $projects_blog->id;

            $this->tag->setDefault("id", $projects_blog->id);
            $this->tag->setDefault("project_id", $projects_blog->project_id);
            $this->tag->setDefault("description", $projects_blog->description);
            
        }
    }

    /**
     * Creates a new projects_blog
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "index"
            ));
        }

        $projects_blog = new ProjectsBlogs();

        $projects_blog->project_id = $this->request->getPost("project_id");
        $projects_blog->description = $this->request->getPost("description");
        

        if (!$projects_blog->save()) {
            foreach ($projects_blog->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "new"
            ));
        }

        $this->flash->success("projects_blog was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects_blogs",
            "action" => "index"
        ));

    }

    /**
     * Saves a projects_blog edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $projects_blog = ProjectsBlogs::findFirstByid($id);
        if (!$projects_blog) {
            $this->flash->error("projects_blog does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "index"
            ));
        }

        $projects_blog->project_id = $this->request->getPost("project_id");
        $projects_blog->description = $this->request->getPost("description");
        

        if (!$projects_blog->save()) {

            foreach ($projects_blog->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "edit",
                "params" => array($projects_blog->id)
            ));
        }

        $this->flash->success("projects_blog was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects_blogs",
            "action" => "index"
        ));

    }

    /**
     * Deletes a projects_blog
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $projects_blog = ProjectsBlogs::findFirstByid($id);
        if (!$projects_blog) {
            $this->flash->error("projects_blog was not found");

            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "index"
            ));
        }

        if (!$projects_blog->delete()) {

            foreach ($projects_blog->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "projects_blogs",
                "action" => "search"
            ));
        }

        $this->flash->success("projects_blog was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "projects_blogs",
            "action" => "index"
        ));
    }

}
