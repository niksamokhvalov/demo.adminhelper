<?php

namespace Demo\AdminHelper\News\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminListHelper;

/**
 * Хелпер описывает интерфейс, выводящий список новостей.
 *
 * {@inheritdoc}
 */
class NewsListHelper extends AdminListHelper
{
	protected static $model = '\Demo\AdminHelper\News\NewsTable';
}