<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\base\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- <div class="logo"></div> -->
    <div class="login-block">
        <h1>Tạo mới sản phẩm</h1>
        <label class="control-label2" for="userform-username2">Tên sản phẩm</label>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <label class="control-label2" for="userform-username2">Danh mục</label>

    <?= $form->field($model, 'category_id')->dropDownList(
        \app\models\Products::getCate(), ['prompt' => 'Chọn danh mục']
    ) ?>
        <label class="control-label2" for="userform-username2">Mô tả sản phẩm</label>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <label class="control-label2" for="userform-username2">Trạng thái</label>

    <?= $form->field($model, 'status')->dropDownList(
        \app\models\Products::getStatus(), ['prompt' => 'Chọn trạng thái']
    ) ?>
        <label class="control-label2" for="userform-username2">Hình Ảnh</label>

    <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*',
        'onchange' => 'previewImage(event)']) ?>
    <div id="image-preview"></div>
    <label class="control-label2" for="userform-username2">Giá gốc</label>

    <?= $form->field($model, 'original_price')->textInput() ?>
    <label class="control-label2" for="userform-username2">Giảm giá (%)</label>

    <?= $form->field($model, 'discount')->textInput() ?>
        <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>


    <style>
        .control-label{
        display: none;
    }
        body {
            background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center;
            background-size: cover;
            font-family: Montserrat;
        }

        .logo {
            width: 213px;
            height: 36px;
            background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
            margin: 30px auto;
        }

        .login-block {
    width: 589px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;
}

        .login-block h1 {
            text-align: center;
            color: #000;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .login-block input {
            width: 100%;
            height: 42px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 14px;
            font-family: Montserrat;
            padding: 0 20px 0 50px;
            outline: none;
        }

        .login-block input#username {
            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#username:focus {
            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password {
            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password:focus {
            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input:active,
        .login-block input:focus {
            border: 1px solid #ff656c;
        }

        .login-block button {
            width: 100%;
            height: 40px;
            background: #ff656c;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #e15960;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            font-family: Montserrat;
            outline: none;
            cursor: pointer;
        }

        .login-block button:hover {
            background: #ff7b81;
        }
    </style>





    


    


    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function () {
                var imgElement = document.createElement("img");
                imgElement.src = reader.result;
                imgElement.style.width = "100px";
                imgElement.style.height = "80px";
                document.getElementById("image-preview").innerHTML = "";
                document.getElementById("image-preview").appendChild(imgElement);
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

</div>