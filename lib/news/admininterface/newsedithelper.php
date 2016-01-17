<?php

namespace Demo\AdminGenerator\News\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminEditHelper;

/**
 * Хелпер описывает интерфейс, выводящий форму редактирования новости.
 *
 * {@inheritdoc}
 */
class NewsEditHelper extends AdminEditHelper
{
    protected static $model = '\Demo\AdminGenerator\News\NewsTable';
}