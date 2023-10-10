<?php
require_once "AbstractLibrary.php";
require_once "Book.php";
require_once "Author.php";

class Library extends AbstractLibrary
{

    private $authors = [];
    // TODO Implement all the methods declared in AbstractLibrary class
    public function addBookForAuthor($authorName, Book $book)
    {
        $this->authors[$authorName]->addBook($book->getTitle(), $book->getPrice());
    }

    public function getBooksForAuthor($authorName){
        return $this->authors[$authorName]->getBooks();
    }

    public function print(){
        foreach($this->authors as $author){
            echo $author->getName() . "<br>";
            echo "----------------------<br>";
            foreach($author->getBooks() as $book){
                echo $book->getTitle() . " - " . $book->getPrice() . "<br>";
            }
            echo "<br>";
        }
    }

    public function addAuthor(string $authorName): Author{
        $this->authors[$authorName] = new Author($authorName);
        return $this->authors[$authorName];
    }

    public function search($bookName):Book{
        foreach($this->authors as $author){
            foreach($author->getBooks() as $book){
                if($book->getTitle() == $bookName){
                    return $book;
                }
            }
        }
    }


    
}

?>