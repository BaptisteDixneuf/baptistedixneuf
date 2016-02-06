<?php

class ApisController extends Controller {

    function blog() {
        $perPage = 10;
        $this->loadModel('Post');
        $this->layout = 'vide';
        $conditions = array('type' => 'post');

        $d['posts'] = $this->Post->find(array(
            'fields' => 'id,slug,content,name,created',
            'conditions' => $conditions,
            'order' => 'created DESC',
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage
        ));

        $d['total'] = $this->Post->findCount($conditions);
        $d['page'] = ceil($d['total'] / $perPage);
        $this->set($d);
    }

    function liens() {
        $this->layout = 'vide';
        $this->loadModel('Link');
        $this->loadModel('Links_category');
        $this->loadModel('Category');

        /* On  récupère tous les liens */
        $sql = "SELECT * FROM links WHERE online='1' ORDER BY id DESC ";
        $d['liens'] = $this->Link->executer($sql);
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
		IN (" . $liste . ");";
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

    function tags() {
        $this->layout = 'vide';
        $this->loadModel('Category');

        /* On  récupère tous les liens */
        $sql = "SELECT * FROM categorys WHERE online='1'";
        $d['tags'] = $this->Category->executer($sql);


        $this->set($d);
    }


    /**
     * Permet d'afficher les catégories les plus utilisés
     * @return array top_categories
     * */
    function topcategories(){
        $this->layout = 'vide';
        $this->loadModel('Links_category');
        $this->loadModel('Category');

        $sql = "SELECT C.`name_category`, C.`id`,C.`slug`, count(`category_id`) as count
                FROM `links_categorys` L
                INNER JOIN categorys C
                ON L.`category_id`= C.`id`
                GROUP BY `category_id`
                order by count(`category_id`) desc;";
        $d['top_categories'] = $this->Links_category->executer($sql);

        $this->set($d);
    }

    function viewcategorie($id) {
        $this->layout = 'vide';

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


     function viewlink($id) {
        $this->layout = 'vide';
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
        $this->set($d);       
    }


    function viewall(){

        $this->loadModel('Link');
        $this->loadModel('Links_category');
        $this->loadModel('Category');
        $this->layout = 'vide';

        
        $perPage = 10;
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


    

    function sourcecategorie($id) {
        $this->layout = 'vide';

        /* Récupérer les articles */
        $this->loadModel('Source');          
        $this->loadModel('Sources_category');




        /*         * ************************************
          RECUPERATION DES LIENS
         * ************************************ */

        /* On va cherhcer les catégories associées et leur nom */
        $sql2 = "SELECT * FROM sources_categorys
        INNER JOIN categorys ON sources_categorys.category_id = categorys.id
        INNER JOIN sources ON sources.id=sources_categorys.source_id
        WHERE sources_categorys.category_id=". $id . "
        ORDER BY sources.id DESC";


        $d['source'] = $this->Sources_category->executer($sql2);




        $this->set($d);
    }


}
