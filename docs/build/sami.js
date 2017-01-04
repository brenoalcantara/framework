
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Dao" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Dao.html">Dao</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Dao_User" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Dao/User.html">User</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Model" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Model.html">Model</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Model_User" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Model/User.html">User</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                            <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Sol</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Sol_Core" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Sol/Core.html">Core</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Sol_Core_Database" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Sol/Core/Database.html">Database</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Sol_Core_Database_Connection" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Sol/Core/Database/Connection.html">Connection</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Sol_Core_Model" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Sol/Core/Model.html">Model</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Sol_Core_Model_DataMappers" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Sol/Core/Model/DataMappers.html">DataMappers</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Model_DomainObjects" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Sol/Core/Model/DomainObjects.html">DomainObjects</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Sol_Core_Crypt" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Crypt.html">Crypt</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Router" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Router.html">Router</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Session" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Session.html">Session</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Template" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Template.html">Template</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Upload" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Upload.html">Upload</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Util" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Util.html">Util</a>                    </div>                </li>                            <li data-name="class:Sol_Core_Validator" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Sol/Core/Validator.html">Validator</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Dao.html", "name": "App\\Dao", "doc": "Namespace App\\Dao"},{"type": "Namespace", "link": "App/Model.html", "name": "App\\Model", "doc": "Namespace App\\Model"},{"type": "Namespace", "link": "Sol.html", "name": "Sol", "doc": "Namespace Sol"},{"type": "Namespace", "link": "Sol/Core.html", "name": "Sol\\Core", "doc": "Namespace Sol\\Core"},{"type": "Namespace", "link": "Sol/Core/Database.html", "name": "Sol\\Core\\Database", "doc": "Namespace Sol\\Core\\Database"},{"type": "Namespace", "link": "Sol/Core/Model.html", "name": "Sol\\Core\\Model", "doc": "Namespace Sol\\Core\\Model"},
            
            {"type": "Class", "fromName": "App\\Dao", "fromLink": "App/Dao.html", "link": "App/Dao/User.html", "name": "App\\Dao\\User", "doc": "&quot;User\nClasse DAO para persist\u00eancia de dados&quot;"},
                                                        {"type": "Method", "fromName": "App\\Dao\\User", "fromLink": "App/Dao/User.html", "link": "App/Dao/User.html#method___construct", "name": "App\\Dao\\User::__construct", "doc": "&quot;Inicializa a conex\u00e3o com o banco&quot;"},
                    {"type": "Method", "fromName": "App\\Dao\\User", "fromLink": "App/Dao/User.html", "link": "App/Dao/User.html#method_insert", "name": "App\\Dao\\User::insert", "doc": "&quot;Insere os dados&quot;"},
                    {"type": "Method", "fromName": "App\\Dao\\User", "fromLink": "App/Dao/User.html", "link": "App/Dao/User.html#method_update", "name": "App\\Dao\\User::update", "doc": "&quot;Atualiza os dados&quot;"},
                    {"type": "Method", "fromName": "App\\Dao\\User", "fromLink": "App/Dao/User.html", "link": "App/Dao/User.html#method_delete", "name": "App\\Dao\\User::delete", "doc": "&quot;Deleta um registro&quot;"},
                    {"type": "Method", "fromName": "App\\Dao\\User", "fromLink": "App/Dao/User.html", "link": "App/Dao/User.html#method___destruct", "name": "App\\Dao\\User::__destruct", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Model", "fromLink": "App/Model.html", "link": "App/Model/User.html", "name": "App\\Model\\User", "doc": "&quot;Example\nClasse da entidade exemplo&quot;"},
                                                        {"type": "Method", "fromName": "App\\Model\\User", "fromLink": "App/Model/User.html", "link": "App/Model/User.html#method___construct", "name": "App\\Model\\User::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Model\\User", "fromLink": "App/Model/User.html", "link": "App/Model/User.html#method_password", "name": "App\\Model\\User::password", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Crypt.html", "name": "Sol\\Core\\Crypt", "doc": "&quot;Crypt\nClasse para gera\u00e7\u00e3o de hashs de senhas e tokens&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method___construct", "name": "Sol\\Core\\Crypt::__construct", "doc": "&quot;M\u00e9todo construtor da classe&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method_encripty", "name": "Sol\\Core\\Crypt::encripty", "doc": "&quot;Encripta a string&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method_check", "name": "Sol\\Core\\Crypt::check", "doc": "&quot;Checa a string&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method_generateSalt", "name": "Sol\\Core\\Crypt::generateSalt", "doc": "&quot;Gera o salt&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method_generateHash", "name": "Sol\\Core\\Crypt::generateHash", "doc": "&quot;Gera o hash&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method_generateToken", "name": "Sol\\Core\\Crypt::generateToken", "doc": "&quot;Gera o token&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Crypt", "fromLink": "Sol/Core/Crypt.html", "link": "Sol/Core/Crypt.html#method_checkToken", "name": "Sol\\Core\\Crypt::checkToken", "doc": "&quot;Checa o token&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core\\Database", "fromLink": "Sol/Core/Database.html", "link": "Sol/Core/Database/Connection.html", "name": "Sol\\Core\\Database\\Connection", "doc": "&quot;Connection\nClasse final padrao Singleton para conexao com o Mysql&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Database\\Connection", "fromLink": "Sol/Core/Database/Connection.html", "link": "Sol/Core/Database/Connection.html#method_getConnection", "name": "Sol\\Core\\Database\\Connection::getConnection", "doc": "&quot;Retorna a conex\u00e3o&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core\\Model", "fromLink": "Sol/Core/Model.html", "link": "Sol/Core/Model/DataMappers.html", "name": "Sol\\Core\\Model\\DataMappers", "doc": "&quot;Base\nClasse base para implementa\u00e7\u00e3o das classes de dom\u00ednio&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Model\\DataMappers", "fromLink": "Sol/Core/Model/DataMappers.html", "link": "Sol/Core/Model/DataMappers.html#method___construct", "name": "Sol\\Core\\Model\\DataMappers::__construct", "doc": "&quot;Inicializa a conex\u00e3o com o banco&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Model\\DataMappers", "fromLink": "Sol/Core/Model/DataMappers.html", "link": "Sol/Core/Model/DataMappers.html#method_load", "name": "Sol\\Core\\Model\\DataMappers::load", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core\\Model", "fromLink": "Sol/Core/Model.html", "link": "Sol/Core/Model/DomainObjects.html", "name": "Sol\\Core\\Model\\DomainObjects", "doc": "&quot;Base\nClasse base para implementa\u00e7\u00e3o das classes de dom\u00ednio&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Model\\DomainObjects", "fromLink": "Sol/Core/Model/DomainObjects.html", "link": "Sol/Core/Model/DomainObjects.html#method___construct", "name": "Sol\\Core\\Model\\DomainObjects::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Model\\DomainObjects", "fromLink": "Sol/Core/Model/DomainObjects.html", "link": "Sol/Core/Model/DomainObjects.html#method___set", "name": "Sol\\Core\\Model\\DomainObjects::__set", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Model\\DomainObjects", "fromLink": "Sol/Core/Model/DomainObjects.html", "link": "Sol/Core/Model/DomainObjects.html#method___get", "name": "Sol\\Core\\Model\\DomainObjects::__get", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Router.html", "name": "Sol\\Core\\Router", "doc": "&quot;Router\nClasse para roteamento de URLs&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Router", "fromLink": "Sol/Core/Router.html", "link": "Sol/Core/Router.html#method___construct", "name": "Sol\\Core\\Router::__construct", "doc": "&quot;M\u00e9todo construtor da classe&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Router", "fromLink": "Sol/Core/Router.html", "link": "Sol/Core/Router.html#method_getParam", "name": "Sol\\Core\\Router::getParam", "doc": "&quot;Retorna um par\u00e2metro espec\u00edfico&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Router", "fromLink": "Sol/Core/Router.html", "link": "Sol/Core/Router.html#method_getController", "name": "Sol\\Core\\Router::getController", "doc": "&quot;Retorna o controller&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Router", "fromLink": "Sol/Core/Router.html", "link": "Sol/Core/Router.html#method_getAction", "name": "Sol\\Core\\Router::getAction", "doc": "&quot;Retorna o m\u00e9todo&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Session.html", "name": "Sol\\Core\\Session", "doc": "&quot;Session\nClasse final para gerenciamento de sess\u00e3o&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Session", "fromLink": "Sol/Core/Session.html", "link": "Sol/Core/Session.html#method___construct", "name": "Sol\\Core\\Session::__construct", "doc": "&quot;Metodo construtor da classe. Inicializa a sess\u00e3o&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Session", "fromLink": "Sol/Core/Session.html", "link": "Sol/Core/Session.html#method___clone", "name": "Sol\\Core\\Session::__clone", "doc": "&quot;Impede a clonagem da classe&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Session", "fromLink": "Sol/Core/Session.html", "link": "Sol/Core/Session.html#method_setSession", "name": "Sol\\Core\\Session::setSession", "doc": "&quot;Seta a variavel da sessao e o seu valor&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Session", "fromLink": "Sol/Core/Session.html", "link": "Sol/Core/Session.html#method_getSession", "name": "Sol\\Core\\Session::getSession", "doc": "&quot;Retorna o valor da variavel da sessao&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Session", "fromLink": "Sol/Core/Session.html", "link": "Sol/Core/Session.html#method_sessionDestroy", "name": "Sol\\Core\\Session::sessionDestroy", "doc": "&quot;Destr\u00f3i a sess\u00e3o&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Template.html", "name": "Sol\\Core\\Template", "doc": "&quot;Template\nClasse para renderizacao de templates&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Template", "fromLink": "Sol/Core/Template.html", "link": "Sol/Core/Template.html#method___construct", "name": "Sol\\Core\\Template::__construct", "doc": "&quot;Metodo construtor&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Template", "fromLink": "Sol/Core/Template.html", "link": "Sol/Core/Template.html#method_setTag", "name": "Sol\\Core\\Template::setTag", "doc": "&quot;Seta os valores que ser\u00e3o substituidos no template&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Template", "fromLink": "Sol/Core/Template.html", "link": "Sol/Core/Template.html#method_output", "name": "Sol\\Core\\Template::output", "doc": "&quot;Percorre as marcas do template e as substitui pelos valores&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Template", "fromLink": "Sol/Core/Template.html", "link": "Sol/Core/Template.html#method_outputTemplates", "name": "Sol\\Core\\Template::outputTemplates", "doc": "&quot;Mescla as partes do template&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Upload.html", "name": "Sol\\Core\\Upload", "doc": "&quot;Upload\nClasse para upload de arquivos.&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method___construct", "name": "Sol\\Core\\Upload::__construct", "doc": "&quot;Metodo construtor da classe&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_setPath", "name": "Sol\\Core\\Upload::setPath", "doc": "&quot;Seta o destino do arquivo&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_setAllowedExtensions", "name": "Sol\\Core\\Upload::setAllowedExtensions", "doc": "&quot;Seta as extensoes permitidas&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_setMaxSize", "name": "Sol\\Core\\Upload::setMaxSize", "doc": "&quot;Seta o tamanho maximo permitido&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_setMessage", "name": "Sol\\Core\\Upload::setMessage", "doc": "&quot;Seta a mensagem de sucesso ou erro&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_getName", "name": "Sol\\Core\\Upload::getName", "doc": "&quot;Retorna o nome do arquivo&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_getExtension", "name": "Sol\\Core\\Upload::getExtension", "doc": "&quot;Retorna a extensao do arquivo&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_getWidth", "name": "Sol\\Core\\Upload::getWidth", "doc": "&quot;Retorna a largura da imagem&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_getHeight", "name": "Sol\\Core\\Upload::getHeight", "doc": "&quot;Retorna a altura da imagem&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_getMessage", "name": "Sol\\Core\\Upload::getMessage", "doc": "&quot;Retorna a mensagem de erro ou sucesso&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Upload", "fromLink": "Sol/Core/Upload.html", "link": "Sol/Core/Upload.html#method_upload", "name": "Sol\\Core\\Upload::upload", "doc": "&quot;Executa o upload do arquivo&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Util.html", "name": "Sol\\Core\\Util", "doc": "&quot;Util\nClasse com fun\u00e7\u00f5es utilit\u00e1rias&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Util", "fromLink": "Sol/Core/Util.html", "link": "Sol/Core/Util.html#method_isValidEmail", "name": "Sol\\Core\\Util::isValidEmail", "doc": "&quot;Checa se o e-mail \u00e9 v\u00e1lido&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Util", "fromLink": "Sol/Core/Util.html", "link": "Sol/Core/Util.html#method_isValidUrl", "name": "Sol\\Core\\Util::isValidUrl", "doc": "&quot;Checa se a url \u00e9 v\u00e1lida&quot;"},
            
            {"type": "Class", "fromName": "Sol\\Core", "fromLink": "Sol/Core.html", "link": "Sol/Core/Validator.html", "name": "Sol\\Core\\Validator", "doc": "&quot;Base\nClasse para valida\u00e7\u00e3o de dados&quot;"},
                                                        {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method___construct", "name": "Sol\\Core\\Validator::__construct", "doc": "&quot;M\u00e9todo construtor que define as mensagens padr\u00f5es&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_set", "name": "Sol\\Core\\Validator::set", "doc": "&quot;Define o dado que ser\u00e1 validado&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_setMessage", "name": "Sol\\Core\\Validator::setMessage", "doc": "&quot;Define uma mensagem customizada&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_getMessages", "name": "Sol\\Core\\Validator::getMessages", "doc": "&quot;Traz a mensagem de erro&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_required", "name": "Sol\\Core\\Validator::is_required", "doc": "&quot;Verify if the current data is not null&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_min_length", "name": "Sol\\Core\\Validator::min_length", "doc": "&quot;Verify if the length of current value is less than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_max_length", "name": "Sol\\Core\\Validator::max_length", "doc": "&quot;Verify if the length of current value is more than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_between_length", "name": "Sol\\Core\\Validator::between_length", "doc": "&quot;Verify if the length current value is between than the parameters&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_min_value", "name": "Sol\\Core\\Validator::min_value", "doc": "&quot;Verify if the current value is less than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_max_value", "name": "Sol\\Core\\Validator::max_value", "doc": "&quot;Verify if the current value is more than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_between_values", "name": "Sol\\Core\\Validator::between_values", "doc": "&quot;Verify if the length of current value is more than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_email", "name": "Sol\\Core\\Validator::is_email", "doc": "&quot;Verify if the current data is a valid email&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_url", "name": "Sol\\Core\\Validator::is_url", "doc": "&quot;Verify if the current data is a valid URL&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_slug", "name": "Sol\\Core\\Validator::is_slug", "doc": "&quot;Verify if the current data is a slug&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_num", "name": "Sol\\Core\\Validator::is_num", "doc": "&quot;Verify if the current data is a numeric value&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_integer", "name": "Sol\\Core\\Validator::is_integer", "doc": "&quot;Verify if the current data is a integer value&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_float", "name": "Sol\\Core\\Validator::is_float", "doc": "&quot;Verify if the current data is a float value&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_string", "name": "Sol\\Core\\Validator::is_string", "doc": "&quot;Verify if the current data is a string value&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_boolean", "name": "Sol\\Core\\Validator::is_boolean", "doc": "&quot;Verify if the current data is a boolean value&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_obj", "name": "Sol\\Core\\Validator::is_obj", "doc": "&quot;Verify if the current data is a object&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_instance_of", "name": "Sol\\Core\\Validator::is_instance_of", "doc": "&quot;Verify if the current data is a instance of the determinate class&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_arr", "name": "Sol\\Core\\Validator::is_arr", "doc": "&quot;Verify if the current data is a array&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_directory", "name": "Sol\\Core\\Validator::is_directory", "doc": "&quot;Verify if the current parameter it is a directory&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_equals", "name": "Sol\\Core\\Validator::is_equals", "doc": "&quot;Verify if the current data is equals than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_not_equals", "name": "Sol\\Core\\Validator::is_not_equals", "doc": "&quot;Verify if the current data is not equals than the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_cpf", "name": "Sol\\Core\\Validator::is_cpf", "doc": "&quot;Verify if the current data is a valid CPF&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_cnpj", "name": "Sol\\Core\\Validator::is_cnpj", "doc": "&quot;Verify if the current data is a valid CNPJ&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_contains", "name": "Sol\\Core\\Validator::contains", "doc": "&quot;Verify if the current data contains in the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_not_contains", "name": "Sol\\Core\\Validator::not_contains", "doc": "&quot;Verify if the current data not contains in the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_lowercase", "name": "Sol\\Core\\Validator::is_lowercase", "doc": "&quot;Verify if the current data is loweracase&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_uppercase", "name": "Sol\\Core\\Validator::is_uppercase", "doc": "&quot;Verify if the current data is uppercase&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_multiple", "name": "Sol\\Core\\Validator::is_multiple", "doc": "&quot;Verify if the current data is multiple of the parameter&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_positive", "name": "Sol\\Core\\Validator::is_positive", "doc": "&quot;Verify if the current data is a positive number&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_negative", "name": "Sol\\Core\\Validator::is_negative", "doc": "&quot;Verify if the current data is a negative number&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_date", "name": "Sol\\Core\\Validator::is_date", "doc": "&quot;Verify if the current data is a valid Date&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_alpha", "name": "Sol\\Core\\Validator::is_alpha", "doc": "&quot;Verify if the current data contains just alpha caracters&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_alpha_num", "name": "Sol\\Core\\Validator::is_alpha_num", "doc": "&quot;Verify if the current data contains just alpha-numerics caracters&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_no_whitespaces", "name": "Sol\\Core\\Validator::no_whitespaces", "doc": "&quot;Verify if the current data no contains white spaces&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_phone", "name": "Sol\\Core\\Validator::is_phone", "doc": "&quot;Verify if the current data is a valid Phone Number (8 or 9 digits)&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_plate", "name": "Sol\\Core\\Validator::is_plate", "doc": "&quot;Verify if the current data is a valid License Plate (Brazil)&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_ip", "name": "Sol\\Core\\Validator::is_ip", "doc": "&quot;Verify if the current data is a valid IP&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_is_zipCode", "name": "Sol\\Core\\Validator::is_zipCode", "doc": "&quot;Verify if the current data is a valid Zip Code (Brazil)&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_validate", "name": "Sol\\Core\\Validator::validate", "doc": "&quot;Validate the data&quot;"},
                    {"type": "Method", "fromName": "Sol\\Core\\Validator", "fromLink": "Sol/Core/Validator.html", "link": "Sol/Core/Validator.html#method_geterrors", "name": "Sol\\Core\\Validator::geterrors", "doc": "&quot;The messages of invalid data&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


