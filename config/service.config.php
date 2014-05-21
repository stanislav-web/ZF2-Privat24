<?php

/**
 * Configurator services module callable using ServiceManager
 */
return [
    'factories' => [
        'Privat24\Config' =>  function($sm) {   // add correctly config service
            $config = $sm->get('Configuration')['privat24'];
            return $config;
        },        
    ],                
];
