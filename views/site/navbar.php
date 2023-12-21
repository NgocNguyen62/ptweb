<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
// use Yii;
use yii\helpers\Html;
$cates = \app\models\base\Categories::find()->all();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css" />
</head>

<body>
    <header class="header has-sticky sticky-jump fixed">
        <div class="wrapper">
            <div id="masthead" class="menu flex-row container-fluid row align-items-center logo-left medium-logo-center">
                <!-- Logo -->
                <div id="logo" class="col-3">
                    <a href="<?php echo Url::to(['site/homepage']); ?>" title="Trung Nguyên E-Coffee" rel="home">
                        <img width="200" height="100" alt="Trung Nguyên E-Coffee" src="https://trungnguyenecoffee.com/wp-content/uploads/2020/09/Logo-Màu-Trằng-E-Coffee.png" class="header_logo header-logo ls-is-cached lazyloaded" />
                    </a>
                </div>
                <!-- Search Bar -->
                <div id="search-bar" class="col-4">
                    <form role="search" method="get" class="search-form" action="https://trungnguyenecoffee.com/">
                        <div class="input-group">
                            <input type="search" id="woocommerce-product-search-field-0" class="form-control" placeholder="Tìm kiếm sản phẩm" value="" name="s" autocomplete="off" />
                            <div class="input-group-append">
                                <button type="submit" value="Tìm kiếm" class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="live-search-results text-left z-top">
                            <div class="autocomplete-suggestions" style="
                      position: absolute;
                      display: none;
                      max-height: 300px;
                      z-index: 9999;
                    "></div>
                        </div>
                    </form>
                </div>
                <!-- Signin/Logup -->
                <div id="account" class="col-5">
                    
                    <ul class="nav nav-right container-fluid d-flex align-items-center">
                        <?php if (Yii::$app->user->isGuest) { ?>
                            <li class='col-6'>
                            <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user white"></i> Đăng nhập </a>
                        <?php } else { ?>
                            <!--                                <i class="fa fa-user"></i> <span>--><?php //= Yii::$app->user->identity->username 
                                                                                                    ?><!--</span>-->
                            <span><?= Yii::$app->user->identity->username ?></span>
                            <ul class="sub-user">
                                <li>
                                    <?php
                                    ActiveForm::begin();
                                    echo Html::a(
                                        'Đăng xuất ',
                                        ['site/logout'],
                                        [
                                            'class' => 'dropdown-item',
                                            'data' => [
                                                'method' => 'post',
                                            ],
                                        ]
                                    );
                                    ActiveForm::end();
                                    ?>
                                </li>
                            </ul>
                        <?php } ?>
                        </a>
                            </li>
                            <li class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg>
                            <a href="http://" class="text-decoration-none text-dark">
                                <span>Giỏ hàng</span>
                            </a>
                        </li>
                    <!-- </ul> -->
                    </ul>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <!-- Danh mục sản phẩm (Dropdown menu) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                </svg>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- <a class="dropdown-item" href="#/Caphedonggoi">
                                    <img width="30" height="30" alt="cà phê đóng gói" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_Ca-phe-dong-goi.png" />
                                    <span>Cà phê đóng gói</span>
                                </a>
                                <a class="dropdown-item" href="#/Quatangcaocap">
                                    <img width="30" height="30" alt="quà tặng cao cấp" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/12/Icon-web-gift.png" />
                                    <span>Quà tặng cao cấp</span>
                                </a>
                                <a class="dropdown-item" href="#/Vatphambanle">
                                    <img width="30" height="30" alt="vật phẩm bán lẻ" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_Vat-pham-ca-phe.png" />
                                    <span>Vật phẩm bán lẻ</span>
                                </a>
                                <a class="dropdown-item" href="#/Vatphamsachquy">
                                    <img width="30" height="30" alt="vật phẩm sách quý" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_San-pham-sach-quy.png" />
                                    <span>Vật phẩm sách quý</span>
                                </a>
                                <a class="dropdown-item" href="#/Vatphamdoitac">
                                    <img width="30" height="30" alt="vật phẩm đối tác" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_San-pham-doi-tac.png" />
                                    <span>Vật phẩm đối tác</span>
                                </a>
                                <a class="dropdown-item" href="#/maymocthietbi">
                                    <img width="30" height="30" alt="máy móc thiết bị" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_May-moc-thiet-bi.png" />
                                    <span> Máy móc thiết bị</span>
                                </a>
                                <a class="dropdown-item" href="#/Congcudungcu">
                                    <img width="30" height="30" alt="cà phê đóng gói" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_Cong-cu-dung-cu.png" />
                                    <span>Công cụ dụng cụ</span>
                                </a>
                                <a class="dropdown-item" href="#/Baobithuonghieu">
                                    <img width="30" height="30" alt="cà phê đóng gói" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_Bao-bi-thuong-hieu.png" />
                                    <span>Bao bì thương hiệu</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img width="30" height="30" alt="cà phê đóng gói" decoding="async" loading="lazy" src="https://trungnguyenecoffee.com/wp-content/uploads/2021/08/Icon-web_Ca-phe-dong-goi.png" />
                                    Cà phê đóng gói
                                </a> -->
                                <?php foreach ($cates as $cate){ ?>
                                    <a class="dropdown-item" href="<?= Url::to(['site/category-details', 'id'=>$cate->id]) ?>" ><?= $cate->name ?></a>
                                    <?php }?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='<?php echo Url::to(['site/cauchuyenthuonghieu']); ?>'>
                                Câu chuyện thương hiệu
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Nhượng quyền</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::to(['site/products']) ?>">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Khuyến mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cửa hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tuyển dụng</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="div-padding"></div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>