<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}
$less = new lessc;
$less->compileFile('less/3107.less', 'css/3107.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 (1)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="<?php echo $url_path ?>/css/3107.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row product-container">
            <div class="col-md-6">
                <img id="mainImage" src="./img/3107.jpg" alt="Blouse" class="img-fluid mb-3 product-cover">
                <div class="row mt-4 product-thumbnails">
                    <div class="col-3">
                        <img src="./img/3107.jpg" data-src="./img/3107.jpg" alt="BLOUSE" class="img-thumbnail"
                            onclick="changeImage(this)">
                    </div>
                    <div class="col-3">
                        <img src="./img/3107_1.jpg" data-src="./img/3107_1.jpg" alt="BLOUSE"
                            class="img-thumbnail" onclick="changeImage(this)">
                    </div>
                    <div class="col-3">
                        <img src="./img/3107_2.jpg" data-src="./img/3107_2.jpg" alt="BLOUSE"
                            class="img-thumbnail" onclick="changeImage(this)">
                    </div>
                    <div class="col-3">
                        <img src="./img/3107_3.jpg" data-src="./img/3107_3.jpg" alt="BLOUSE"
                            class="img-thumbnail" onclick="changeImage(this)">
                    </div>
                </div>

            </div>
            <div class="col-md-6 product-info">
                <h1 class="mb-3">BLOUSE</h1>
                <p class="mb-3">
                    <span class="text-warning fs-3 fw-bold">$24.29</span>
                    <span class="text-muted text-decoration-line-through ms-2">$26.99</span>
                </p>
                <p class="text-muted mb-4">Short-sleeved blouse with feminine draped sleeve detail.</p>

                <div class="mb-3">
                    <label for="size" class="form-label">SIZE</label>
                    <select class="form-select" id="size" style="width: auto;">
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">COLOR</label>
                    <div>
                        <span class="color-option bg-white"></span>
                        <span class="color-option bg-dark"></span>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <label for="quantity" class="form-label me-3 mb-0">QUANTITY</label>
                    <div class="input-group" style="width: 120px;">
                        <button class="btn btn-outline-secondary" type="button" id="decreaseBtn">-</button>
                        <input type="text" class="form-control quantity-input" id="quantity" value="1">
                        <button class="btn btn-outline-secondary" type="button" id="increaseBtn">+</button>
                    </div>
                    <button class="btn btn-primary ms-3">
                        <i class="fas fa-shopping-cart me-2"></i>Add to cart
                    </button>
                    <span class="text-success ms-3"><i class="fas fa-check"></i> In stock</span>
                </div>

                <div class="mb-4 section-border">
                    <label class="form-label">SHARE</label>
                    <div class="social-share">
                        <a href="#" class="bg-primary text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="bg-info text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="bg-danger text-white"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="./js/3107.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>