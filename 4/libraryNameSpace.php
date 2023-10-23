<?php

namespace AbstractLibrary{
    use Author\Author;
    use Book\Book;
        /**
     * Class AbstractLibrary
     */
    abstract class AbstractLibrary
    {
        /**
         * @var Author[]
         */
        private $authors = [];

        // TODO Generate getters and setters of properties

        /**
         * Method accepts the name of the author, creates instance of the Author class,
         * adds the instance in $authors array and returns created instance
         *
         * @param string $authorName
         * @return Author
         */
        abstract public function addAuthor(string $authorName): Author;

        /**
         * Method accepts author name and Book. Finds author in $authors array and adds book to this array.
         * The method must set $book's $author property with the found author also.
         * This method is equivalent of Author::addBook
         *
         * @param      $authorName
         * @param Book $book
         */
        abstract public function addBookForAuthor($authorName, Book $book);

        /**
         * Method returns books for given author
         *
         * @param $authorName
         */
        abstract public function getBooksForAuthor($authorName);

        /**
         * Method searches for book and returns instance of Book
         *
         * @param string $bookName
         * @return Book
         */
        abstract public function search(string $bookName): Book;

        /**
         * This method must print every author and for each author all its books in the following format
         * AuthorName
         * ----------------------
         * BookName - price
         * Book2Name - price
         * ...
         *
         * AnotherAuthorName
         * ----------------------
         * AnotherBookName - price
         * ...
         */
        abstract public function print();
    }

}

namespace Book{
    use Author\Author;
    class Book
{
    public string $title;
    public float $price;
    public Author $author;

    public function __construct(string $title, float $price, Author $author=null) {
        $this->title = $title;
        $this->price = $price;
        if($author != null){
            $this->author = $author;
        }
    }

    public function getAuthor(): Author {
        return $this->author;
    }

    public function setAuthor(Author $author): void {
        $this->author = $author;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }
    // TODO Generate getters and setters of properties
    // TODO Generate constructor for all attributes. $author argument of the constructor can be optional
}

}

namespace Author{
    use Book\Book;
    class Author
{
    public string $name;
    public $books = [];

    // TODO Generate getters and setters of properties
    // TODO Generate constructor for all attributes. $books argument of the constructor can be optional

    public function __construct(string $name, array $books = []) {
        $this->name = $name;
        $this->books = $books;
        
    }
    
    public function getName(){
        return $this -> name;
    }

    /**
     * @param string $title
     * @param float  $price
     * @return \Book
     */
    public function addBook(string $title, float $price): void{
        $book = new Book($title, $price, $this);
        array_push($this->books, $book);
        // TODO Create instance of the book. Add into $books array and return it
    }

    public function getBooks(){
        return $this->books;
    }
}

}

namespace Library{
    use AbstractLibrary\AbstractLibrary;
    use Book\Book;
    use Author\Author;
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

}

namespace Index{
    use Library\Library;
    use Book\Book;

$library = new Library();
$author = $library->addAuthor('Jack London');
$author->addBook("Martin Eden", 55);
$author->addBook("The Game", 35);
$library->addBookForAuthor('Jack London', new Book("A Son of the Sun", 25));

$author2 = $library->addAuthor('Mark Twain');
$author2->addBook('The Adventures of Tom Sawyer', 65);
$author2->addBook('Luck', 12);

// $book = $library->search('Martin Eden'); // This must return instance of the book
// $author = $book->getAuthor(); // This must return instance of the Author class
// echo $author->getName(); // This must print "Jack London"

$library->print();
/*
Jack London
--------------------
Martin Eden - 55
The Game - 35
A Son of the Sun - 25

Mark Twain
--------------------
The Adventures of Tom Sawyer - 65
Luck - 12
*/

}