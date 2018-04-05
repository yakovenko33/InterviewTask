<?php
    if(!empty($_POST)) {
        $zip = new ZipArchive;
        $res = $zip->open('Install.zip');
        $dir = dirname(__FILE__);

        if ($res === TRUE) {
            $zip->extractTo($dir);
            $zip->close();
//            unlink($dir.'/Install.zip'); // удалит архиватор

            $dsn = "mysql:host={$_POST['host']};dbname={$_POST['db']};charset=utf8";

            try {
                $pdo = new PDO($dsn, $_POST['user'], $_POST['pass']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                switch ((int)$e->getCode()) {
                    case 2002:
                        echo "Не верный Host.";
                        break;
                    case 1049:
                        echo "Не верно указаная база данных";
                        break;
                    case 1045:
                        echo "Нет доступа";
                        break;
                }
//                echo 'Подключение не удалось: ' . $e->getCode();
            }

            $config = "[database]".PHP_EOL;
            $host = "host = ".$_POST['host'].PHP_EOL;
            $db = "db = ".$_POST['db'].PHP_EOL;
            $user = "user = ".$_POST['user'].PHP_EOL;
            $pass = "pass = ".$_POST['pass'].PHP_EOL;
            $charset = "charset = utf8".PHP_EOL;

            file_put_contents($dir."/config/config.ini",$config.$host.$db.$user.$pass.$charset);

        } else {
            echo 'Не удалось установить!';
        }
    }
?>


<form action="index.php" method="post">
    <p>Ваш host: <input type="text" name="host" /></p>
    <p>Имя базы данных: <input type="text" name="db" /></p>
    <p>User: <input type="text" name="user" /></p>
    <p>Password: <input type="text" name="pass" /></p>
    <p><input type="submit" /></p>
</form>
