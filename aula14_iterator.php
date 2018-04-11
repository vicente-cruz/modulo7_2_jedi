<?php
/**
 * Ex: Biblioteca de Livros por Injeção de Dependência
 */

class Book
{
    private $title;
    private $author;
    
    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}

// A Classe do iterator
class BookList
{
    private $books;
    private $currentIndex;
    
    public function __construct()
    {
        $this->currentIndex = 0;
    }
    
    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }
    
    public function count()
    {
        return count($this->books);
    }
    
    public function removeBook(Book $book)
    {
        foreach ($this->books as $key => $value) {
            if (($value->getTitle().$value->getAuthor()) == ($book->getTitle().$book->getAuthor())) {
                unset($this->books[$key]);
            }
        }
        
        $this->books = array_values($this->books);
    }
    
    // Metodos do Iterator propriamente dito
    public function current()
    {
        return $this->books[$this->currentIndex];
    }
    
    public function next()
    {
        $this->currentIndex++;
    }
    
    public function key()
    {
        return $this->currentIndex;
    }
    
    public function reset()
    {
        $this->currentIndex = 0;
    }
    
    public function valid()
    {
        if (isset($this->books[$this->currentIndex])) {
            return true;
        } else {
            return false;
        }
    }
}

$book1 = new Book("Livro Teste1", "Fulano1");
$book2 = new Book("Livro Teste2", "Fulano2");
$book3 = new Book("Livro Teste3", "Fulano3");
$book4 = new Book("Livro Teste4", "Fulano4");
$book5 = new Book("Livro Teste5", "Fulano5");

$bookList = new BookList();
$bookList->addBook($book1);
$bookList->addBook($book2);
$bookList->addBook($book3);
$bookList->addBook($book4);
$bookList->addBook($book5);

//echo "Total: ".$bookList->count();
//echo "<hr/>";
//
//$bookList->removeBook($book2);
//echo "Total: ".$bookList->count();

// Usando o Iterator!
//$livro1 = $bookList->current();
//echo "Livro 1: ".$livro1->getTitle()." - ".$livro1->getAuthor()."<br/>";
//$bookList->next();
//
//$livro2 = $bookList->current();
//echo "Livro 2: ".$livro2->getTitle()." - ".$livro2->getAuthor()."<br/>";
//
//$bookList->reset();
//
//$livro3 = $bookList->current();
//echo "Livro 3: ".$livro3->getTitle()." - ".$livro3->getAuthor()."<br/>";

while ($bookList->valid()) {
    $livro = $bookList->current();
    echo "Titulo: ".$livro->getTitle()." - ".$livro->getAuthor()."<br/>";
    
    $bookList->next();
}
?>