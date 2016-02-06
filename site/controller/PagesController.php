<?php

class PagesController extends Controller {

    /**
     * Pemet de voir une page en détail
     * @param $id
     * */
    function view($id, $slug) {
        $this->layout = 'page';
        $this->loadModel('Page');
        $d['page'] = $this->Page->findFirst(array(
            'conditions' => array('online' => 1, 'id' => $id)
        ));

        if (empty($d['page'])) {
            $this->e404('Page introuvable');
        }

        if ($slug != $d['page']->slug) {
            $this->redirect("pages/view/id:$id/slug:" . $d['page']->slug, 301);
        }


        $this->set($d);
    }

    /**
     * Permet de récupérer les pages pour le menu pour le layout
     * */
    function getMenu() {
        $this->loadModel('Page');
        return $this->Page->find(array(
                    'conditions' => array('online' => 1, 'menu' => 1)
        ));
    }

    /**
     * ADMIN
     * */

    /**
     * Permet d'afficher la liste des pages en mode admin
     * */
    function admin_index() {
        $perPage = 100;
        $this->loadModel('Page');
        $conditions = array('type' => 'page');

        $d['pages'] = $this->Page->find(array(
            'fields' => 'id,name,online,menu',
            'conditions' => $conditions,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage
        ));

        $d['total'] = $this->Page->findCount($conditions);
        $d['page'] = ceil($d['total'] / $perPage);
        $this->set($d);
    }

    /**
     * Permet d'éditer une page
     * @param $id 
     * */
    function admin_edit($id = null) {
        $this->loadModel('Page');
        if ($id === null) {
            $page = $this->Page->findFirst(array(
                'conditions' => array('online' => -1)
            ));
            if (!empty($page)) {
                $id = $page->id;
            } else {
                $this->Page->save(array(
                    "online" => -1
                ));
                $id = $this->Page->id;
            }
        }
        $d['id'] = $id;

        if ($this->request->data) {
            if ($this->Page->validates($this->request->data)) {

                $this->request->data->created = date('Y-m-d h:i:s');
                $this->request->data->type = 'page';
                $this->Page->save($this->request->data);

                $this->Session->setFlash('Le contenu a bien été modifiée', 'success');
                $id = $this->Page->id;
                $this->redirect('admin/pages/index');
            } else {
                $this->Session->setFlash('Merci de corriger vos informations . ', 'danger');
            }
        } else {

            $this->request->data = $this->Page->findFirst(array(
                'conditions' => array('id' => $id)
            ));
            $d['id'] = $id;
        }
         $this->layout = 'edit';

        $this->set($d);
    }

    /**
     * Permet de supprimer une page
     * @param $id
     * */
    function admin_delete($id) {
        $this->loadModel('Page');
        $this->Page->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé !', 'success');
        $this->redirect('admin/pages/index');
    }

}

?>