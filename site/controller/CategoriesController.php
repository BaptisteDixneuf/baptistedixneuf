<?php

class CategoriesController extends Controller {

    /**
     * Permet d'afficher un article dans les détailles
     * @param $id, $slug
     * */
    function view($id, $slug) {
        $this->layout = 'links';
        /* Récupérer les articles */
        $this->loadModel('Category');
        $conditions = array('online' => 1, 'id' => $id);
        $d['category'] = $this->Category->findFirst(array(
            'fields' => 'id,name_category,slug,online',
            'conditions' => $conditions
            
        ));

        if (empty($d['category'])) {
            $this->e404('Page introuvable');
        }
        if ($slug != $d['category']->slug) {
            $this->redirect("categories/view/id:$id/slug:" . $d['category']->slug, 301);
        }


        $this->loadModel('Links_category');




        /*         * ************************************
          RECUPERATION DES LIENS
         * ************************************ */

        /* On va cherhcer les catégories associées et leur nom */
        $sql2 = "SELECT * FROM links_categorys
		INNER JOIN categorys ON links_categorys.category_id = categorys.id
		INNER JOIN links ON links.id=links_categorys.link_id
		WHERE links_categorys.category_id=". $d['category']->id . "
        ORDER BY links.id DESC";


        $d['liens'] = $this->Links_category->executer($sql2);




        $this->set($d);
    }


    /**
     * Permet d'afficher les catégories les plus utilisés
     * @return array top_categories
     * */
    function getTopCategories(){
        $this->loadModel('Links_category');
        $this->loadModel('Category');

        $sql = "SELECT C.`name_category`, C.`id`,C.`slug`, count(`category_id`) as count
                FROM `links_categorys` L
                INNER JOIN categorys C
                ON L.`category_id`= C.`id`
                GROUP BY `category_id`
                order by count(`category_id`) desc;";
        $d['top_categories'] = $this->Links_category->executer($sql);
        return $d['top_categories'];
    }

    /**
     * ADMIN
     * */

    /**
     * Permet d'afficher les articles mode admin
     * */
    function admin_index() {

        $this->loadModel('Category');
        $d['categorys'] = $this->Category->find();


        $this->set($d);
    }

    /**
     * Permet d'éditer une catégorie
     * @param $id 
     * */
    function admin_edit($id = null) {
        $this->loadModel('Category');
        if ($id === null) {
            $page = $this->Category->findFirst(array(
                'conditions' => array('online' => -1)
            ));
            if (!empty($Category)) {
                $id = $Category->id;
            } else {
                $this->Category->save(array(
                    "online" => -1
                ));
                $id = $this->Category->id;
            }
        }

        $d['id'] = $id;

        if ($this->request->data) {

            $this->Category->save($this->request->data);

            $this->Session->setFlash('Le contenu a bien été modifiée', 'success');
            $id = $this->Category->id;
            $this->redirect('admin/categories/index');
        } else {

            $this->request->data = $this->Category->findFirst(array(
                'conditions' => array('id' => $id)
            ));
            $d['id'] = $id;
        }


        $this->set($d);
    }

    /**
     * Permet de supprimer une catégorie
     * @param $id
     * */
    function admin_delete($id) {
        $this->loadModel('Category');
        $this->Category->delete($id);
        $this->Session->setFlash('La catégorie a bien été supprimé !', 'success');
        $this->redirect('admin/categories/index');
    }

}

?>