echo off
cls
SET Path=%Path%;C:\wamp\bin\php\php5.2.8
set PHP_COMMAND="C:\wamp\bin\php\php5.2.8\php.exe"
cd /d "C:\wamp\www\rdv"
cd "C:\wamp\www\rdv1"
rem echo %PHP_COMMAND% 
echo %OS%

rem -- timezone --  'Africa/Douala'
rem    -- au besoin apporter les modif suivantes au fichier php.ini
rem        C:\wamp\bin\php\php5.2.8\php.ini
rem        -- ini en ligne de commande ms-dos
rem        C:\wamp\bin\php\php5.2.8\php.ini
rem        -- ini dans apache ( necessite un redemarrage de apache pour prise en compte de nouveau parametre ini)
rem        F:\achilleromuald\programs\EasyPHP-5.3.5.0\apache\php.ini
rem
rem        ;include_path = ".:/php/includes"
rem        ;(facultatif) include_path = ".;D:\achilleromuald\projects\TARLAB\TARLAB_FRMK\PEAR\httpdocs_pearcore_php5_x\PEAR"
rem        ; --
rem        ; Directory in which the loadable extensions (modules) reside.
rem        ; extension_dir = "./"
rem        ; extension_dir = "C:\wamp\bin\php\php5.2.8\ext\"
rem        extension_dir = "C:\wamp\bin\php\php5.2.8\ext\"
rem        ; --
rem        extension=php_mbstring.dll
rem        extension=php_mysql.dll
rem        ;(facultatif) extension=php_pdo.dll
rem        extension=php_pdo_mysql.dll
rem        extension=php_pdo_odbc.dll
rem        extension=php_xsl.dll
rem        ; -- A PHP accelerator
rem        extension=php_apc.dll
rem