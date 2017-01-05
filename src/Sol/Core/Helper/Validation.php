<?php
/**
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2017 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Sol\Core\Model
 */
namespace Sol\Core\Helper;

/**
 * Base
 * Classe para validação de dados
 * 
 * @version 1.0.0
 * 
 */
class Validation
{

    private $data     = array();
    private $errors   = array();
    private $messages = array();

    /**
     * Método construtor (inicializa definindo as mensagens padrões).
     * @access public
     * @return void
     */
    public function __construct() 
    {
        $this->setMessages();
    }

    /**
     * Define o valor que será validado
     * @access public
     * @param $name string
     * @param $value mixed
     * @return Validator (objeto)
     */
    public function set($name, $value)
    {
        $this->data['name'] = $name;
        $this->data['value'] = $value;
        return $this;
    }

    /**
     * Define as mensagens padrões
     * @access private
     * @return void
     */
    private function setMessages()
    {
        $this->messages = array(
            'is_required'    => 'O campo %s é obrigatório',
            'min_length'     => 'O campo %s deve conter no mínimo %s caracter(es)',
            'max_length'     => 'O campo %s deve conter no máximo %s caracter(es)',
            'min_value'      => 'O valor do campo %s deve ser maior que %s ',
            'max_value'      => 'O valor do campo %s deve ser menor que %s ',
            'is_email'       => 'O email %s não é válido ',
            'is_url'         => 'A URL %s não é válida ',
            'is_cpf'         => 'O valor %s não é um CPF válido ',
            'is_cnpj'        => 'O valor %s não é um CNPJ válido ',
            'is_positive'    => 'O campo %s só aceita valores maior que zero. ',
            'is_date'        => 'A data %s não é válida',
            'is_alpha'       => 'O campo %s só aceita caracteres alfabéticos',
            'is_alpha_num'   => 'O campo %s só aceita caracteres alfanuméricos',
            'no_whitespaces' => 'O campo %s não aceita espaços em branco',
            'is_phone'       => 'O campo %s não é um telefone válido',
            'is_zipcode'     => 'O campo %s não é um CEP válido',
            'is_ip'          => 'O campo $s não é um ip válido'
        );
    }

    /**
     * Define uma mensagem customizada.
     * @param string $name
     * @param string $value
     * @return void
     */
    public function setMessage($name, $value)
    {
        if (array_key_exists($name, $this->messages)){
            $this->messages[$name] = $value;
        }
    }

    /**
     * Traz a mensagem que foi customizada.
     * @param string $param
     * @return mixed
     */
    public function getMessage($param = false)
    {
        if ($param!= false){
            return $this->messages[$param];
        }
        return $this->messages;
    }

    /**
     * Define os erros
     * @param string $error
     * @return void
     */
    private function setError($error){
        $this->errors[$this->data['name']][] = $error;
    }

