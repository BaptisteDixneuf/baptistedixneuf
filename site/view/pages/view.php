<link rel="stylesheet" href="https://rawgit.com/Grafikart/JS-Markdown-Editor/master/dist/mdeditor.css">

<?php
$title_for_layout = $page->name;
?>
<div class="page-titre " >
    <h1><?php echo $page->name; ?></h1>
</div>


<?php 
	if($page->is_markdown) { 
		require_once('markdown/Michelf/MarkdownExtra.inc.php'); 
		require_once('markdown/Michelf/MarkdownExtra.php'); 
		$html = \Michelf\MarkdownExtra::defaultTransform($page->content);
		?>

		<div class="page-contenu mdeditor_render">
    		<?php echo $html; ?>
		</div>
<?php
}else{
?>
<div class="page-contenu" >
    <?php echo $page->content; ?>
</div>
<?php
}
?>





