<?php
class Template
{
    protected $variables = array();
    protected $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function render()
    {
        extract($this->variables);
        ob_start();
        include $this->template;
        return ob_get_clean();
    }
}
