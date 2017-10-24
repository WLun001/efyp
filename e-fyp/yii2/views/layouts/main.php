<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\students\models\Staff;
use app\models\LoginForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php $session = Yii::$app->session;
    if(Yii::$app->user->can('admin') && $session["role"]=="admin"){
        NavBar::begin([
        'brandLabel' => 'e-FYP Portal Management System',
        'brandUrl' => 'index.php?r=students/adminhome/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/students/adminhome/index']],
            ['label' => 'Menu',
                'items' => [
                    ['label' => 'Manage Staff','url' => ['/students/staff']],
                    ['label' => 'Manage Students','url' => ['/students/students']],
                    ['label' => 'Manage Departments','url' => ['/students/departments']],
                    ['label' => 'Manage Faculty','url' => ['/students/faculty']],
                    ['label' => 'Manage FypType','url' => ['/students/fyptype']],
                    ['label' => 'Manage Roles','url' => ['/students/roles']],
                    ['label' => 'Manage Title','url' => ['/students/title']],
                    ['label' => 'Manage Calendar','url' => ['/students/calendar']],
                    ['label' => 'Manage Announcements','url' => ['/students/announcement']],
                    ['label' => 'Manage Downloads','url' => ['/students/downloads']],

                ],
            ],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    }else if(Yii::$app->user->can('fypCoordinator') && $session["role"]=="fypCoordinator"){
        NavBar::begin([
        'brandLabel' => 'e-FYP Portal Management System',
        'brandUrl' => 'index.php?r=students/coordinatorhome/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/students/coordinatorhome/index']],
            ['label' => 'Menu',
                'items' => [
                    ['label' => 'Search','url' => ['/coordinatorhome/search']],
                    ['label' => 'Upload Documents','url' => ['/students/downloads']],
                    ['label' => 'Set Report Deadlines','url' => ['/students/report']],
                    ['label' => 'Post Announcements','url' => ['/students/announcement']],
                    ['label' => 'Set Calendar','url' => ['/students/calendar']],

                ],
            ],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    }else if(Yii::$app->user->can('supervisor') && $session["role"]=="lecturer"){
        $user = Yii::$app->user->identity->attributes;
        //var_dump($user['username']);exit();
        $staff = Staff::find()->where(['userID'=>$user['username']])->one();

        //var_dump($staff);exit();
        NavBar::begin([
        'brandLabel' => 'e-FYP Portal Management System',
        'brandUrl' => 'index.php?r=students/lecturerhome/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/students/lecturerhome/index']],
            ['label' => 'Menu',
                'items' => [
                    ['label' => 'Allocate Students','url' => ['/students/title/allocate-students','user'=>$staff["id"]]],
                    ['label' => 'FYP Calendar','url' => ['/students/calendar/view-calendar']],
                    ['label' => 'Announcements','url' => ['/students/announcement/view-announcement']],
                    ['label' => 'View Students','url' =>['/students/students/view-own-students']],

                ],
            ],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    
    }elseif(Yii::$app->user->can('students') && $session["role"]=="student"){
        $user = Yii::$app->user->identity->attributes;
        //var_dump($user['username']);exit();
        NavBar::begin([
        'brandLabel' => 'e-FYP Portal Management System',
        'brandUrl' => 'index.php?r=students/home/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/students/home/index']],
            ['label' => 'Menu',
                'items' => [
                    ['label' => 'FYP Title','url' => ['students/title/view-title']],
                    ['label' => 'FYP Calendar','url' => ['/students/calendar/view-calendar']],
                    ['label' => 'Announcements','url' => ['/students/announcement/view-announcement']],
                    ['label' => 'Profile','url' => ['/students/students/view-students-profile','id'=>$user['username']]],
                    ['label' => 'Log Book','url' => ['/students/ganttchart/logbook']],
                    ['label' => 'Downloads','url' => ['/students/downloads/view-download']],
                    ['label' => 'Report Submission','url' => ['/students/report/submit']],

                ],
            ],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);

    }else if(Yii::$app->user->isGuest){
        NavBar::begin([
            'brandLabel' => 'e-FYP Portal Management System',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);

        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/login']],
 
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
        
    }
    
    NavBar::end();
    
    ?>
    <?php 

        $homeUrlByRole = '';
        if(Yii::$app->user->can('admin') && $session["role"]=="admin"){
            // $login = LoginForm::find()->all();
            // var_dump($login);

            $homeUrlByRole = '?r=students/adminhome/index';
        }else if (Yii::$app->user->can('fypCoordinator') && $session["role"]=="fypCoordinator"){
            $homeUrlByRole = '?r=students/coordinatorhome/index';
        }else if (Yii::$app->user->can('supervisor') && $session["role"]=="lecturer"){
            $homeUrlByRole = '?r=students/lecturerhome/index';
        }elseif (Yii::$app->user->can('students') && $session["role"]=="student") {
            $homeUrlByRole = '?r=students/home/index';
        }
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
          'homeLink' => [
            'label' => 'Home',
            'url' => Yii::$app->getHomeUrl() . $homeUrlByRole
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><img style="display:inline-block;width:68px;height:30px" src="image/Universiti_Tunku_Abdul_Rahman_Logo.jpg"> </p>

       <!--  <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
