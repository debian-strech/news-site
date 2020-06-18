<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 */

$this->title = Yii::t('user', 'Networks');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html,
        body {
            height: 0%;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            height: 50%;
        }
        .content {
            flex: 1 0 auto;
        }
        .footer {
            flex: 0 0 auto;
        }

    </style>

</head>
<body>

<div class="wrapper">

    <div class="content"></div>

    <div class="footer"></div>

</div>
<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <p><?= Yii::t('user', 'You can connect multiple accounts to be able to log in using them') ?>.</p>
                </div>
                <?php $auth = Connect::begin([
                    'baseAuthUrl' => ['/user/security/auth'],
                    'accounts' => $user->accounts,
                    'autoRender' => false,
                    'popupMode' => false,
                ]) ?>
                <table class="table">
                    <?php foreach ($auth->getClients() as $client): ?>
                        <tr>
                            <td style="width: 32px; vertical-align: middle">
                                <?= Html::tag('span', '', ['class' => 'auth-icon ' . $client->getName()]) ?>
                            </td>
                            <td style="vertical-align: middle">
                                <strong><?= $client->getTitle() ?></strong>
                            </td>
                            <td style="width: 120px">
                                <?= $auth->isConnected($client) ?
                                    Html::a(Yii::t('user', 'Disconnect'), $auth->createClientUrl($client), [
                                        'class' => 'btn btn-danger btn-block',
                                        'data-method' => 'post',
                                    ]) :
                                    Html::a(Yii::t('user', 'Connect'), $auth->createClientUrl($client), [
                                        'class' => 'btn btn-success btn-block',
                                    ])
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php Connect::end() ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>