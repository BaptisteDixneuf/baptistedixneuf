<?php

class LinksController extends Controller {

    function index() {
        $this->loadModel('Link');
        $this->loadModel('Links_category');
        $this->loadModel('Category');
        $this->layout = 'links';

        /* On  récupère tous les liens */
       /* $sql = "SELECT * FROM links WHERE online='1' ORDER BY id DESC ";
        $d['liens'] = $this->Link->executer($sql);
        $liste = '';*/

        $perPage = 5;
        $d['liens'] = $this->Link->find(array(
            'conditions' => array('online' => 1),
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage,
            'order' => 'id DESC'
        ));
        $d['total'] = $this->Link->findCount(array('online' => 1));
        $d['page'] = ceil($d['total'] / $perPage);
        $liste = '';



        /* On récupére la liste des id des liens */
        for ($i = 0; $i < count($d['liens']); $i++) {
            $liste.=$d['liens'][$i]->id . ',';
        }
        $liste = substr($liste, 0, -1);

        /* On va cherhcer les catégories associées et leur nom */
        $sql2 = "SELECT * FROM links_categorys
		INNER JOIN categorys ON links_categorys.category_id = categorys.id
		WHERE link_id 
		IN (" . $liste . ");"




        ;
        $d['liens_categories'] = $this->Links_category->executer($sql2);


        /* on ajoute les catégories aux liens */
        for ($i = 0; $i < count($d['liens']); $i++) {
            $compteur = 0;
            for ($j = 0; $j < count($d['liens_categories']); $j++) {
                if ($d['liens'][$i]->id == $d['liens_categories'][$j]->link_id) {
                    $d['liens'][$i]->categorys[$compteur] = $d['liens_categories'][$j];
                    $compteur++;
                }
            }
        }

        $this->set($d);
    }



     /**
     * Permet d'afficher un lien dans les détailles
     * @param $id, $slug
     * */
    function view($id) {

        /* Récupérer les articles */
        $this->loadModel('Link');
        $conditions = array('online' => 1, 'id' => $id);
        $d['link'] = $this->Link->findFirst(array(
            'conditions' => $conditions
        ));

        if (empty($d['link'])) {
            $this->e404('Page introuvable');
        }
      
        $this->loadModel('Category');
        $this->loadModel('Links_category');


        $sql2 = "SELECT * FROM links_categorys
        INNER JOIN categorys ON links_categorys.category_id = categorys.id
        WHERE link_id 
        IN (" . $d['link']->id . ");"




        ;
        $d['category'] = $this->Links_category->executer($sql2);


       


        /*  On envoie le resultat à la vue */

        $this->set($d);
    }

    
 





    /**
     * ADMIN
     * */

    /**
     * Permet d'afficher les liens mode admin
     * */
    function admin_index() {

        $this->loadModel('Link');
        $d['links'] = $this->Link->find(array(
            'order' => 'id DESC'
        ));
        $this->set($d);
    }

    /**
     * Permet d'éditer un lien
     * */
    function admin_edit($id = null) {
        $this->loadModel('Link');
        $this->loadModel('Links_category');

        if ($id === null) {
            $post = $this->Link->findFirst(array(
                'conditions' => array('online' => -1)
            ));
            if (!empty($post)) {
                $id = $post->id;
            } else {
                $this->Link->save(array(
                    "online" => -1
                ));
                $id = $this->Link->id;
            }
        }
        $d['id'] = $id;

        if ($this->request->data) {

            #On sauvegarde les categories associés
            $id_link = $this->request->data->id;

            #On remet à zéro 
            $this->Links_category->delete($id_link, 'link_id');

            foreach ($this->request->data as $k => $v) {

                # on ajoute les infos entres les liens et catégorys
                if (is_numeric($k)) {
                    unset($this->request->data->$k);
                    if ($v == 1) {
                        $sql = 'INSERT INTO links_categorys (link_id, category_id) VALUES (' . $id_link . ',' . $k . ')';
                        $this->Link->executer($sql);
                    }
                }
            }

            $this->request->data->date = date('Y-m-d');
            $this->Link->save($this->request->data);
            $this->Session->setFlash('Le contenu a bien été modifiée', 'success');
            $id = $this->Link->id;
            $this->redirect('admin/links/index');
        } else {

            $this->request->data = $this->Link->findFirst(array(
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
     * Permet de supprimer un lien
     * */
    function admin_delete($id) {
        $this->loadModel('Link');
        $this->loadModel('Links_category');
        $this->Link->delete($id);
        $this->Links_category->delete($id, 'link_id');
        $this->Session->setFlash('Le contenu a bien été supprimé !', 'success');
        $this->redirect('admin/links/index');
    }

}

?>