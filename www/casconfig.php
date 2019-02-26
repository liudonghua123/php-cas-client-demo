<?php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';

	// #### change with your own CAS server ####
	phpCAS::setDebug();
	phpCAS::client(CAS_VERSION_3_0, 'ids.ynu.edu.cn', 80, '/authserver');
	// https://github.com/apereo/phpCAS/issues/27
	phpCAS::setServerLoginURL('http://ids.ynu.edu.cn/authserver/login?service=http://localhost:8080/index.php');
	phpCAS::setServerServiceValidateURL('http://ids.ynu.edu.cn/authserver/serviceValidate');
	phpCAS::setServerProxyValidateURL('http://ids.ynu.edu.cn/authserver/p3/proxyValidate');
	// phpCAS::setCasServerCACert($_SERVER["DOCUMENT_ROOT"] . '../certs/usertrust_ca.cer');
	phpCAS::setNoCasServerValidation();

	// handle logout requests directly from the CAS server
	phpCAS::handleLogoutRequests(true, array('localhost', '8080'));
?>
