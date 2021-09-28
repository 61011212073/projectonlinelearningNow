<?php
    require 'DbConnect.php';

    if(isset($_POST['aid'])) {
        $db = new DbConnect;
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM faculty WHERE preName_id = " . $_POST['aid']);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($books);
    }

?>