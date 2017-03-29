<?php

namespace Demo\AdminHelper\News\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminSectionEditHelper;

Loc::loadMessages(__FILE__);

class CategoriesEditHelper extends AdminSectionEditHelper
{
    protected static $model = '\Demo\AdminHelper\News\CategoriesTable';

    /**
     * @inheritdoc
     */
    public function setTitle($title)
    {
        if (!empty($this->data)) {
            $title = Loc::getMessage('DEMO_AH_NEWS_CATEGORY_EDIT_TITLE', array('#ID#' => $this->data[$this->pk()]));
        }
        else {
            $title = Loc::getMessage('DEMO_AH_NEWS_CATEGORY_NEW_TITLE');
        }

        parent::setTitle($title);
    }
}