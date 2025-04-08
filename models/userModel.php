<?php

class UserModel extends Model implements IModel{
    private $id;
    private $username;
    private $password;
    private $role;
    private $budget;
    private $potho;
    private $name;


    public function __construct(){
        parent::__construct();
        $this->username = '';
        $this->password = '';
        $this->role = '';
        $this->budget = 0.0;
        $this->potho = '';
        $this->name = '';
        
    }


    public function save(){
        try {

            $query = $this->prepare('INSERT INTO users(username, password, role, budget, potho, name) VALUES(:username, :password, :role, :budget, :potho, :name)');
            $query->execute([
                'username' => $this->username,
                'password' => $this->password,
                'role' => $this->role,
                'budget' => $this->budget,
                'potho' => $this->potho,
                'name' => $this->name
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::getSave: ' . $e);
            return false;
        }
    }

    public function getAll(){
        $items = [];
        try {
            $query = $this->query("SELECT * FROM users");
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password']);
                $item->setRole($p['role']);
                $item->setBudget($p['budget']);
                $item->setPotho($p['potho']);
                $item->setName($p['name']);

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('USERMODEL::getAll: ' . $e);
            return false;
        }
    }

    public function get($id){
        try {
            $query = $this->prepare("SELECT * FROM users WHERE id = :id");
            $query->execute(['id' => $id]);
            
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if($user){
/*                 $this->setId($user['id']);
                $this->setUsername($user['username']);
                $this->setPassword($user['password']);
                $this->setRole($user['role']);
                $this->setBudget($user['budget']);
                $this->setPotho($user['potho']);
                $this->setName($user['name']); */

                $userModel = new UserModel();
                $userModel->setId($user['id']);
                $userModel->setUsername($user['username']);
                $userModel->setPassword($user['password']);
                $userModel->setRole($user['role']);
                $userModel->setBudget($user['budget']);
                $userModel->setPotho($user['potho']);
                $userModel->setName($user['name']);
    
                return $userModel;
            }
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id){
        try {
            $query = $this->prepare("DELETE FROM users WHERE id = :id");
            $query->execute(['id' => $id]);
            return true;
        }catch (PDOException $e) {
            return false;
        }
    } 
    
    public function update(){
        try {
            $query = $this->prepare("UPDATE users SET username = :username, password = :password, role = :role, budget = :budget, potho = :potho, name = :name WHERE id = :id");
            $query->execute([
                'username'  => $this->username,
                'password'  => $this->password,
                'role'      => $this->role,
                'budget'    => $this->budget,
                'potho'     => $this->potho,
                'name'      => $this->name,
                'id'        => $this->id
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function from($array){
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->role = $array['role'];
        $this->budget = $array['budget'];
        $this->potho = $array['potho'];
        $this->name = $array['name'];
    }

    //existe USERNAME
    public function exists($username){
        try {
            $query = $this->prepare("SELECT username FROM users WHERE username = :username");
            $query->execute(['username' => $username]);
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }   

    //comparar password
    public function comparePassword($password,$id){
        try{
            $user = $this->get($id);
            return password_verify($password, $user->getPassword());
        }catch (PDOException $e) {
            return false;
        }

    }


    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getBudget(){
        return $this->budget;
    }
    public function getPotho(){
        return $this->potho;
    }
    public function getName(){
        return $this->name;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        // Encriptar la contraseña
        $this->password = $this->getHashedPassword($password);

    }	
    public function setRole($role){
        $this->role = $role;
    }	
    public function setBudget($budget){
        $this->budget = $budget;
    }	
    public	function setPotho($potho){
        $this->potho = $potho;
    }
    public function setName($name){
        $this->name = $name;
    }

    private function getHashedPassword($password){
        // Encriptar la contraseña
        return password_hash($password, PASSWORD_DEFAULT,['cost'=> 10]);        
    }

}

?>