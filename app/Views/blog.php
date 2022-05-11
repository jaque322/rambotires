<b><?= $title ?></b>
<div class="row">

<?php foreach ($posts as $post):?>
<?= view_cell('\App\Libraries\Blog::postItem',['title'=>$post])?>
<?php endforeach?>
</div>

