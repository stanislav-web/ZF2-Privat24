<?php
namespace Privat24\Helper; // declare namespace for the current helper of "Privat24"

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Helper for the Privat24 form
 * @package Zend Framework 2
 * @subpackage Privat24
 * @since PHP >=5.4
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanilav WEB
 * @license Zend Framework GUI licene
 * @filesource /module/Privat24/src/Privat24/Helper/Privat24Helper.php
 */
class Privat24Helper extends AbstractHelper implements ServiceLocatorAwareInterface {

    /**
     * $_sm Service manager instance
     * @access protected
     * @var  
     */
    protected $_sm;
    
    /**
     * setServiceLocator(ServiceLocatorInterface $serviceLocator) set implemented ServiceLocator
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @access public
     * @return null
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->_sm = $serviceLocator;
    }    
    
    /**
     * getServiceLocator() get implemented ServiceLocator
     * @access public
     * @return object \Zend\ServiceManager\ServiceLocator
     */
    public function getServiceLocator()
    {
        return $this->_sm;
    }
    
    /**
     *  __invoke($form) get widget as function
     * @param object $form
     * @access public
     * @return mixed
     */
    public function __invoke($form)
    {
        return $this->getView()->partial('privat24/privat24/pay', ['form' => $form]);  // widget implement
    }
}