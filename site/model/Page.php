<?php

class Page extends Model {

    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Vous devez préciser un titre'
        ),
        'slug' => array(
            'rule' => '([a-z0-9\-]+)',
            'message' => "Le slug n'est pas valide"
        )
    );

    function validates($data) {
        $errors = array();
        foreach ($this->validate as $k => $v) {
            if (!isset($data->$k)) {
                $errors[$k] = $v['message'];
            } else {
                if ($v['rule'] == 'notEmpty') {
                    if (empty($data->$k)) {
                        $errors[$k] = $v['message'];
                    }
                } elseif (!preg_match('/^' . $v['rule'] . '$/', $data->$k)) {
                    $errors[$k] = $v['message'];
                }
            }
        }
        $this->errors = $errors;
        if (isset($this->Form)) {
            $this->Form->errors = $errors;
        }
        if (empty($errors)) {
            return true;
        }
        return false;
    }

}

?>