<?php

namespace Demo\AdminHelper\News;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Type\DateTime;

Loc::loadMessages(__FILE__);

/**
 * Модель новостей.
 */
class NewsTable extends DataManager
{
    /**
     * @inheritdoc
     */
    public static function getTableName()
    {
        return 'd_ah_news';
    }

    /**
     * @inheritdoc
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true
            ),
            'CATEGORY_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CATEGORY'),
                'required' => true,
            ),
            'DATE_CREATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DEMO_AH_NEWS_DATE_CREATE'),
                'default_value' => new DateTime()
            ),
            'CREATED_BY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CREATED_BY'),
                'default_value' => static::getUserId()
            ),
            'MODIFIED_BY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_MODIFIED_BY'),
                'default_value' => static::getUserId()
            ),
            'TITLE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DEMO_AH_NEWS_TITLE')
            ),
            'TEXT' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DEMO_AH_NEWS_TEXT')
            ),
            // Для всех полей, используемых визивигом, нужно создавать в таблице атрибут с суффиксом _TEXT_TYPE.
            // В нём будет храниться информация о типе сохранённого контента (ХТМЛ или обычный текст).
            'TEXT_TEXT_TYPE' => array(
                'data_type' => 'string'
            ),
            'SOURCE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DEMO_AH_NEWS_SOURCE')
            ),
            // Хранением файлов занимается Битрикс (хотя это вовсе необязательно, вы можете описать свою логику).
            // В атрибуте таблицы будет хранится идентификатор файла.
            'IMAGE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_IMAGE')
            ),
            'CATEGORY' => array(
                'data_type' => '\Demo\AdminHelper\News\CategoriesTable',
                'reference' => array('=this.CATEGORY_ID' => 'ref.ID'),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public static function update($primary, array $data)
    {
        $data['MODIFIED_BY'] = static::getUserId();

        return parent::update($primary, $data);
    }

    /**
     * Возвращает идентификатор пользователя.
     *
     * @return int|null
     */
    public static function getUserId()
    {
        global $USER;

        return $USER->GetID();
    }

    public static function getFilePath()
    {
        return __FILE__;
    }
}
