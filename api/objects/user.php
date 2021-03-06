<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
    private $table_name2 = "users2";
 
    // object properties
    public $id;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $parola;
    public $rol;
    public $year;
    public $semian;
    public $grup;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                parola = :parola,
                username = :username,
                rol = :rol,
                year = :year,
                semian = :semian,
                grup = :grup
                ";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->parola=htmlspecialchars(strip_tags($this->parola));
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->rol=htmlspecialchars(strip_tags($this->rol));
    $this->year=htmlspecialchars(strip_tags($this->year));
    $this->semian=htmlspecialchars(strip_tags($this->semian));
    $this->grup=htmlspecialchars(strip_tags($this->grup));
    
    // bind the values
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':rol', $this->rol);
    $stmt->bindParam(':year', $this->year);
    $stmt->bindParam(':semian', $this->semian);
    $stmt->bindParam(':grup', $this->grup);
 
    // hash the password before saving to database
    $password_hash = password_hash($this->parola, PASSWORD_BCRYPT);
    $stmt->bindParam(':parola', $password_hash);
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 













function create2(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name2 . "
            SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                parola = :parola";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->parola=htmlspecialchars(strip_tags($this->parola));
 
    // bind the values
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
 
    // hash the password before saving to database
    $password_hash = password_hash($this->parola, PASSWORD_BCRYPT);
    $stmt->bindParam(':parola', $password_hash);
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
















// check if given email exist in the database
function emailExists(){
 
    // query to check if email exists
    $query = "SELECT id, firstname, lastname, password
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind given email value
    $stmt->bindParam(1, $this->email);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->password = $row['password'];
 
        // return true because email exists in the database
        return true;
    }
 
    // return false if email does not exist in the database
    return false;
}
 
// update a user record
public function update(){
 
    // if password needs to be updated
    $password_set=!empty($this->password) ? ", password = :password" : "";
 
    // if no posted password, do not update the password
    $query = "UPDATE " . $this->table_name . "
            SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email
                {$password_set}
            WHERE id = :id";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind the values from the form
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
 
    // hash the password before saving to database
    if(!empty($this->password)){
        $this->password=htmlspecialchars(strip_tags($this->password));
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
    }
 
    // unique ID of record to be edited
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
}
?>