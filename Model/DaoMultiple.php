<?php

class DaoMultiple {

    public function transMultiple($stmt, $parameters, $connection) {

        for ($i = 0; $i < count($stmt); $i ++) {
            $comand = $connection->prepare($stmt[$i]);
            if ($parameters != null) {
                foreach ($parameters[$i] as $key => $value) {
                    $comand->bindValue($key, $value);
                }
            }
            //var_dump($comand);
            //var_dump($parameters[$i]);
            $comand->execute();
        }
    }
}
