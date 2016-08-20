<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-info info-categorie" role="alert">Fiche<?=(count($sheetsCategory)>1 ? 's':'')?> de la catégorie : <?php echo $category->label; ?></div>
    </div>
    <div class="col-sm-12 col-md-12 pull-right">
        <div class="navbar-collapse navbar-actions">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="?controller=categorys&action=index" id="indexcategory" name="indexcategory"  class="btn btn-info btn-action"><span class="icon icon-chevron-left" aria-hidden="true"></span> Retour à la liste</a></li>
                <li>&nbsp;</li>
                <li><a href="?controller=sheets&action=create&idcategory=<?=$category->id?>" id="addsheetcategory" name="addsheetcategory"  class="btn btn-success btn-action"><span class="icon icon-pencil" aria-hidden="true"></span> Ajouter une fiche</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?controller=categorys&action=create&id=<?=$category->id?>" id="editcategory" name="editcategory"  class="btn btn-success btn-action"><span class="icon icon-pencil" aria-hidden="true"></span> Modifier</a></li>
                <li>&nbsp;</li>
                <li><a href="?controller=categorys&action=delete&id=<?=$category->id?>" id="deletecategory" name="deletecategory"  class="btn btn-warning btn-action" data-confirm="Etes-vous sûr de vouloir supprimer cette catégorie ? Cela supprimera toutes les fiches associées."><span class="icon icon-trash" aria-hidden="true"></span> Suppprimer</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row list-sheets">
    <?php if (count($sheetsCategory)>0){ ?>
        <?php foreach($sheetsCategory as $key => $sheet) { ?>
            <a class="col-sm-2 col-md-2 link-sheet" href='?controller=sheets&action=show&id=<?php echo $key; ?>&idcategory=<?=$category->id?>' title="<?php echo $sheet['label']; ?>" alt="<?php echo $sheet['label']; ?>">
                <div class="sheet">
                    <div class="title-sheet"><?php echo $sheet['label']; ?></div>
                    <div class="description-sheet"><?php echo nl2br(tronque($sheet['description'],100)); ?></div>
                </div>
            </a>
        <?php } ?>
    <?php }else{ ?>
        <div class="col-sm-12 col-md-12">
            Pour le moment, aucune fiche dans cette catégorie...
        </div>
    <?php } ?>
</div>
