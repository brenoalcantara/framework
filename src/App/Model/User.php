<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2016 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT) 
 * @package App\Model
 */
namespace App\Model;

use Sol\Core\Database\Model;

/**
 * Example
 * Classe da entidade exemplo
 *
 * @version 1.0.0
 *
 */

class User extends Model
{
    private $password;    

    public function __construct($attributes = array()){
        parent::__construct($attributes);
    }

    public function password($value = null){
        if (!is_null($value)){
            $this->password = md5($value);
        } else {
            return $this->password;
        }
    }
}

