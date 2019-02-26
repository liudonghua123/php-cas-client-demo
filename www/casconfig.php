<?php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';

	// #### change with your own CAS server ####
	phpCAS::setDebug();
	phpCAS::client(CAS_VERSION_2_0, 'ids.ynu.edu.cn', 80, '/authserver');
	// https://github.com/apereo/phpCAS/issues/27
	phpCAS::setServerLoginURL('http://ids.ynu.edu.cn/authserver/login');
	phpCAS::setServerServiceValidateURL('http://ids.ynu.edu.cn/authserver/serviceValidate');
	phpCAS::setServerProxyValidateURL('http://ids.ynu.edu.cn/authserver/proxyValidate');
	// phpCAS::setCasServerCACert($_SERVER["DOCUMENT_ROOT"] . '../certs/usertrust_ca.cer');
	phpCAS::setNoCasServerValidation();

	// handle logout requests directly from the CAS server
	phpCAS::handleLogoutRequests(true, array('localhost', '8080'));
?>
