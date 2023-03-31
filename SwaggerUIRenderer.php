<?php

namespace globalart\swagger;

use yii\base\Action;

/**
 * Class SwaggerUIRenderer renders the UI (HTML/JS/CSS).
 *
 * @package globalart\swagger
 */
class SwaggerUIRenderer extends Action
{
    /**
     * @var string the rest urls configuration
     */
    public $urls;

    /**
     * @var boolean is filter show
     */
    public $filter = false;

    /**
     * @var string base swagger template
     */
    public $view = '@vendor/globalart/yii2-swagger/views/index';

    /**
     * @var null|string|false the name of the layout to be applied to this controller's views.
     * This property mainly affects the behavior of [[render()]].
     * Defaults to null, meaning the actual layout value should inherit that from [[module]]'s layout value.
     * If false, no layout will be applied.
     */
    public $layout = false;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->controller->layout = $this->layout;

        $urls = [];
        foreach($this->urls as $name => $url) {
            $urls[] = [
                'name' => $name,
                'url' => $url,
            ];
        }

        return $this->controller->render($this->view, [
            'urls' => $urls,
            'filter' => $this->filter,
        ]);
    }
}
