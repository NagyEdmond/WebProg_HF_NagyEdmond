<?php


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

?>