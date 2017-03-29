<?php

namespace Demo\AdminHelper\News;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Type\DateTime;

Loc::loadMessages(__FILE__);

/**
 * Модель категорий новостей.
 */
class CategoriesTable extends DataManager
{
    /**
     * @inheritdoc
     */
    public static function getTableName()
    {
        return 'd_ah_news_categories';
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
                'autocomplete' => true,
            ),
            'PARENT_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_PARENT_ID')
            ),
            'DATE_CREATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_DATE_CREATE'),
                'default_value' => new DateTime()
            ),
            'CREATED_BY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_CREATED_BY'),
                'default_value' => static::getUserId()
            ),
            'MODIFIED_BY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_MODIFIED_BY'),
                'default_value' => static::getUserId()
            ),
            'TITLE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_TITLE')
            ),
            'PARENT_CATEGORY' => array(
                'data_type' => '\Demo\AdminHelper\News\CategoriesTable',
                'reference' => array('=this.PARENT_ID' => 'ref.ID'),
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
     * Gets current user ID.
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
