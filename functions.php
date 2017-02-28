<?php

    function getBooksById($pdo, $id) {
        $sql = "SELECT * FROM `books` WHERE id = :id LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result =  $stmt->fetch();
        if(empty($result)) {
        return array();
        }
        return $result;
    }

    function searchAuthor($pdo, $keyword) {
        $sql="SELECT * FROM `books` WHERE `author` LIKE :keyword";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':keyword','%'.$keyword.'%');
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)) {
            return array();
        }
        return $result;
    }

    function searchName($pdo, $keyword) {
        $sql="SELECT * FROM `books` WHERE `name` LIKE :keyword";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':keyword','%'.$keyword.'%');
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)) {
            return array();
        }
        return $result;
    }

    function getBooks($pdo, $keyword) {
        $sql = "SELECT * FROM `books` ORDER BY " .$keyword;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)) {
            return array();
        }
        return $result;
    }

?>