<?php

// Anna Tsupko: Please let me inform you, that php binary path should look like as follows --> /hsphere/shared/php5/bin/php-cgi

# http://saar-vie.com/tchac_test/tchac_exec_configuration.php

// http://www.defiafricain.com/tchac_test_env/website_backup/tarlab_exec_unzip.php
// exec("tar -C ./ -zxvf  SPIP_web.20110106_201804.stable.tar"); 
echo "<pre>";
echo "start<br>";
// $s_output= exec("tar -C ./output -xvf  online_credit_mng.20110109_175310.tar"); 
// echo $s_output."<br>";
// passthru ("tar -C ./output -xvf  online_credit_mng.20110109_175310.tar"); 
// passthru ("cd /hsphere/local/home/c318401/saar-vie.com/; php symfony help doctrine:build "); 
// passthru ("man perl"); 
// passthru ("man php");
// passthru ("man /hsphere/shared/php5/bin/php-cgi");

passthru ('/hsphere/shared/php5/bin/php-cgi test.php');

echo "finish<br>";
// passthru ("ls ./");
echo "<br>";
echo "</pre>";
?>

