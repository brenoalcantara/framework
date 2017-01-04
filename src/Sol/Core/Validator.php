<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2017 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Sol\Core\Model
 */
namespace Sol\Core;

/**
 * Base
 * Classe para validação de dados
 * 
 * @version 1.0.0
 * 
 */
class Validator 
{

    protected $data     = array();
    protected $errors   = array();
    protected $messages = array();

    /**
     * Método construtor que define as mensagens padrões
     * @return void
     */
    public function __construct() 
    {
        $this->setMessagesDefault();
    }


    /**
     * Define o dado que será validado
     * @param $name string
     * @param $value mixed
     * @return Validator (instância da classe)
     */
    public function set($name, $value)
    {
        $this->data['name'] = $name;
        $this->data['value'] = $value;
        return $this;
    }


    /**
     * Set error messages default born in the class
     * @access protected
     * @return void
     */
    protected function setMessagesDefault(){
        $this->messages = array(
            'is_required'    => 'O campo %s é obrigatório',
            'min_length'     => 'O campo %s deve conter ao mínimo %s caracter(es)',
            'max_length'     => 'O campo %s deve conter ao máximo %s caracter(es)',
            'between_length' => 'O campo %s deve conter entre %s e %s caracter(es)',
            'min_value'      => 'O valor do campo %s deve ser maior que %s ',
            'max_value'      => 'O valor do campo %s deve ser menor que %s ',
            'between_values' => 'O valor do campo %s deve estar entre %s e %s',
            'is_email'       => 'O email %s não é válido ',
            'is_url'         => 'A URL %s não é válida ',
            'is_slug'        => '%s não é um slug ',
            'is_num'         => 'O valor %s não é numérico ',
            'is_integer'     => 'O valor %s não é inteiro ',
            'is_float'       => 'O valor %s não é float ',
            'is_string'      => 'O valor %s não é String ',
            'is_boolean'     => 'O valor %s não é booleano ',
            'is_obj'         => 'A variável %s não é um objeto ',
            'is_instance_of' => '%s não é uma instância de %s ',
            'is_arr'         => 'A variável %s não é um array ',
            'is_directory'   => '%s não é um diretório válido ',
            'is_equals'      => 'O valor do campo %s deve ser igual à %s ',
            'is_not_equals'  => 'O valor do campo %s não deve ser igual à %s ',
            'is_cpf'         => 'O valor %s não é um CPF válido ',
            'is_cnpj'        => 'O valor %s não é um CNPJ válido ',
            'contains'       => 'O campo %s só aceita um do(s) seguinte(s) valore(s): [%s] ',
            'not_contains'   => 'O campo %s não aceita o(s) seguinte(s) valore(s): [%s] ',
            'is_lowercase'   => 'O campo %s só aceita caracteres minúsculos ',
            'is_uppercase'   => 'O campo %s só aceita caracteres maiúsculos ',
            'is_multiple'    => 'O valor %s não é múltiplo de %s',
            'is_positive'    => 'O campo %s só aceita valores positivos',
            'is_negative'    => 'O campo %s só aceita valores negativos',
            'is_date'        => 'A data %s não é válida',
            'is_alpha'       => 'O campo %s só aceita caracteres alfabéticos',
            'is_alpha_num'   => 'O campo %s só aceita caracteres alfanuméricos',
            'no_whitespaces' => 'O campo %s não aceita espaços em branco',
            'is_phone'       => 'O campo %s não é um telefone válido',
            'is_zipCode'     => 'O campo %s não é um CEP válido',
            'is_plate'       => 'O campo $s não é válido',
            'is_ip'          => 'O campo $s não é um ip válido'
        );
    }

    /**
     * Define uma mensagem customizada
     * @param string $name
     * @param string $value
     * @return void
     */
    public function setMessage($name, $value){
        if (array_key_exists($name, $this->messages)){
            $this->messages[$name] = $value;
        }
    }


    /**
     * Traz a mensagem de erro
     * @param string $param
     * @return mixed
     */
    public function getMessages($param = false){
        if ($param){
            return $this->messages[$param];
        }
        return $this->messages;
    }

    /**
     * Set a error of the invalid data
     * @access protected
     * @param String $error The error message
     * @return void
     */
    protected function setError($error){
        $this->errors[$this->_pattern['prefix'] . $this->data['name'] . $this->_pattern['sufix']][] = $error;
    }

    /**
     * Verify if the current data is not null
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_required(){
        if (empty ($this->data['value'])){
            $this->set_error(sprintf($this->message['is_required'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the length of current value is less than the parameter
     * @access public
     * @param Int $length The value for compare
     * @param Boolean $inclusive [optional] Include the lenght in the comparison
     * @return Data_Validator The self instance
     */
    public function min_length($length, $inclusive = false){
        $verify = ($inclusive === true ? strlen($this->data['value']) >= $length : strlen($this->data['value']) > $length);
        if (!$verify){
            $this->set_error(sprintf($this->message['min_length'], $this->data['name'], $length));
        }
        return $this;
    }


