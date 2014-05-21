<?php
/** 
  * Configurator router current module (Privat24) 
  * Here are set settings aliases and URL template processing 
  * Recorded all controllers in the process of creating an application 
  * Set the path to the application by default 
  */
return array(
    
    // The parameters of the compound (Privat24)
    
    'privat24'    => array(
        'merchant_password' =>  '6PcmncrrIyhdF901kpWg9GjPDVkaZIt7',             // password verify from response (get it from account Privat24 > Merchant)
        'fields'    =>  [
            'handler'           =>  'https://api.privatbank.ua/p24api/ishop',   // request handler
            'amt'               =>  null,                                       // amount
            'ccy'               =>  'UAH',                                      // currency (UAH, USD, EUR)
            'merchant'          =>  101091,                                     // online store ID (you must to register your store in Privat24 system)
            'order'             =>  null,                                       // order ID in the store
            'details'           =>  null,                                       // payment details
            'ext_details'       =>  null,                                       // additional data (product code, etc.) / can be left blank
            'pay_way'           =>  'privat24',                                 // transaction type
            'return_url'        =>  'http://zf.local/privat24/result',          // page hosting customer after payment
            'server_url'        =>  'http://zf.local/privat24/result',          // page hosting API response to a result of payment
            'submit'            =>  'Pay'                                       // submit button name
        ],
        
        // Form building parameters
        
        'form'     =>  [
            
            'amt'           =>   [
                'type'      =>  'Zend\Form\Element\Text',
                'name'      =>  'amt',
                'attributes' => [
                    'required'  =>  'true',
                    'pattern'   =>  '[0-9]+([\.|,][0-9]+)?',
                    'step'      =>  '0.01',
                    'title'     =>  'This should be a number with up to 2 decimal places.',
                ],
                'options'   => [
                   'label' =>  _(''),
                ]
            ],

            'ccy'           =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'ccy',
                'attributes' => [
                    'pattern'   =>  '(UAH|USD|EUR)',
                ],
            ],
            
            'merchant'           =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'merchant',
                'attributes' => [
                    'pattern'   =>  '(\d+)',

                ],
            ],
            
            'order'           =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'order',
            ],
            
            'details'           =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'details',
            ],            
            
            'ext_details'      =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'ext_details',
            ],         
            
            'pay_way'           =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'pay_way',
            ],  
            
            'return_url'        =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'return_url',
            ],    
            
            'server_url'        =>   [
                'type'      =>  'Zend\Form\Element\Hidden',
                'name'      =>  'server_url',
            ],    
            
            'submit'        =>   [
                'type'      =>  'Zend\Form\Element\Submit',
                'name'      =>  'submit',
            ],    
        ],
        
        // Validation rules (add rules befor)
        
        'validation'    => [
            
        ],
        
    ),
    
     /**
      * Namespace for all controllers
      */
    'controllers' => array(
        'invokables' => array(
            'privat24.Controller'      => 'Privat24\Controller\Privat24Controller', // call controller connection management
        ),
    ),

    /**
     * Configure the router module
     */

    'router' => array(
        'routes' => array(
                
            'privat24' => array(
                'type'          => 'Segment',
                'options'       => array(
                    'route'         => '/privat24[/:action]',
                    'constraints'   => array(
                        'action'        => '[a-zA-Z]*',
                    ),
                    'defaults' => array(
                        'controller'    => 'privat24.Controller',
                        'action'        => 'pay',
                    ),
                ),
            ),
        ),
    ), 
    
    // Require template_map

    'view_manager' => array(
        'template_map' => include __DIR__  . '../../autoload_templatemap.php',
    ),    
);
