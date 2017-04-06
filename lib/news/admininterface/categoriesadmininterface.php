<?php

namespace Demo\AdminHelper\News\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\DateTimeWidget;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\OrmElementWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;
use DigitalWand\AdminHelper\Widget\UserWidget;

Loc::loadMessages(__FILE__);

/**
 * Описание интерфейса (табок и полей) админки категорий новостей.
 *
 * {@inheritdoc}
 */
class CategoriesAdminInterface extends AdminInterface
{
    /**
     * @inheritdoc
     */
    public function dependencies()
    {
        return array('\Demo\AdminHelper\News\AdminInterface\NewsAdminInterface');
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return array(
            'MAIN' => array(
                'NAME' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_TAB_TITLE'),
                'FIELDS' => array(
                    'ID' => array(
                        'WIDGET' => new NumberWidget(),
                        'READONLY' => true,
                        'FILTER' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),
                    'TITLE' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => '80',
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'SECTION_LINK' => true
                    ),
                    'PARENT_ID' => array(
                        'WIDGET' => new OrmElementWidget(),
                        'HELPER' => '\Demo\AdminHelper\News\AdminInterface\CategoriesListHelper',
                        'LIST' => false
                    ),
                    'DATE_CREATE' => array(
                        'WIDGET' => new DateTimeWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),
                    'CREATED_BY' => array(
                        'WIDGET' => new UserWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),
                    'MODIFIED_BY' => array(
                        'WIDGET' => new UserWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    )
                )
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function helpers()
    {
        return array(
            '\Demo\AdminHelper\News\AdminInterface\CategoriesEditHelper' => array(
                'BUTTONS' => array(
                    'RETURN_TO_LIST' => array(
                        'TEXT' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_RETURN_TO_LIST')
                    ),
                    'ADD_ELEMENT' => array(
                        'TEXT' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_CREATE_NEW')
                    ),
                    'DELETE_ELEMENT' => array(
                        'TEXT' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_DELETE_ELEMENT')
                    ),
                    'ACTIONS' => array(
                        'TEXT' => Loc::getMessage('DEMO_AH_NEWS_CATEGORIES_ACTIONS')
                    )
                )
            ),
            '\Demo\AdminHelper\News\AdminInterface\CategoriesListHelper'
        );
    }
}