    /**
     * Verify if the length of current value is more than the parameter
     * @access public
     * @param Int $length The value for compare
     * @param Boolean $inclusive [optional] Include the lenght in the comparison
     * @return Data_Validator The self instance
     */
    public function max_length($length, $inclusive = false){
        $verify = ($inclusive === true ? strlen($this->data['value']) <= $length : strlen($this->data['value']) < $length);
        if (!$verify){
            $this->set_error(sprintf($this->message['max_length'], $this->data['name'], $length));
        }
        return $this;
    }


    /**
     * Verify if the length current value is between than the parameters
     * @access public
     * @param Int $min The minimum value for compare
     * @param Int $max The maximum value for compare
     * @return Data_Validator The self instance
     */
    public function between_length($min, $max){
        if(strlen($this->data['value']) < $min || strlen($this->data['value']) > $max){
            $this->set_error(sprintf($this->message['between_length'], $this->data['name'], $min, $max));
        }
        return $this;
    }


    /**
     * Verify if the current value is less than the parameter
     * @access public
     * @param Int $value The value for compare
     * @param Boolean $inclusive [optional] Include the value in the comparison
     * @return Data_Validator The self instance
     */
    public function min_value($value, $inclusive = false){
        $verify = ($inclusive === true ? !is_numeric($this->data['value']) || $this->data['value'] >= $value : !is_numeric($this->data['value']) || $this->data['value'] > $value);
        if (!$verify){
            $this->set_error(sprintf($this->message['min_value'], $this->data['name'], $value));
        }
        return $this;
    }


    /**
     * Verify if the current value is more than the parameter
     * @access public
     * @param Int $value The value for compare
     * @param Boolean $inclusive [optional] Include the value in the comparison
     * @return Data_Validator The self instance
     */
    public function max_value($value, $inclusive = false){
        $verify = ($inclusive === true ? !is_numeric($this->data['value']) || $this->data['value'] <= $value : !is_numeric($this->data['value']) || $this->data['value'] < $value);
        if (!$verify){
            $this->set_error(sprintf($this->message['max_value'], $this->data['name'], $value));
        }
        return $this;
    }


