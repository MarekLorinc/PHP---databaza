<?php
require_once(__DIR__ . '/../db/config.php');

class QnA {
    private $pdo;

    //Konstruktor triedy
    //Pripoji sa na databazu aby sa z nej mohlo pisat aleno do nej zapisovat
    public function __construct() {
        $db = DATABASE;

        $dsn = "mysql:host={$db['HOST']};port={$db['PORT']};dbname={$db['DBNAME']};charset=utf8";
        $this->pdo = new PDO($dsn, $db['USER_NAME'], $db['PASSWORD']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //Metoda nacitajOtazky: nacita vsetky otazky a odpovede z tabulky `qna` z databazy 'sablona'
    public function nacitajOtazky() {
        $stmt = $this->pdo->query("SELECT question, answer FROM qna");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Metoda na vkladanie
    /*
    public function pridajOtazku($question, $answer) {
        $stmt = $this->pdo->prepare("INSERT INTO qna (question, answer) VALUES (?, ?)");
        $stmt->execute([$question, $answer]);
    }
    */
}