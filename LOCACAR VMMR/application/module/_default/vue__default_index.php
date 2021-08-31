
<section class="text-dark-50 bg-sucess">
    <label class="text-dark" for="chercher">Choisir un departement, recherchez une agence   </label><input type="text"class="form-control" id="chercher">
    <div class="form-group bg-dark"id="divreponse"></div>
</section>


<section class="container mt-5 pt-5 border border-3 border-dark">
    <!-- Carousel -->
    <!-- Créer un carousel -->
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <!-- Indicateurs -->
        <ul class="carousel-indicators">
            <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
        </ul>
        <!-- Contenu du carousel -->
        <div class="carousel-inner">
            <!--  Slide 1 -->
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="../www/_images/.jpg" class="w-100 d-block" alt="Japon">
                <!-- Description -->
                <div class="carousel-caption bg-success text-white">
                    <h5>C'est le printemps !</h5>
                    <p>Profitez de nos super offres !</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="../www/_images/image3.jpg" class="w-100 d-block" alt="Japon">
                <!-- Description -->
                <div class="carousel-caption w-25 bg-info">
                    <h5>Envie de s'évader ?</h5>
                    <p>Nos voitures vous emmènent où vous voulez</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="../www/_images/appel.jpg" class="w-100 d-block" alt="Japon">
                <!-- Description -->
                <div class="carousel-caption w-25 bg-info">
                    <h5>Appelez-nous !</h5>
                    <p>Nos SRC sont disponibles de 9h à 20h pour vous satisfaire</p>
                </div>
            </div>
            <section>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" href="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark"></span>
            <span class="sr-only">Précédent</span>
        </button>
        <button class="carousel-control-next" href="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark"></span>
            <span class="sr-only">Suivant</span>
        </button>
    </div> <!--  -->
</section> <!-- /Carousel -->


<section class="container mt-5 pt-5 border border-3 border-dark"> <!-- Catégories  -->   
    <div>        <!-- 2 -->
        <h3 class="text-center">NOTRE PARC AUTOMOBILE</h3>
        <div class="row pt-5">         
            <!-- row1  -->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/petite.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href='<?= hlien("categorie", "voiture","cat_id",$row["cat_id"]=1) ?>' class="btn btn-primary">PETIT</a>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/prestige3.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href='<?= hlien("categorie", "voiture","cat_id",$row["cat_id"]=2) ?>' class="btn btn-primary">MOYEN</a>
                    </div>
                </div>

            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/grand.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href='<?= hlien("categorie", "voiture","cat_id",$row["cat_id"]= 3) ?>' class="btn btn-primary">GRAND</a>
                    </div>
                </div>

            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/utilitaire.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href='<?= hlien("categorie", "voiture","cat_id",$row['cat_id']= 4) ?>' class="btn btn-primary">UTILITAIRE</a>
                    </div>
                </div>

            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/p.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href='<?= hlien("categorie","voiture", "cat_id",$row["cat_id"]=5) ?>' class="btn btn-primary">PRESTIGE</a>
                    </div>
                </div>

            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../www/_images/camping_car.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href='<?= hlien("categorie","voiture", "cat_id",$row["cat_id"]=6) ?>' class="btn btn-primary">CAMPING CAR</a>
                    </div>
                </div>
            </div>

        </div>
        <!--row1  -->
    </div>
    <!--row2  -->
<!-- Catégories  -->





<script src="_js/rechercheajax.class.js"></script>
<!--<script src="_js/maconsole.class.js"></script>-->
<script>
    new RechercheAjax(chercher, 2, "<?= hlien("_default", "ajax_chercher") ?>", divreponse);
</script>