    /**
     * Verify if the length of current value is more than the parameter
     * @access public
     * @param Int $min_value The minimum value for compare
     * @param Int $max_value The maximum value for compare
     * @return Data_Validator The self instance
     */
    public function between_values($min_value, $max_value){
        if(!is_numeric($this->data['value']) || (($this->data['value'] < $min_value || $this->data['value'] > $max_value ))){
            $this->set_error(sprintf($this->message['between_values'], $this->data['name'], $min_value, $max_value));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid email
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_email(){
        if (filter_var($this->data['value'], FILTER_VALIDATE_EMAIL) === false) {
            $this->set_error(sprintf($this->message['is_email'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid URL
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_url(){
        if (filter_var($this->data['value'], FILTER_VALIDATE_URL) === false) {
            $this->set_error(sprintf($this->message['is_url'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a slug
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_slug(){
        $verify = true;

        if (strstr($input, '--')) {
            $verify = false;
        }
        if (!preg_match('@^[0-9a-z\-]+$@', $input)) {
            $verify = false;
        }
        if (preg_match('@^-|-$@', $input)){
            $verify = false;
        }
        if(!$verify){
            $this->set_error(sprintf($this->message['is_slug'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a numeric value
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_num(){
        if (!is_numeric($this->data['value'])){
            $this->set_error(sprintf($this->message['is_num'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a integer value
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_integer(){
        if (!is_numeric($this->data['value']) && (int) $this->data['value'] != $this->data['value']){
            $this->set_error(sprintf($this->message['is_integer'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a float value
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_float(){
        if (!is_float(filter_var($this->data['value'], FILTER_VALIDATE_FLOAT))){
            $this->set_error(sprintf($this->message['is_float'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a string value
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_string(){
        if(!is_string($this->data['value'])){
            $this->set_error(sprintf($this->message['is_string'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a boolean value
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_boolean(){
        if(!is_bool($this->data['value'])){
            $this->set_error(sprintf($this->message['is_boolean'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a object
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_obj(){
        if(!is_object($this->data['value'])){
            $this->set_error(sprintf($this->message['is_obj'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a instance of the determinate class
     * @access public
     * @param String $class The class for compare
     * @return Data_Validator The self instance
     */
    public function is_instance_of($class){
        if(!($this->data['value'] instanceof $class)){
            $this->set_error(sprintf($this->message['is_instance_of'], $this->data['name'], $class));
        }
        return $this;
    }


    /**
     * Verify if the current data is a array
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_arr(){
        if(!is_array($this->data['value'])){
            $this->set_error(sprintf($this->message['is_arr'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current parameter it is a directory
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_directory(){
        $verify = is_string($this->data['value']) && is_dir($this->data['value']);
        if(!$verify){
            $this->set_error(sprintf($this->message['is_directory'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is equals than the parameter
     * @access public
     * @param String $value The value for compare
     * @param Boolean $identical [optional] Identical?
     * @return Data_Validator The self instance
     */
    public function is_equals($value, $identical = false){
        $verify = ($identical === true ? $this->data['value'] === $value : strtolower($this->data['value']) == strtolower($value));
        if(!$verify){
            $this->set_error(sprintf($this->message['is_equals'], $this->data['name'], $value));
        }
        return $this;
    }


    /**
     * Verify if the current data is not equals than the parameter
     * @access public
     * @param String $value The value for compare
     * @param Boolean $identical [optional] Identical?
     * @return Data_Validator The self instance
     */
    public function is_not_equals($value, $identical = false){
        $verify = ($identical === true ? $this->data['value'] !== $value : strtolower($this->data['value']) != strtolower($value));
        if(!$verify){
            $this->set_error(sprintf($this->message['is_not_equals'], $this->data['name'], $value));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid CPF
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_cpf(){
        $verify = true;

        $c = preg_replace('/\D/', '', $this->data['value']);

        if (strlen($c) != 11)
            $verify = false;

        if (preg_match("/^{$c[0]}{11}$/", $c))
            $verify = false;

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n))
            $verify = false;

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n))
            $verify = false;

        if(!$verify){
            $this->set_error(sprintf($this->message['is_cpf'], $this->data['value']));
        }

        return $this;
    }


    /**
     * Verify if the current data is a valid CNPJ
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_cnpj(){
        $verify = true;

        $c = preg_replace('/\D/', '', $this->data['value']);
        $b = array(6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2);

        if (strlen($c) != 14)
            $verify = false;
        for ($i = 0, $n = 0; $i < 12; $n += $c[$i] * $b[++$i]);

        if ($c[12] != ((($n %= 11) < 2) ? 0 : 11 - $n))
            $verify = false;

        for ($i = 0, $n = 0; $i <= 12; $n += $c[$i] * $b[$i++]);

        if ($c[13] != ((($n %= 11) < 2) ? 0 : 11 - $n))
            $verify = false;

        if(!$verify){
            $this->set_error(sprintf($this->message['is_cnpj'], $this->data['value']));
        }

        return $this;
    }


    /**
     * Verify if the current data contains in the parameter
     * @access public
     * @param Mixed $values One array or String with valids values
     * @param Mixed $separator [optional] If $values as a String, pass the separator of values (ex: , - | )
     * @return Data_Validator The self instance
     */
    public function contains($values, $separator = false){
        if(!is_array($values)){
            if(!$separator || is_null($values)){
                $values = array();
            }
            else{
                $values = explode($separator, $values);
            }
        }

        if(!in_array($this->data['value'], $values)){
            $this->set_error(sprintf($this->message['contains'], $this->data['name'], implode(', ', $values)));
        }
        return $this;
    }


    /**
     * Verify if the current data not contains in the parameter
     * @access public
     * @param Mixed $values One array or String with valids values
     * @param Mixed $separator [optional] If $values as a String, pass the separator of values (ex: , - | )
     * @return Data_Validator The self instance
     */
    public function not_contains($values, $separator = false){
        if(!is_array($values)){
            if(!$separator || is_null($values)){
                $values = array();
            }
            else{
                $values = explode($separator, $values);
            }
        }

        if(in_array($this->data['value'], $values)){
            $this->set_error(sprintf($this->message['not_contains'], $this->data['name'], implode(', ', $values)));
        }
        return $this;
    }


    /**
     * Verify if the current data is loweracase
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_lowercase(){
        if($this->data['value'] !== mb_strtolower($this->data['value'], mb_detect_encoding($this->data['value']))){
            $this->set_error(sprintf($this->message['is_lowercase'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is uppercase
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_uppercase(){
        if($this->data['value'] !== mb_strtoupper($this->data['value'], mb_detect_encoding($this->data['value']))){
            $this->set_error(sprintf($this->message['is_uppercase'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is multiple of the parameter
     * @access public
     * @param Int $value The value for comparison
     * @return Data_Validator The self instance
     */
    public function is_multiple($value){
        if($value == 0){
            $verify = ($this->data['value'] == 0);
        }
        else{
            $verify = ($this->data['value'] % $value == 0);
        }
        if(!$verify){
            $this->set_error(sprintf($this->message['is_multiple'], $this->data['value'], $value));
        }
        return $this;
    }


    /**
     * Verify if the current data is a positive number
     * @access public
     * @param Boolean $inclusive [optional] Include 0 in comparison?
     * @return Data_Validator The self instance
     */
    public function is_positive($inclusive = false){
        $verify = ($inclusive === true ? ($this->data['value'] >= 0) : ($this->data['value'] > 0));
        if(!$verify){
            $this->set_error(sprintf($this->message['is_positive'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a negative number
     * @access public
     * @param Boolean $inclusive [optional] Include 0 in comparison?
     * @return Data_Validator The self instance
     */
    public function is_negative($inclusive = false){
        $verify = ($inclusive === true ? ($this->data['value'] <= 0) : ($this->data['value'] < 0));
        if(!$verify){
            $this->set_error(sprintf($this->message['is_negative'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid Date
     * @access public
     * @param String $format [optional] The Date format
     * @return Data_Validator The self instance
     */
    public function is_date($format = null){
        $verify = true;
        if($this->data['value'] instanceof DateTime){
            return $this;
        }
        elseif(!is_string($this->data['value'])){
            $verify = false;
        }
        elseif (is_null($format)){
            $verify = (strtotime($this->data['value']) !== false);
            if($verify){
                return $this;
            }
        }
        if($verify){
            $date_from_format = DateTime::createFromFormat($format, $this->data['value']);
            $verify = $date_from_format && $this->data['value'] === date($format, $date_from_format->getTimestamp());
        }
        if(!$verify){
            $this->set_error(sprintf($this->message['is_date'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data contains just alpha caracters
     * @access protected
     * @param String $string_format The regex
     * @param String $additional [optional] The extra caracters
     * @return Boolean True if data is valid or false otherwise
     */
    protected function generic_alpha_num($string_format, $additional = ''){
        $this->data['value'] = (string) $this->data['value'];
        $clean_input = str_replace(str_split($additional), '', $this->data['value']);
        return ($clean_input !== $this->data['value'] && $clean_input === '') || preg_match($string_format, $clean_input);
    }


    /**
     * Verify if the current data contains just alpha caracters
     * @access public
     * @param String $additional [optional] The extra caracters
     * @return Data_Validator The self instance
     */
    public function is_alpha($additional = ''){
        $string_format = '/^(\s|[a-zA-Z])*$/';
        if(!$this->generic_alpha_num($string_format, $additional)){
            $this->set_error(sprintf($this->message['is_alpha'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data contains just alpha-numerics caracters
     * @access public
     * @param String $additional [optional] The extra caracters
     * @return Data_Validator The self instance
     */
    public function is_alpha_num($additional = ''){
        $string_format = '/^(\s|[a-zA-Z0-9])*$/';
        if(!$this->generic_alpha_num($string_format, $additional)){
            $this->set_error(sprintf($this->message['is_alpha_num'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data no contains white spaces
     * @access public
     * @return Data_Validator The self instance
     */
    public function no_whitespaces(){
        $verify = is_null($this->data['value']) || preg_match('#^\S+$#', $this->data['value']);
        if(!$verify){
            $this->set_error(sprintf($this->message['no_whitespaces'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid Phone Number (8 or 9 digits)
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_phone(){
        $verify = preg_match('/^(\(0?\d{2}\)\s?|0?\d{2}[\s.-]?)\d{4,5}[\s.-]?\d{4}$/', $this->data['value']);
        if(!$verify){
            $this->set_error(sprintf($this->message['is_phone'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid License Plate (Brazil)
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_plate(){
        $verify = preg_match('/^[A-Z]{3}\-[0-9]{4}$/', $this->data['value']);
        if(!$verify){
            $this->set_error(sprintf($this->message['is_plate'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid IP
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_ip(){
        if (filter_var($this->data['value'], FILTER_VALIDATE_IP) === false) {
            $this->set_error(sprintf($this->message['is_ip'], $this->data['value']));
        }
        return $this;
    }


    /**
     * Verify if the current data is a valid Zip Code (Brazil)
     * @access public
     * @return Data_Validator The self instance
     */
    public function is_zipCode(){
        $verify = preg_match('/^[0-9]{5}-[0-9]{3}$/', $this->data['value']);
        if(!$verify){
            $this->set_error(sprintf($this->message['is_zipCode'], $this->data['name']));
        }
        return $this;
    }


    /**
     * Validate the data
     * @access public
     * @return bool The validation of data
     */
    public function validate(){
        return (count($this->errors) > 0 ? false : true);
    }


    /**
     * The messages of invalid data
     * @param String $param [optional] A specific error
     * @return Mixed One array with messages or a message of specific error
     */
    public function geterrors($param = false){
        if ($param){
            if(isset($this->errors[$this->_pattern['prefix'] . $param . $this->_pattern['sufix']])){
                return $this->errors[$this->_pattern['prefix'] . $param . $this->_pattern['sufix']];
            }
            else{
                return false;
            }
        }
        return $this->errors;
    }
}