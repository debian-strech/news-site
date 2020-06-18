<?php

use yii\db\Migration;

/**
 * Class m181227_225701_add_asAdmin_to_user
 */
class m181227_225701_add_asAdmin_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
   $this->addColumn('user', 'isAdmin', integer()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {

       $this->dropColumn('user', 'isAdmin');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181227_225701_add_asAdmin_to_user cannot be reverted.\n";

        return false;
    }
    */
}
