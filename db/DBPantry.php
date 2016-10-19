<?php
class DBPantry {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function deleteFoodItem($id) {
        $stmt = $this->conn->prepare("DELETE FROM pantry WHERE id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);

        return false;
    }

    /**
     * Gets every row from the food_type table.
     * @return json | false returns a json encoded object, or false if the
     *                      table is empty.
     */
    function getAllFoodTypes() {
        $sql = "SELECT * FROM food_type";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return false;
    }

    /**
     * Gets every row from the pantry table with a given food_type id.
     * @param  string $id   food_type id
     * @return json | false returns a json encoded object, or false if the
     *                      query doesn't return a result.
     */
    function getFoodById($id) {
        $stmt = $this->conn->prepare("SELECT name, expiration_date, id FROM pantry WHERE food_type=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return false;
    }
}
?>
