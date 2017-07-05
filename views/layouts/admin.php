<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
    
?>

    <?php $this->beginContent('@app/views/layouts/main.php'); ?>
        
        <div class="sidenav">
            <?php
                use kartik\sidenav\SideNav; //extension for sidenav
                
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'heading' => 'Administrator', //admin == superuser
                    'items' => [
                        ['label' => 'Taxpayer Profile', 'icon' => 'user', 'url' =>['taxpayer/index']],
                        ['label' => 'Manage Business', 'icon' => 'user', 'url' =>['business/index']],
                    ]
                ]);
            ?>
        </div>

        <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>

                <?= $content ?>
        </div>

    <?php $this->endContent();