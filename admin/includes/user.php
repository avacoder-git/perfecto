<?php



class User extends Db_object {


    protected static $db_table = "users";
    public $db_table_fields = array("id","username", "password", "status");

    public $id;
    public $username;
    public $password;
    public $status;


    public function status()
    {

        global $database;

        $sql = "select * from ".static::$db_table." inner join status on status.id=users.status where users.id={$this->id} limit 1";

        $user = mysqli_fetch_array($database->query($sql));


        return $user['name'];

    }

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "select * from users where username='{$username}' and password='{$password}' limit 1";

        $result = static::find_by_query($sql);

        return !empty($result)? array_shift($result):false;

    }



}










?>