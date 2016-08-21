<div class="row">
    <div class="col-sm-12 col-md-12 pull-right">
        <div class="navbar-collapse navbar-actions">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?controller=categorys&action=index" id="home" name="home" class="btn btn-success btn-action"><span class="icon icon-chevron-left" aria-hidden="true"></span> Retour à l'accueil</a></li>
                <?php if (isset($validate)){ ?>
                    <?php if ($validate){ ?>
                        <li>&nbsp;</li>
                        <li><a href="?controller=sheets&action=create&idcategory=<?=$category->id?>" id="addsheetcategory" name="addsheetcategory"  class="btn btn-success btn-action"><span class="icon icon-pencil" aria-hidden="true"></span> Ajouter une fiche</a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <?php if (isset($validate)){ ?>
        <div class="col-sm-12 col-md-12 col-paddingtop">
            <?php if ($validate){ ?>
                <div class="alert alert-success" role="alert">Catégorie enregistrée</div>
            <?php }else{ ?>
                <div class="alert alert-warning" role="alert">Veuillez renseigner le nom de la catégorie</div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="col-sm-12 col-md-12">
    <form name="create_category" id="create_category" class="form-horizontal" action="?controller=categorys&action=validate" method="post">
        <fieldset>
            <legend>
                <?=(isset($category) ? 'Vous souhaitez modifier la catégorie : '.$category->label.' ?' : 'Vous souhaitez créer une nouvelle catégorie ?') ?>
            </legend>

            <input name="id" id="id" type="hidden" value="<?=(isset($category) ? $category->id : '') ?>">

            <div class="form-group">
                <label class="col-md-4 control-label" for="label">Nom de la catégorie *</label>
                <div class="col-md-4">
                    <input name="label" id="label" placeholder="catégorie..." required="required" class="form-control input-md" type="text" value="<?=(isset($category) ? $category->label : '') ?>">
                    <small id="emailHelp" class="form-text text-muted">Une image par défaut sera affectée à la catégorie lors de l'enregistrement.</small>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id"  class="btn btn-success">  Enregistrer</button>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <span class="info-fields-form">Le champ suivie d'un * est obligatoire.</span>
                </div>
            </div>

        </fieldset>
    </form>
    </div>
</div>