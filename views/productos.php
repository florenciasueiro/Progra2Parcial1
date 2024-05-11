<?php
require_once 'classes/producto.php';

$id = $_GET['id'] ?? FALSE;
$filtro = $_GET['filtro'] ?? FALSE;
$descuento = $_GET['descuento'] ?? FALSE;

$miProducto = new Producto();

if ($filtro) {
    $productos = $miProducto->catalogoPorCategoria($filtro);
}else if($descuento){
    $productos = $miProducto->catalogoPorDescuento($descuento);
} else {
    $productos = $miProducto->catalogoCompleto();
}
?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/Productos-4.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/Productos-3.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/Productos-2.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
</div>


<section class="sectionProducts">
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="container mt-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="ingredientesHeading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ingredientesCollapse" aria-expanded="true" aria-controls="ingredientesCollapse"> Tipo de piel
                            </button>
                        </h2>
                        <div id="ingredientesCollapse" class="accordion-collapse collapse show" aria-labelledby="ingredientesHeading" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    <a href="index.php?sec=productos&filtro=todo-tipo" class="list-group-item">Todo tipo</a>
                                    <a href="index.php?sec=productos&filtro=piel-grasa" class="list-group-item">Piel grasa</a>
                                    <a href="index.php?sec=productos&filtro=piel-mixta" class="list-group-item">Piel mixta</a>
                                    <a href="index.php?sec=productos&filtro=piel-seca" class="list-group-item">Piel seca</a>
                                    <a href="index.php?sec=productos&filtro=piel-seca" class="list-group-item">Piel madura</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="categoriaHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoriaCollapse" aria-expanded="false" aria-controls="categoriaCollapse">
                                Categoría
                            </button>
                        </h2>
                        <div id="categoriaCollapse" class="accordion-collapse collapse" aria-labelledby="categoriaHeading" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                                <a href="index.php?sec=productos&filtro=Skincare" class="list-group-item">Skincare</a>
                                <a href="index.php?sec=productos&filtro=Cabello" class="list-group-item">Hair</a>
                                <a href="index.php?sec=productos&filtro=Maquillaje" class="list-group-item">Makeup</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="ofertasHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"  data-bs-target="#ofertasCollapse" aria-expanded="false" aria-controls="ofertasCollapse">
                                Ofertas
                            </button>
                        </h2>
                        <div id="ofertasCollapse" class="accordion-collapse collapse" aria-labelledby="ofertasHeading" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    <a href="index.php?sec=productos&descuento=15" class="list-group-item">Hasta 15%</a>
                                    <a href="index.php?sec=productos&descuento=20" class="list-group-item">Hasta 20%</a>
                                    <a href="index.php?sec=productos&descuento=40" class="list-group-item">Hasta 40%</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-9">
    <section class="sectionProducts">
        <!-- Aquí va tu sección de productos -->
        <div class="container">
            <div class="row">
                <?php if (!empty($productos)) {
                    foreach ($productos as $producto) { ?>
                        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-12">
                            <div id="product-1" class="single-product">
                                <div class="part-1">
                                    <img class="part-1 img" src="./img/<?= $producto->getImagen() ?>" alt="">
                                    <ul>
                                        <li><a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.060.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                </svg>
                                            </a></li>
                                        <li><a href="index.php?sec=detalles&id=<?= $producto->getId() ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="part-2">
                                    <h5 class="product-title"><?= $producto->getNombre() ?></h5>
                                    <p class="product-description"><?= $producto->getDescripcion() ?></p>
                                    <h4 class="product-old-price">$<?= $producto->precioFormateado() ?></h4>
                                    <h4 class="product-price">$<?= $producto->precioDescuento() ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="col">
                        <h2 class="text-center m-5">No se encontraron productos.</h2>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>


</section>
