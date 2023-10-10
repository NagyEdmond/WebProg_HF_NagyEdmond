<?php


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

?>