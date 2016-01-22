<?php

namespace Demo\AdminHelper\News\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\DateTimeWidget;
use DigitalWand\AdminHelper\Widget\FileWidget;
use DigitalWand\AdminHelper\Widget\NumberWidget;
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
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        return [
            'MAIN' => [
                'NAME' => Loc::getMessage('DEMO_AH_NEWS'),
                'FIELDS' => [
                    'ID' => [
                        'WIDGET' => new NumberWidget(),
                        'READONLY' => true,
                        'FILTER' => true,
                        'HIDE_WHEN_CREATE' => true
                    ],
                    'TITLE' => [
                        'WIDGET' => new StringWidget(),
                        'SIZE' => '80',
                        'FILTER' => '%',
                        'REQUIRED' => true
                    ],
                    'TEXT' => [
                        'WIDGET' => new VisualEditorWidget(),
                        'HEADER' => false
                    ],
                    'SOURCE' => [
                        'WIDGET' => new UrlWidget(),
                        'HEADER' => false
                    ],
                    'IMAGE' => [
                        'WIDGET' => new FileWidget(),
                        'IMAGE' => true,
                        'HEADER' => false
                    ],
                    'DATE_CREATE' => [
                        'WIDGET' => new DateTimeWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ],
                    'CREATED_BY' => [
                        'WIDGET' => new UserWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ],
                    'MODIFIED_BY' => [
                        'WIDGET' => new UserWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ],
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function helpers()
    {
        return [
            '\Demo\AdminHelper\News\AdminInterface\NewsListHelper',
            '\Demo\AdminHelper\News\AdminInterface\NewsEditHelper'
        ];
    }
}