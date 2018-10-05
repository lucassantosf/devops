<?php

namespace Slim;

/**
 * View
 *
 * The view is responsible for rendering a template. The view
 * should subclass \Slim\View and implement this interface:
 *
 * public render(string $template);
 *
 * This method should render the specified template and return
 * the resultant string.
 *
 * @package Slim
 * @author  Josh Lockhart
 * @since   1.0.0
 */
class View
{
    /**
     * @var string Absolute or relative filesystem path to a specific template
     *
     * DEPRECATION WARNING!
     * This variable will be removed in the near future
     */
    protected $templatePath = '';

    /**
     * @var array Associative array of template variables
     */
    protected $data = array();

    /**
     * @var string Absolute or relative path to the application's templates directory
     */
    protected $templatesDirectory;

    /**
     * Constructor
     *
     * This is empty but may be implemented in a subclass
     */
    public function __construct()
    {

    }

    /**
     * Get data
     * @param  string|null      $key
     * @return mixed            If key is null, array of template data;
     *                          If key exists, value of datum with key;
     *                          If key does not exist, null;
     */
    public function getData($key = null)
    {
        if (!is_null($key)) {
            return isset($this->data[$key]) ? $this->data[$key] : null;
        } else {
            return $this->data;
        }
    }

    /**
     * Set data
     *
     * If two arguments:
     * A single datum with key is assigned value;
     *
     *     $view->setData('color', 'red');
     *
     * If one argument:
     * Replace all data with provided array keys and values;
     *
     *     $view->setData(array('color' => 'red', 'number' => 1));
     *
     * @param   mixed
     * @param   mixed
     * @throws  InvalidArgumentException If incorrect method signature
     */
    public function setData()
    {
        $args = func_get_args();
        if (count($args) === 1 && is_array($args[0])) {
            $this->data = $args[0];
        } elseif (count($args) === 2) {
            $this->data[(string) $args[0]] = $args[1];
        } else {
            throw new \InvalidArgumentException('Cannot set View data with provided arguments. Usage: `View::setData( $key, $value );` or `View::setData([ key => value, ... ]);`');
        }
    }

    /**
     * Append new data to existing template data
     * @param  array
     * @throws InvalidArgumentException If not given an array argument
     */
    public function appendData($data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Cannot append view data. Expected array argument.');
        }
        $this->data = array_merge($this->data, $data);
    }

    /**
     * Get templates directory
     * @return string|null     Path to templates directory without trailing slash;
     *                         Returns null if templates directory not set;
     */
    public function getTemplatesDirectory()
    {
        return $this->templatesDirectory;
    }

    /**
     * Set templates directory
     * @param  string   $dir
     */
    public function setTemplatesDirectory($dir)
    {
        $this->templatesDirectory = rtrim($dir, '/');
    }

    /**
     * Set template
     * @param  string           $template
     * @throws RuntimeException If template file does not exist
     *
     * DEPRECATION WARNING!
     * This method will be removed in the near future.
     */
    public function setTemplate($template)
    {
        $this->templatePath = $this->getTemplatesDirectory() . '/' . ltrim($template, '/');
        if (!file_exists($this->templatePath)) {
            throw new \RuntimeException('View cannot render template `' . $this->templatePath . '`. Template does not exist.');
        }
    }

    /**
     * Display template
     *
     * This method echoes the rendered template to the current output buffer
     *
     * @param  string   $template   Pathname of template file relative to templates directoy
     */
    public function display($template)
    {
        echo $this->fetch($template);
    }

    /**
     * Fetch rendered template
     *
     * This method returns the rendered template
     *
     * @param  string $template Pathname of template file relative to templates directory
     * @return string
     */
    public function fetch($template)
    {
        return $this->render($template);
    }

    /**
     * Render template
     *
     * @param  string   $template   Pathname of template file relative to templates directory
     * @return string
     *
     * DEPRECATION WARNING!
     * Use `\Slim\View::fetch` to return a rendered template instead of `\Slim\View::render`.
     */
    public function render($template)
    {
        $this->setTemplate($template);
        extract($this->data);
        ob_start();
        require $this->templatePath;

        return ob_get_clean();
    }
}
