<?php 

class User {
  private $name;
  public $email;
  public $password;

  public function __construct($name, $email, $password) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }


  function getName() {
    return $this->name;
  }

  function setName($name) {
    $this->name = $name;
  }

  function login() {
    return "User $this->name is logged in.";
  }

  function __destruct() {
    echo "The user name is {$this->name}.";
  }
}

$user1 = new User('Brad', 'brad@gmail.com', '123456');
$user1->setName('John');
echo $user1->getName();
echo $user1->login();



var_dump($user1);
// echo $user1->name;

class employee extends User {
  public $title;
  public function __construct($name, $email, $password, $title) {
    parent::__construct($name, $email, $password);
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
}

$employee1 = new employee('John','johndoe@gmail.com','123456','Manager');
echo $employee1->getTitle();