<?php
class DBUser {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Inserts a new user into the user table.
     * @param  string $email    the user's email address.
     * @param  string $password the user's password.
     * @return boolean          true, if the insert was successfull, false
     *                                otherwise.
     */
    function registerUser($email, $password) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $pass);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function authUser($email, $password) {
        $stmt = $this->conn->prepare("SELECT password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
            die;
        }

        return false;
    }
}
?>
