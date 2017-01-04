<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2017 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Sol\Core\Model
 */
namespace Sol\Core\Model;

/**
 * Base
 * Classe base para implementação das classes de domínio
 * 
 * @version 1.0.1
 * 
 */
class DomainObjects
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