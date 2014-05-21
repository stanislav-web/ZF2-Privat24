<?php
namespace Privat24\Form; // declare namespace for the current form of "Privat24"

use Zend\Form\Form;
use Zend\Config;
use Privat24\Exception; // add an exception class

/**
 * Form for the Privat24 payments
 * @package Zend Framework 2
 * @subpackage Privat24
 * @since PHP >=5.4
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanilav WEB
 * @license Zend Framework GUI licene
 * @filesource /module/Privat24/src/Privat24/Form/Privat24Form.php
 */
class Privat24Form extends Form
{
    /**
     * $_config Service configuration
     * @access protected
     * @var  array
     */
    private $_config    =   null;

    /**
     * Initialize form
     * @param array $config (from module.config.php)
     * @param array $params additional values returned from controller
     * @throws Exception\ExceptionStrategy
     * @access public
     * @return object Form
     */
    public function __construct(array $config, $params = array())
    {
        if(empty($config)) throw new Exception\ExceptionStrategy('Required config are incorrupted!');
        $this->_config    =   $config;
        
        parent::__construct($this->_config['fields']['pay_way']); // form name

        $this->setAttributes(['method'  =>  'post']);
        
        // Add form fields from config
        
        foreach($this->_config['form'] as $key => $value) 
        {
            // parsing default value from config
            $value['attributes']['value'] = (isset($params[$key]) && !empty($params[$key])) ? $params[$key]  : $this->_config['fields'][$key];

            $this->add($value);            
        }
    }
}