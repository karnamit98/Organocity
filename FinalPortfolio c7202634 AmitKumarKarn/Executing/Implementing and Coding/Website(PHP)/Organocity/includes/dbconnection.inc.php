<?php
    class DB
    {
        private $username;
        private $password;
        private $dbname;
        public $conn;
        public function connect()
        {
            $this->username = "organocity";
            $this->password = "organocity";
            $this->dbname = "//localhost/xe";

            $conn = oci_connect($this->username, $this->password, $this->dbname);
            if(!$conn)
            {
                ?>
                <script>
                    alert("Unable to connect to the database!");
                </script>
                <?php
            }
            return $conn;
        }
    }

?>