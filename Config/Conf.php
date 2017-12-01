<?php
namespace App;
class Conf{
    static $databases = [
        'default' =>[
            'host'      =>'localhost',
            'database'  =>'booksManagement',
            'login'     =>'root',
            'password'  =>'root'
        ],
        'distrib' =>[
            'host'      =>'',
            'database'  =>'',
            'login'     =>'',
            'password'  =>''
        ]
    ];
}
