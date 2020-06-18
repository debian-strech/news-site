<?php
use yii\db\Migration;

class m160923_115323_init extends Migration
{
public function up()
{
$this->createTable('message', [
'id' => $this->primaryKey(),
'from' => $this->integer()->notNull(),
'to' => $this->integer()->notNull(),
'text' => $this->text()->notNull()
]);
}

public function down()
{
$this->dropTable('message');
}
}