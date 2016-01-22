<?php

use Bitrix\Main\Application;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;
use Demo\AdminHelper\News\NewsTable;

IncludeModuleLangFile(__FILE__);

class demo_adminhelper extends CModule
{
    var $MODULE_ID = 'demo.adminhelper';

    function __construct()
    {
        $arModuleVersion = array();

        include(__DIR__ . '/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = Loc::getMessage('DEMO_AH_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('DEMO_AH_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('DEMO_AH_PARTNER_NAME');
        $this->PARTNER_URI = 'http://samokhvalov.info';
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        Loader::includeModule($this->MODULE_ID);

        $this->GetConnection()->query("CREATE TABLE " . NewsTable::getTableName() . " (
            ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            DATE_CREATE DATETIME,
            CREATED_BY INT,
            MODIFIED_BY INT,
            TITLE VARCHAR(255),
            TEXT LONGTEXT,
            TEXT_TEXT_TYPE VARCHAR(255),
            SOURCE VARCHAR(255),
            IMAGE INT
        );");
    }

    public function DoUninstall()
    {
        Loader::includeModule($this->MODULE_ID);

        $this->GetConnection()->dropTable(NewsTable::getTableName());

        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    protected function GetConnection()
    {
        return Application::getInstance()->getConnection(NewsTable::getConnectionName());
    }
}