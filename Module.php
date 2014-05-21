<?php
namespace Privat24; // declare namespace for the current module "Privat24"

/**
 * Module for the Privat24 payments
 * @package Zend Framework 2
 * @subpackage Privat24
 * @since PHP >=5.4
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanilav WEB
 * @license Zend Framework GUI licene
 * @filesource /module/Privat24/Module.php
 */
class Module {
       
    /**
     * getConfig() configurator boot method for application
     * @access public
     * @return file
     */
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }
    
    /**
     * getViewHelperConfig() configurator boot method for helpers
     * @access public
     * @return file
     */    
    public function getViewHelperConfig()
    {
        return include __DIR__.'/config/helper.config.php';

    }    
    
    /**
     * getAutoloaderConfig() installation method autoloaders 
     * In my case, I connect the class map 
     * And set the namespace for the MVC application directory
     * @access public
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            // install namespace for MVC application directory
            'Zend\Loader\StandardAutoloader'    =>  array(
                'namespaces'    =>  array(
                    __NAMESPACE__   =>  __DIR__.'/src/'.__NAMESPACE__,
                ),
            ),
        );        
    } 
    
    /**
     * getServiceConfig() method of loading services
     * @access public
     * @return file
     */
    public function getServiceConfig()
    {
        return include __DIR__.'/config/service.config.php';
    }
}
