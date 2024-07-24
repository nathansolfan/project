<?php

class Model {
    protected $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }
}

// Purpose: This is a basic rulebook for all models. It helps them connect to the database.
// Create connection to mysql with $this->db
// Other classes like User can extend this model