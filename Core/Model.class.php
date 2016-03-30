<?php
/**
 * Sol\Model
 *
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Sol\Core;

/**
 * Base
 * Classe base para implementação das classes das entidades do banco 
 * 
 * @version 1.0.0
 * 
 */
class Model
{
    public function __construct($attributes = array()) {
        foreach($attributes as $field => $value) {
            $this->$field = $value;
        }
    }    

    public function __set($name, $value) {
        if (method_exists($this, $name)) {
            $this->$name($value);
        } else {
            $this->$name = $value;
        }
    }

    public function __get($name) {
        if (method_exists($this, $name)) {
            return $this->$name();
        } elseif (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

}
