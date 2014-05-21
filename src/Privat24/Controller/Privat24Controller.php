<?php
namespace Privat24\Controller; // Namespaces of current controller

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Privat24\Exception;
use Privat24\Form;

/**
 * Privat24 service payments controller
 * @package Zend Framework 2
 * @subpackage Privat24
 * @since PHP >=5.4
 * @version 1.0
 * @author Stanislav WEB | Lugansk <stanisov@gmail.com>
 * @copyright Stanilav WEB
 * @license Zend Framework GUI licene
 * @filesource /module/Privat24/src/Privat24/Controller/Privat24Controller.php
 */
class Privat24Controller extends AbstractActionController
{
    /**
     * $messages Messages container
     * @access public
     * @var array 
     */
    public $messages = [];
    /**
     * $__config Config container
     * @access private
     * @var array 
     */
    private $__config = [];
    /**
     * setEventManager(EventManagerInterface $events) Before actions
     * @param \Zend\EventManager\EventManagerInterface $events
     * @access public
     * @return null
     */
    public function setEventManager(EventManagerInterface $events) 
    {
        parent::setEventManager($events);
        // get configurations
        $this->__config     =   $this->getServiceLocator()->get('Privat24\Config');
    }
    

    /**
     * payAction() Pay form
     * @access public
     * @return object \Zend\View\ViewModel
     */    
    public function payAction()
    {           
        // for example, specify data received for payment of any goods or something else
        // Put here your realy POST or GET order params

        $params = [
            'amt'           =>  50,                                         // amount
            'order'         =>  rand(0000, 9999),                           // order ID in the store
            'details'       =>  'Payment for goods "Name"',                 // payment details
            'ext_details'   =>  'Goods description',                        // additional data (product code, etc.) / can be left blank
        ];
        
        $view = new ViewModel(
             [
                 'config'   =>  $this->__config,
                 'form'     =>  new Form\Privat24Form($this->__config, $params), // get Privat24 form
             ]
        );
        return $view;      
    }
    
    /**
     * resultAction() Pay handler
     * @access public
     * @return object \Zend\View\ViewModel
     */    
    public function resultAction()
    {
        $request    = $this->getRequest(); // get request from Merchant
        if($request->isPost()) // handling only POST receive data
        {
            $request    = $request->getPost(); // get request from Merchant
            
            if(!$request->payment)  $this->messages[]   =   'Payment not found!';
            else
            {
                // Handling payment query params
                $payment = explode('&', $request->payment);
                $params = ['signature' => $request->signature];

                foreach($payment as $var) 
                {
                    list($key, $value) = explode('=', $var, 2);
                    $params[$key] = $value;
                }
                
                // Create hash string to verify the payment
                $hash = sha1(md5($request->payment.$this->__config['merchant_password']));
                if($hash === $request->signature)
                {
                    // Payment Success!
                    // Put some action to setup success order
                    $this->messages[]   =   'Payment Success!';
                }
                else $this->messages[]   =   'Request from Privat24 merchant not valid!';

            }
        }
        else $this->messages[]   =   'Wrong request params!';
        
        $view = new ViewModel(
             [
                 'result'     => $this->messages, // set message for template
             ]
        );
        return $view;  
    }    
}
