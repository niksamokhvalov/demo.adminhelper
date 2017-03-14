<?php

namespace Demo\AdminHelper\News\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\DateTimeWidget;
use DigitalWand\AdminHelper\Widget\FileWidget;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\OrmElementWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;
use DigitalWand\AdminHelper\Widget\UrlWidget;
use DigitalWand\AdminHelper\Widget\UserWidget;
use DigitalWand\AdminHelper\Widget\VisualEditorWidget;

Loc::loadMessages(__FILE__);

/**
 * Описание интерфейса (табок и полей) админки новостей.
 *
 * {@inheritdoc}
 */
class NewsAdminInterface extends AdminInterface
{
    public function dependencies()
    {
        return array('\Demo\AdminHelper\News\AdminInterface\CategoriesAdminInterface');
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return array(
            'MAIN' => array(
                'NAME' => Loc::getMessage('DEMO_AH_NEWS_TAB_TITLE'),
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
                        'REQUIRED' => true
                    ),
                    'TEXT' => array(
                        'WIDGET' => new VisualEditorWidget(),
                        'HEADER' => false
                    ),
                    'CATEGORY_ID' => array(
                        'WIDGET' => new OrmElementWidget(),
                        'FILTER' => true,
                        'HEADER' => false,
                        'TEMPLATE' => 'select',
                        'HELPER' => '\Demo\AdminHelper\News\AdminInterface\CategoriesListHelper',
                        'REQUIRED' => true,
                    ),
                    'SOURCE' => array(
                        'WIDGET' => new UrlWidget(),
                        'HEADER' => false
                    ),
                    'IMAGE' => array(
                        'WIDGET' => new FileWidget(),
                        'IMAGE' => true,
                        'HEADER' => false
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
                    ),
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
            '\Demo\AdminHelper\News\AdminInterface\NewsListHelper',
            '\Demo\AdminHelper\News\AdminInterface\NewsEditHelper'
        );
    }
}