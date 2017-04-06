<?php

namespace Demo\AdminHelper\News\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminSectionListHelper;

class CategoriesListHelper extends AdminSectionListHelper
{
	protected static $model = '\Demo\AdminHelper\News\CategoriesTable';
}