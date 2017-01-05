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
    /**
     * Método construtor (atribui valores aos campos)
     * 
     * @param array $attributes
     */
    public function __construct($attributes = array()) {
        foreach($attributes as $field => $value) {
            $this->$field = $value;
        }
    }    

    /**
     * Define o valor do atributo
     * 
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value) {
        if (method_exists($this, $name)) {
            $this->$name($value);
        } else {
            $this->$name = $value;
        }
    }

    /**
     * Retorna o valor do atributo
     * 
     * @param string $name
     * @return string|null
     */
    public function __get($name) {
        if (method_exists($this, $name)) {
            return $this->$name();
        } elseif (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}