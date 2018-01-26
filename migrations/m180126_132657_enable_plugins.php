<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;

/**
 * m180126_132657_enable_plugins migration.
 */
class m180126_132657_enable_plugins extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        Craft::$app->plugins->installPlugin('aws-s3');
        Craft::$app->plugins->installPlugin('craft3-mix');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        Craft::$app->plugins->uninstallPlugin('aws-s3');
        Craft::$app->plugins->uninstallPlugin('craft3-mix');
    }
}
