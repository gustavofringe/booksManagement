<?php
/**
 * Created by PhpStorm.
 * Admin: gustavo
 * Date: 06/11/17
 * Time: 19:56
 */
use App\Model;

class Post extends Model
{
    protected $fillable = [

        'title'=>[
            'rule'=>'preg',
            'cond'=>'([a-zA-Z0-9\.\s]+)',
            'message'=>'Ne doit contenir que des caractères numeriques et .'
        ],
        'author'=>[
            'rule'=>'preg',
            'cond'=>'([a-zA-Z0-9\.\s\-]+)',
            'message'=>'attention'
        ],
        'resume'=>[
            'rule'=>'sanitize',
            'cond'=>'([a-zA-Z0-9\.\s\!\,\?\:\;]+)',
            'message'=>'Ne doit pas contenir de caractères qui pourrait nuir au contenu du site'
        ]
    ];
}
