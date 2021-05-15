<?php

class Reference extends Db_object {

    protected static $db_table = "clients";
    protected $db_table_fields = array("id", "name","phone", "target","date");

    public $id;
    public $name;
    public $phone;
    public $target;
    public $date ="CURRENT_TIMESTAMP";



    public static function delete_all()
    {
        global $database;

        $sql = "delete from ".static::$db_table;

        return $database->query($sql);

    }

}







?>