    /**
     * Verifica se o valor não é nulo
     * @access public
     * @return Validation
     */
    public function isRequired()
    {
        if (empty ($this->data['value'])){
            $this->setError(sprintf($this->message['is_required'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é menor que o parâmetro recebido
     * @access public
     * @param int $length
     * @param boolean $inclusive [opcional]
     * @return Validation
     */
    public function isMinLength($length, $inclusive = false)
    {
        $check = ($inclusive === true ? strlen($this->data['value']) >= $length : strlen($this->data['value']) > $length);
        if (!$check){
            $this->setError(sprintf($this->message['min_length'], $this->data['name'], $length));
        }
        return $this;
    }

    /**
     * Verifica se o valor é maior que o parâmetro recebido
     * @access public
     * @param int $length
     * @param boolean $inclusive [opcional]
     * @return Validation
     */
    public function isMaxLength($length, $inclusive = false)
    {
        $check = ($inclusive === true ? strlen($this->data['value']) <= $length : strlen($this->data['value']) < $length);
        if (!$check){
            $this->setError(sprintf($this->message['max_length'], $this->data['name'], $length));
        }
        return $this;
    }

    /**
     * Verifica se o valor é menor que o parâmetro recebido
     * @access public
     * @param int $value
     * @param boolean $inclusive [opcional]
     * @return Validation
     */
    public function isMinValue($value, $inclusive = false)
    {
        $check = ($inclusive === true ? !is_numeric($this->data['value']) || $this->data['value'] >= $value : !is_numeric($this->data['value']) || $this->data['value'] > $value);
        if (!$check){
            $this->setError(sprintf($this->message['min_value'], $this->data['name'], $value));
        }
        return $this;
    }

    /**
     * Verifica se o valor é maior que o parâmetro recebido
     * @access public
     * @param int $value
     * @param boolean $inclusive [opcional]
     * @return Validation
     */
    public function isMaxValue($value, $inclusive = false)
    {
        $check = ($inclusive === true ? !is_numeric($this->data['value']) || $this->data['value'] <= $value : !is_numeric($this->data['value']) || $this->data['value'] < $value);
        if (!$check){
            $this->setError(sprintf($this->message['max_value'], $this->data['name'], $value));
        }
        return $this;
    }

    /**
     * Verifica se o valor é um email válido
     * @access public
     * @return Validation
     */
    public function isEmail()
    {
        if (filter_var($this->data['value'], FILTER_VALIDATE_EMAIL) === false) {
            $this->setError(sprintf($this->message['is_email'], $this->data['value']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é uma url válida
     * @access public
     * @return Validation
     */
    public function isUrl()
    {
        if (filter_var($this->data['value'], FILTER_VALIDATE_URL) === false) {
            $this->setError(sprintf($this->message['is_url'], $this->data['value']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é um CPF válido
     * @access public
     * @return Validation
     */
    public function isCpf()
    {
        $check = true;

        $c = preg_replace('/\D/', '', $this->data['value']);

        if (strlen($c) != 11) {
            $check = false;
        }

        if (preg_match("/^{$c[0]}{11}$/", $c)) {
            $check = false;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--) {
            if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                $check = false;
            }
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--) {
            if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                $check = false;
            }
        }
        
        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            $check = false;
        }

        if(!$check){
            $this->setError(sprintf($this->message['is_cpf'], $this->data['value']));
        }

        return $this;
    }

    /**
     * Verifica se o valor é um CNPJ válido
     * @access public
     * @return Validation
     */
    public function isCnpj()
    {
        $check = true;

        $c = preg_replace('/\D/', '', $this->data['value']);
        $b = array(6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2);

        if (strlen($c) != 14) {
            $check = false;
        }
        
        for ($i = 0, $n = 0; $i < 12; $n += $c[$i] * $b[++$i]){

            if ($c[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                $check = false;
            }
        }

        for ($i = 0, $n = 0; $i <= 12; $n += $c[$i] * $b[$i++]){

            if ($c[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                $check = false;
            }
        }

        if(!$check){
            $this->setError(sprintf($this->message['is_cnpj'], $this->data['value']));
        }

        return $this;
    }

    /**
     * Verifica se o valor é um número positivo
     * @access public
     * @param boolean $inclusive [opcional]
     * @return Validation
     */
    public function isPositive($inclusive = false)
    {
        $check = ($inclusive === true ? ($this->data['value'] >= 0) : ($this->data['value'] > 0));
        if(!$check){
            $this->setError(sprintf($this->message['is_positive'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é uma data válida
     * @access public
     * @param string $format
     * @return Validation
     */
    public function isDate($format = null)
    {
        $check = true;
        if($this->data['value'] instanceof DateTime){
            return $this;
        }
        elseif(!is_string($this->data['value'])){
            $check = false;
        }
        elseif (is_null($format)){
            $check = (strtotime($this->data['value']) !== false);
            if($check){
                return $this;
            }
        }
        if($check){
            $dateFromFormat = DateTime::createFromFormat($format, $this->data['value']);
            $check = $dateFromFormat && $this->data['value'] === date($format, $dateFromFormat->getTimestamp());
        }
        if(!$check){
            $this->setError(sprintf($this->message['is_date'], $this->data['value']));
        }
        return $this;
    }

    /**
     * Verifica se o valor contêm apenas caracteres 
     * @access private
     * @param String $stringFormat (expressão regular)
     * @param string $extras [optional] caracteres extras
     * @return bool
     */
    private function genericAlphaNum($stringFormat, $extras = '')
    {
        $this->data['value'] = (string) $this->data['value'];
        $clearInput = str_replace(str_split($extras), '', $this->data['value']);
        return ($clearInput !== $this->data['value'] && $clearInput === '') || preg_match($stringFormat, $clearInput);
    }

    /**
     * Verifica se o valor contêm apenas caracteres sem números
     * @access public
     * @param string $extras [optional] caracteres extras
     * @return Validation
     */
    public function isAlpha($extras = '')
    {
        $stringFormat = '/^(\s|[a-zA-Z])*$/';
        if(!$this->genericAlphaNum($stringFormat, $extras)){
            $this->setError(sprintf($this->message['is_alpha'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Verifica se o valor contêm apenas caracteres alfanuméricos
     * @access public
     * @param string $extras [optional] caracteres extras
     * @return Validation
     */
    public function isAlphaNum($extras = '')
    {
        $stringFormat = '/^(\s|[a-zA-Z0-9])*$/';
        if(!$this->genericAlphaNum($stringFormat, $extras)){
            $this->setError(sprintf($this->message['is_alpha_num'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Verifica se o valor não contêm espaços
     * @access public
     * @return Validation
     */
    public function noWhitespaces()
    {
        $check = is_null($this->data['value']) || preg_match('#^\S+$#', $this->data['value']);
        if(!$check){
            $this->setError(sprintf($this->message['no_whitespaces'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é um número de telefone válido (8 or 9 dígitos)
     * @access public
     * @return Validation
     */
    public function isPhoneNumber()
    {
        $check = preg_match('/^(\(0?\d{2}\)\s?|0?\d{2}[\s.-]?)\d{4,5}[\s.-]?\d{4}$/', $this->data['value']);
        if(!$check){
            $this->setError(sprintf($this->message['is_phone'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é um IP válido
     * @access public
     * @return Validation
     */
    public function isIp()
    {
        if (filter_var($this->data['value'], FILTER_VALIDATE_IP) === false) {
            $this->setError(sprintf($this->message['is_ip'], $this->data['value']));
        }
        return $this;
    }

    /**
     * Verifica se o valor é um CEP válido
     * @access public
     * @return Validation
     */
    public function isZipCode()
    {
        $check = preg_match('/^[0-9]{5}-[0-9]{3}$/', $this->data['value']);
        if(!$check){
            $this->setError(sprintf($this->message['is_zipcode'], $this->data['name']));
        }
        return $this;
    }

    /**
     * Retorna se o valor foi validado
     * @access public
     * @return bool
     */
    public function validate()
    {
        return (count($this->errors) > 0 ? false : true);
    }
}