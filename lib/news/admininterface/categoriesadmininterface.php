<?php

namespace Demo\AdminHelper\News\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\DateTimeWidget;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;
use DigitalWand\AdminHelper\Widget\UserWidget;

Loc::loadMessages(__FILE__);

class CategoriesAdminInterface extends AdminInterface
{
    /**
     * @inheritdoc
     */
    /*public function dependencies()
    {
        return array('\Demo\AdminHelper\News\AdminInterface\NewsAdminInterface');
    }*/

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return array(
            'MAIN' => array(
                'NAME' => Loc::getMessage('DEMO_AH_NEWS'),
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
     * {@inheritdoc}
     */
    public function helpers()
    {
        return array(
            '\Demo\AdminHelper\News\AdminInterface\CategoriesEditHelper' => array(
                'BUTTONS' => array(
                    'RETURN_TO_LIST' => array(
                        'TEXT' => Loc::getMessage('MOS_CONTENT_PROGRAMS_SECTION_RETURN_TO_LIST'),
                    ),
                    'ADD_ELEMENT' => array(
                        'TEXT' => Loc::getMessage('MOS_CONTENT_PROGRAMS_SECTION_CREATE_NEW'),
                    ),
                    'DELETE_ELEMENT' => array(
                        'TEXT' => Loc::getMessage('MOS_CONTENT_PROGRAMS_SECTION_DELETE_ELEMENT'),
                    ),
                    'ACTIONS' => array(
                        'TEXT' => Loc::getMessage('MOS_CONTENT_PROGRAMS_SECTION_ACTIONS'),
                    )
                )
            ),
            '\Demo\AdminHelper\News\AdminInterface\CategoriesListHelper'
        );
    }
}