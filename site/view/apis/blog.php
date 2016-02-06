<?php

$posts = json_encode($posts);
echo $_GET['jsoncallback'] . '(' . $posts . ')';
?>