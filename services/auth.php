<?php
include './services/db.php';

class Auth {
  public $type;
  public $data;
  public $result;
  private $db;
  public $status;
  public $msg;

  function __construct($name, $POST = array()) {
    $this->type = $name;
    $this->data = $POST;
    $this->db = new DB();
    return "fds";
  }
  
  function do(){
    switch ($this->type) {
      case 'REGISTER': return $this->register();
        break;
      case 'LOGIN': return $this->login();
        break;
      case 'LOGOUT': $this->logout();
        break;
      default: return die("Something went wrong!");
        break;
    }
  }

  private function login() {
    $response = $this->validate();
    $data = $response['data'];
    if($response['isValid']){
      $hashed = md5($data["password"]);
      $query = "SELECT * from `users` where
                `email` = '{$data["email"]}' AND 
                `password` = '{$hashed}'";
      $resObject  = $this->db->run($query);
      if($resObject->num_rows == 1){
        $this->setSession();
        $this->status = true;
      }else{
        $this->msg = "Invalid Credential";
        $this->status = false;
      }
    }else{
      return false;
    }
  }
  
  private function register() {
    $response = $this->validate();
    $data = $response['data'];
    if($response['isValid']){
      $hashed = md5($data["password"]);
      $query = "INSERT INTO `users` 
                (`name`, `email`, `password`, `active`) 
                VALUES 
                ('{$data["name"]}', '{$data["email"]}', '{$hashed}', 0)";

      $resObject  = $this->db->run($query);
      if($resObject === TRUE){
        $this->setSession();
        $this->db->status = true;
      }else{
        $this->msg = "User Already Exist";
        $this->status = false;
      }
        
    }else{
      return false;
    }
  }

  private function logout() {
    $this->resetSession();
    return true;
  }

  private function resetSession(){
    $_SESSION["isLoggedIn"] = NULL;
    $_SESSION["uid"] = NULL;
  }

  private function setSession(){
    $_SESSION["isLoggedIn"] = true;
    $_SESSION["uid"] = 1;
  }

  private function validate(){
    $data =  array(
        'email' => $this->getProperty('email'),
        'password' => $this->getProperty('password'),
    );
    
    if($this->type == "REGISTER"){
      $data['name'] = $this->getProperty('name');
    }
    return array('data' => $data, 'isValid' => true);
  }

  private function getProperty($name){
    if(isset($this->data[$name])){
      return $this->data[$name];
    }else{
      return NULL;
    }
  }
}
