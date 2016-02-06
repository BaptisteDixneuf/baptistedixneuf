<?php

class SourcesController extends Controller {


	/**
     * ADMIN
     * */

    /**
     * Permet d'afficher les objets de type mode admin
     * */
    function admin_index() {

        $this->loadModel('Source');
        $d['sources'] = $this->Source->find(array(
            'order' => 'id DESC'
        ));
        $this->set($d);
    }


     /**
     * Permet d'éditer un lien
     * */
    function admin_edit($id = null) {
        $this->loadModel('Source');
        $this->loadModel('Sources_category');

        if ($id === null) {
            $post = $this->Source->findFirst(array(
                'conditions' => array('online' => -1)
            ));
            if (!empty($post)) {
                $id = $post->id;
            } else {
                $this->Source->save(array(
                    "online" => -1
                ));
                $id = $this->Source->id;
            }
        }
        $d['id'] = $id;

        if ($this->request->data) {

            #On sauvegarde les categories associés
            $id_source = $this->request->data->id;

            #On remet à zéro 
            $this->Sources_category->delete($id_source, 'source_id');

            foreach ($this->request->data as $k => $v) {

                # on ajoute les infos entres les liens et catégorys
                if (is_numeric($k)) {
                    unset($this->request->data->$k);
                    if ($v == 1) {
                        $sql = 'INSERT INTO sources_categorys (source_id, category_id) VALUES (' . $id_source . ',' . $k . ')';
                        $this->Source->executer($sql);
                    }
                }
            }

            $this->request->data->date = date('Y-m-d');
            $this->Source->save($this->request->data);
            $this->Session->setFlash('Le contenu a bien été modifiée', 'success');
            $id = $this->Source->id;
            $this->redirect('admin/sources/index');
        } else {

            $this->request->data = $this->Source->findFirst(array(
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
        $this->loadModel('Source');
        $this->loadModel('Sources_category');
        $this->Source->delete($id);
        $this->Sources_category->delete($id, 'source_id');
        $this->Session->setFlash('Le contenu a bien été supprimé !', 'success');
        $this->redirect('admin/sources/index');
    }


}