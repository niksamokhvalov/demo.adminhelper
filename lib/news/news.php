<?php

namespace Demo\AdminGenerator\News;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class NewsTable extends DataManager
{
    public static function getTableName()
    {
        return 'd_admingen_news';
    }

    public static function getMap()
    {
        return [
            'ID' => [
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
            ],
            'DATE_CREATE' => [
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DEMO_ADMINGEN_NEWS_DATE_CREATE')
            ],
            'CREATED_BY' => [
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_ADMINGEN_NEWS_CREATED_BY'),
                'default_value' => function () {
                    global $USER;
                    return $USER->GetID();
                }
            ],
            'TITLE' => [
                'data_type' => 'string',
                'title' => Loc::getMessage('DEMO_ADMINGEN_NEWS_TITLE')
            ],
            'TEXT' => [
                'data_type' => 'text',
                'title' => Loc::getMessage('DEMO_ADMINGEN_NEWS_TEXT')
            ],
            // Для всех полей, используемых визивигом, нужно создавать в таблице атрибут с суффиксом _TEXT_TYPE.
            // В нём будет храниться информация о типе сохранённого контента (ХТМЛ или обычный текст).
            'TEXT_TEXT_TYPE' => [
                'data_type' => 'string'
            ],
            'SOURCE' => [
                'data_type' => 'string',
                'title' => Loc::getMessage('DEMO_ADMINGEN_NEWS_SOURCE')
            ],
            // Хранением файлов занимается Битрикс (хотя это вовсе необязательно, вы можете описать свою логику).
            // В атрибуте таблицы будет хранится идентификатор файла.
            'IMAGE' => [
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_ADMINGEN_NEWS_IMAGE')
            ],
        ];
    }
}