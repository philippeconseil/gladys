<div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="alert alert-info info-categorie" role="alert">Nos catégories</div>
    </div>

    <div class="col-sm-12 col-md-12 pull-right">
        <div class="navbar-collapse navbar-actions">
            <div class="nav navbar-nav navbar-left">
                Retrouvez ci-dessous toutes nos catégories.
                <br />
                Vous souhaitez ajouter une nouvelle catégorie ? <a title="Ajouter une catégorie" alt="Ajouter une catégorie" href="?controller=categorys&action=create">cliquez ici</a>.
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?controller=categorys&action=order" id="ordercategory" name="ordercategory"  class="btn btn-success btn-action"><span class="icon icon-arrows-alt" aria-hidden="true"></span> Gestion de l'ordre d'affichage</a></li>
            </ul>
        </div>
    </div>

    <?php if(isset($statusDelete)){ ?>
        <?php if($statusDelete){ ?>
        <div class="col-sm-12 col-md-12">
            <div class="alert alert-info info-categorie" role="alert">La suppression de la catégorie à bien été enregistrée.</div>
        </div>
        <?php } ?>
    <?php } ?>
</div>
<div class="row">
    <?php foreach($categorys as $category) { ?>
      <div class="col-sm-3 col-md-3">
        <a class="category" href='?controller=categorys&action=show&id=<?php echo $category->id; ?>' title="<?php echo $category->label; ?>" alt="<?php echo $category->label; ?>">
          <figure class="figure">
            <img src="<?php echo $category->image; ?>" class="img-responsive figure-img img-fluid img-rounded" alt="<?php echo $category->label; ?>">
            <figcaption class="figure-caption text-xs-middle title-category"><?php echo $category->label; ?></figcaption>
          </figure>
        </a>
      </div>
    <?php } ?>
  </div>
</div>
