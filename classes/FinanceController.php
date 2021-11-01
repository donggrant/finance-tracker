<?php

class FinanceController {

    private $db;
    
    private $url = "/finance-tracker";
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function run($command) {
        
        switch($command) {
            case "transaction_history":
                $this->transaction_history();
                break;
            case "new_transaction":
                $this->new_transaction();
                break;
            case "transaction_history": 
                $this->transaction_history(); 
                break;
            case "logout":
                $this->destroySession(); 
            case "login":
            default:
                $this->login();
                break;
        }
            
    }
    
    private function destroySession() {          
        session_destroy();

        session_start();
    }
    
    
    public function login() {
        // our login code from index.php last time!
        $error_msg = "";
        if (isset($_POST["email"])) { /// validate the email coming in
            $data = $this->db->query("select * from hw5_user where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for hw5_user";
            } else if (!empty($data)) { 
                // user was found!
                // validate the user's password
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    $_SESSION["name"] = $data[0]["name"];
                    $_SESSION["email"] = $data[0]["email"];
                    $_SESSION["id"] = $data[0]["id"];
                    header("Location: {$this->url}/transaction_history/");
                    return;
                } else {
                    $error_msg = "Invalid Password";
                }
            } else {
                $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $insert = $this->db->query("insert into hw5_user (name, email, password) values (?, ?, ?);", "sss", $_POST["name"], $_POST["email"], $hash);
                if ($insert === false) {
                    $error_msg = "Error creating new user";
                } 

                $data = $this->db->query("select id from hw5_user where email = ?;", "s", $_POST["email"]);
                
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["id"] = $data[0]["id"];
                header("Location: {$this->url}/transaction_history/");
                return;
            }
        }
        include "templates/login.php";
    }

    public function transaction_history() {
        /* No session
        if(!isset($_SESSION["user_id"])) {
            header("Location: {$this->url}/login.php");
        }
        */ 

        $data = $this->db->query("SELECT SUM(amount) AS balance FROM hw5_transaction WHERE user_id = ?", "i", $_SESSION["id"]);   
        $balance = 0;
        if(!empty($data[0]["balance"])) $balance = $data[0]["balance"]; 
        $data = $this->db->query("SELECT * FROM hw5_transaction WHERE user_id = ? ORDER BY t_date DESC;", "i", $_SESSION["id"]);
        $transaction_history = $data; 
        
        include "templates/transaction_history.php";
    }
    
    
    public function new_transaction() {
        if(isset($_POST["name"])){
            if($_POST["type"] == "debit"){
                $insert = $this->db->query("insert into hw5_transaction (user_id, name, t_date, amount) values (?, ?, ?, ?);", "isss", $_SESSION["id"], $_POST["name"], $_POST["date"], -1*$_POST["amount"]);
            } else {
                $insert = $this->db->query("insert into hw5_transaction (user_id, name, t_date, amount) values (?, ?, ?, ?);", "isss", $_SESSION["id"], $_POST["name"], $_POST["date"], $_POST["amount"]);
            }
            header("Location: {$this->url}/transaction_history/");
            return;
        }


        include("templates/new_transaction.php");
    }
}