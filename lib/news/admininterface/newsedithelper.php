<?php

namespace Demo\AdminHelper\News\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminEditHelper;

/**
 * Хелпер описывает интерфейс, выводящий форму редактирования новости.
 *
 * {@inheritdoc}
 */
class NewsEditHelper extends AdminEditHelper
{
    protected static $model = '\Demo\AdminHelper\News\NewsTable';
}