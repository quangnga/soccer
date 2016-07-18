<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/12/2015
 * Time: 12:11 AM
 */

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ContactFormInfoTable extends Table
{

    public function validationDefault(Validator $validator){



        $validator
            ->add('photo','validValue',[
            'rule'=>['extension',array('gif','jpeg','jpg','png')],
            'message'=>'Please enter a valid image file'
            ]);

        return $validator;
    }
}