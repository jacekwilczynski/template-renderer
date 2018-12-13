<?php

/**
 * Class TemplateRenderer
 */
class TemplateRenderer
{
    /**
     * @var string
     */
    private $template;

    /**
     * @param $fileName
     *
     * @return TemplateRenderer
     */
    public static function fromFile($fileName)
    {
        $data = file_get_contents($fileName);

        return self::fromString($data);
    }

    /**
     * @param $value
     *
     * @return TemplateRenderer
     */
    public static function fromString($value)
    {
        $instance           = new self();
        $instance->template = $value;

        return $instance;
    }

    /**
     * @param array $vars
     *
     * @return false|string
     */
    public function render(array $vars = array())
    {
        extract($vars);
        ob_start();
        eval(' ?>' . $this->template . '<?php ');

        return ob_get_clean();
    }
}

