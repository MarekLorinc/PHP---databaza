<?php
require_once(__DIR__ . '/../db/config.php');
require_once(__DIR__ . '/Database.php');

class QnA extends Database {

    //Konstruktor triedy
    //Pripoji sa na databazu aby sa z nej mohlo pisat aleno do nej zapisovat
    public function __construct() {
        parent::__construct(); // zavolá konštruktor z Database
    }


    //Metoda nacitajOtazky: nacita vsetky otazky a odpovede z tabulky `qna` z databazy 'sablona'
    public function nacitajOtazky() {
        try {
            $stmt = $this->getConnection()->query("SELECT question, answer FROM qna");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Chyba pri načítavaní otázok: " . $e->getMessage());
        }
    }

    //Metoda na vkladanie
    /*
    public function pridajOtazku($question, $answer) {
        $stmt = $this->pdo->prepare("INSERT INTO qna (question, answer) VALUES (?, ?)");
        $stmt->execute([$question, $answer]);
    }
    */
}