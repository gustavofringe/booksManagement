<?php
/**
 * Created by PhpStorm.
 * Admin: gustavo
 * Date: 10/11/17
 * Time: 22:16
 */
use App\Model;

class Admin extends Model
{
    protected $fillable = [
        'name'=>[
            'rule'=>'preg',
            'cond'=>'([a-zA-Z0-9\s]+)',
            'message'=>'ne doit contenir uniquement des caractères alphanumerique'
        ]
    ];
}
