<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Alert;

/**
 * @var dektrium\user\Module $module
 */
?>

<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html,
        body {
            height: 90%;
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

<?php if ($module->enableFlashMessages): ?>
    <div class="row">
        <div class="col-xs-12">
            <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
                <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                    <?= Alert::widget([
                        'options' => ['class' => 'alert-dismissible alert-' . $type],
                        'body' => $message
                    ]) ?>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>


<body>

<div class="wrapper">

    <div class="content"></div>

    <div class="footer"></div>

</div>

</body>
</html>