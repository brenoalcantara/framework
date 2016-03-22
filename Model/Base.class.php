<?php
/**
 * Sol\Model
 * 
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Sol\Model;

/**
 * Base
 * Classe base para implementação das classes das entidades do banco 
 * 
 * @version 1.0.0
 * 
 */
class Base
{

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
