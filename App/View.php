<?php

namespace App;


class View
{
    use Magic;

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($template)
    {
        ob_start();

        include $template;
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

}