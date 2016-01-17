<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Demo\AdminGenerator\News\AdminInterface\NewsEditHelper;
use Demo\AdminGenerator\News\AdminInterface\NewsListHelper;

if (!Loader::includeModule('digitalwand.admin_helper') || !Loader::includeModule('demo.admingenerator')) return;

Loc::loadMessages(__FILE__);

return [
    [
        'parent_menu' => 'global_menu_content',
        'sort' => 300,
        'icon' => 'fileman_sticker_icon',
        'page_icon' => 'fileman_sticker_icon',
        'text' => Loc::getMessage('DEMO_ADMINGEN_NEWS'),
        'url' => NewsListHelper::getUrl(),
        'more_url' => [
            NewsEditHelper::getUrl(),
        ],
    ]
];