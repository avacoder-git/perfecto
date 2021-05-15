<?php

class Db_object{



    public static function find_all()
    {

        return static::find_by_query("select * from " . static::$db_table);
    }


    public static function find_by_id($id)
    {

        $the_result_array =  static::find_by_query("select * from " . static::$db_table ." where id=$id");

        return !empty($the_result_array) ? array_shift($the_result_array): false;
    }




    public static function find_by_query($sql){

        global $database;


        $result = $database->query($sql);
        $object_array = array();

        while ($row = mysqli_fetch_array($result))
        {
            $object_array[] = static::instantiation($row);

        }

        return $object_array;
    }


    public static function instantiation($record)
    {

        $object_name = get_called_class();
        $new_object = new $object_name;

        foreach ($record as $attribute => $value)
        {
            if ($new_object->has_attribute($attribute))
            {
                $new_object->$attribute = $value;
            }
        }

        return $new_object;
    }

    private function has_attribute($attribute)
    {
        $object_vars = get_object_vars($this);

        return array_key_exists($attribute, $object_vars);
    }



    public function properties()
    {
        $properties = array();

        foreach ($this->db_table_fields as $db_field )
        {

            if (property_exists($this,$db_field))
            {
                $properties[$db_field] = $this->$db_field;
            }

        }
        return $properties;


    }

    private function clean_properties()
    {
        global $database;
        $clean_properties = array();

        foreach ($this->properties() as $key => $value)
        {
            $clean_properties[$key] = $database->escape_string($value);

        }

        return $clean_properties;

    }

    public function create()
    {

        global $database;

        $sql = "insert into ".static::$db_table."( ". implode(", ", array_keys($this->clean_properties()));
        $sql .= ") values('". implode("', '", array_values($this->clean_properties()))."')";

        return $database->query($sql);

    }

    public function save()
    {

        return empty($this->id)? $this->create(): $this->update();

    }

    public function update()
    {

        global $database;
        $property_pairs = array();

        foreach ($this->clean_properties() as $key => $value)
        {
            $property_pairs[] = "{$key}='{$value}'";

        }

        $sql = "update ".static::$db_table.' set ';
        $sql .= implode(", ", $property_pairs);
        $sql .= " where id={$this->id} limit 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true: false;

    }

    public function delete()
    {
        global $database;

        $sql = "delete from ".static::$db_table." where id={$this->id}";
        $database->query($sql);


        return (mysqli_affected_rows($database->connection) ==1) ?true:false;

    }

    public function delete_photo()
    {
        if ($this->delete())
        {
            $path = $this->picture_path();

            return unlink($path)? true: false;
        }
    }

    public static function count_all()
    {

        global $database;

        $sql = "select count(*) from ".static::$db_table;

        $result = $database->query($sql);

        $row  = mysqli_fetch_array($result);

        return !empty($row)? array_shift($row): false;

    }

    public static function absent()
    {
        if(static::count_all()==0)
        {
            echo "<div class='text-center alert  bg-warning'>Hozircha hech nima yo'q </div>";

        }
    }




}






?>
