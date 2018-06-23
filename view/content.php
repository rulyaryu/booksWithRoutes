<?php 
    // require_once './components/content_component.php';
    // // echo $pageObj->getPage();
    var_dump($max);
?>

<div class="container">
<?php foreach($chunkedBooks as $key => $row) : ?>
    <div class="row">
    
    <?php foreach($row as $i => $book) : ?>
        <div class="col s4 m4">
        <div class="card">
            <div class="card-image">
            <img src="<?=$book['imgUrl']?>">
            </div>
            <div class="card-content">
            <span class="card-title purple-text text-accent-4"><?=$book['title']?></span>
            <p><?=$book['author']?></p>
            <p><?=$book['category']?></p>
            </div>
            <div class="card-action">
            <a href="#">This is a link</a>
            </div>
        </div>
        </div>
    <?php endforeach;?>        
    
    </div>
<?php endforeach;?>
  </div>

