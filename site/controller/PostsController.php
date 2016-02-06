<?php

class PostsController extends Controller {

    /**
     * Liste les différents articles pour la page d'accueil
     * ++ Pagination
     */
    function index() {
        $perPage = 5;
        $this->loadModel('Post');
        $conditions = array('online' => 1, 'type' => 'post');


        $d['posts'] = $this->Post->find(array(
            'conditions' => $conditions,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage,
            'order' => 'created DESC'
        ));
        $d['total'] = $this->Post->findCount($conditions);
        $d['page'] = ceil($d['total'] / $perPage);

        $this->loadModel('Category');

        //Permet de rechercher le nom des catégories
        $data['categorys'] = $this->Category->find(array(
            'fields' => 'id,name_category',
        ));


        //Catégorie par défaut
        for ($nbarticle = 0; $nbarticle < count($d['posts']); $nbarticle++) {
            $d['posts'][$nbarticle]->name_category = "Aucune Catégorie";
        }


        //Permet de récupérer le nom de la catégorie si elle existe
        for ($nbarticle = 0; $nbarticle < count($d['posts']); $nbarticle++) {

            for ($id = 0; $id < count($data['categorys']); $id++) {
                if ($data['categorys'][$id]->id == $d['posts'][$nbarticle]->id_category) {
                    $d['posts'][$nbarticle]->name_category = $data['categorys'][$id]->name_category;
                }
            }
        }



        //debug($data['categorys'][0]->id);
        //debug($d['posts'][1]->id_category);
        //debug($d['posts']);

        $this->set($d);
    }

    /**
     * Permet d'afficher un article dans les détailles
     * @param $id, $slug
     * */
    function view($id, $slug) {

        /* Récupérer les articles */
        $this->loadModel('Post');
        $conditions = array('online' => 1, 'id' => $id, 'type' => 'post');
        $d['post'] = $this->Post->findFirst(array(
            'fields' => 'id,slug,content,name,created,id_category',
            'conditions' => $conditions
        ));

        if (empty($d['post'])) {
            $this->e404('Page introuvable');
        }
        if ($slug != $d['post']->slug) {
            $this->redirect("posts/view/id:$id/slug:" . $d['post']->slug, 301);
        }

        $this->loadModel('Category');

        //Permet de rechercher le nom des catégories
        $data['categorys'] = $this->Category->find(array(
            'fields' => 'id,name_category',
        ));

        $d['post']->name_category = "Aucune Catégorie";



        for ($id = 0; $id < count($data['categorys']); $id++) {
            if ($data['categorys'][$id]->id == $d['post']->id_category) {
                $d['post']->name_category = $data['categorys'][$id]->name_category;
            }
        }


        /*  On envoie le resultat à la vue */

        $this->set($d);
    }

    /**
     * ADMIN
     * */

    /**
     * Permet d'afficher les articles mode admin
     * */
    function admin_index() {
        $perPage = 10;
        $this->loadModel('Post');
        $conditions = array('type' => 'post');

        $d['posts'] = $this->Post->find(array(
            'fields' => 'id,name,online',
            'conditions' => $conditions,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage
        ));

        $d['total'] = $this->Post->findCount($conditions);
        $d['page'] = ceil($d['total'] / $perPage);


        $this->set($d);
    }

    /**
     * Permet d'éditer un article
     * */
    function admin_edit($id = null) {
        $this->loadModel('Post');
        if ($id === null) {
            $post = $this->Post->findFirst(array(
                'conditions' => array('online' => -1)
            ));
            if (!empty($post)) {
                $id = $post->id;
            } else {
                $this->Post->save(array(
                    "online" => -1
                ));
                $id = $this->Post->id;
            }
        }
        $d['id'] = $id;

        if ($this->request->data) {
            if ($this->Post->validates($this->request->data)) {
                $this->request->data->type = 'post';
                $this->request->data->created = date('Y-m-d h:i:s');
                $this->request->data->user_id = 1;

                $this->Post->save($this->request->data);
                $this->Session->setFlash('Le contenu a bien été modifiée', 'success');
                $id = $this->Post->id;
                $this->redirect('admin/posts/index');
            } else {
                $this->Session->setFlash('Merci de corriger vos informations . ', 'danger');
            }
        } else {

            $this->request->data = $this->Post->findFirst(array(
                'conditions' => array('id' => $id)
            ));
            $d['id'] = $id;
        }

        $this->loadModel('Category');
        $d['categorys'] = $this->Category->find(array(
            'fields' => 'id,name_category',
        ));

        $this->set($d);
    }

    /**
     * Permet de supprimer un article
     * */
    function admin_delete($id) {
        $this->loadModel('Post');
        $this->Post->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé !', 'success');
        $this->redirect('admin/posts/index');
    }

}

?>