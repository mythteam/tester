<?php
use yii\base\Event;
use yii\db\Connection;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

/** @var \yii\db\Connection $db */
$db = Yii::createObject([
    'class' => yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;port=3306;dbname=iyuban',
    'username' => 'root',
    'password' => '',
]);

class User extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user}}';
    }

    public static function getDb()
    {
        /** @var \yii\db\Connection $db */
        $db =  Yii::createObject([
            'class' => yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;port=3306;dbname=iyuban',
            'username' => 'root',
            'password' => '',
        ]);

        $db->on(Connection::EVENT_AFTER_OPEN, function(Event $event) {
            var_dump($event);
        });

        return $db;
    }
}

var_dump(User::findOne(10000));
