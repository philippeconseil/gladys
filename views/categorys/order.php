<div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="alert alert-info info-categorie" role="alert">Ordonner les catégories</div>
    </div>

    <div class="col-sm-12 col-md-12 pull-right">
        <div class="navbar-collapse navbar-actions">
            <div class="nav navbar-nav navbar-left">
                Vous pouvez ré-organiser l'ensemble des catégories en les déplacants.
                <br />
                L'enregistrement est automatique.
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?controller=categorys&action=index" id="ordercategory" name="ordercategory"  class="btn btn-success btn-action"><span class="icon icon-chevron-left" aria-hidden="true"></span> Liste des catégories</a></li>
            </ul>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 order">
        <ul class="row" id="list-categorys">
        <?php foreach($categorys as $category) { ?>
            <li class="col-sm-6 col-md-6" id="category_<?php echo $category->id ?>">
                <img src="<?php echo $category->image; ?>" class="img-responsive figure-img img-fluid img-rounded" alt="<?php echo $category->label; ?>">
                <p><?php echo $category->label; ?></p>
            </li>
        <?php } ?>
        </ul>
    </div>
  </div>
</div>
