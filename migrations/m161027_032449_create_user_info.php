<?php

use yii\db\Schema;
use markavespiritu\user\migrations\Migration;

class m161027_032449_create_user_info extends Migration
{
    public function up()
    {
       $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('user_info', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%user_info}}', [
                'user_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`user_id`)',
                'emp_no' => 'VARCHAR(30) NOT NULL',
                'lastname' => 'VARCHAR(255) NOT NULL',
                'firstname' => 'VARCHAR(255) NOT NULL',
                'middlename' => 'VARCHAR(255) NOT NULL',
                'extname' => 'VARCHAR(255) NOT NULL',
                'position' => 'VARCHAR(255) NOT NULL',
            ], $tableOptions_mysql);
        }
        }

         
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_user_2104_03','{{%user_info}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user_info`');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
