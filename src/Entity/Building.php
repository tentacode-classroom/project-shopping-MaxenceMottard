<?php

namespace App\Entity;

class Building {
    private $id;
    private $name;
    private $picture;
    private $price;

    public function __construct( int $id, string $name, string $picture, int $price ) {
        self::setId( $id );
        self::setName( $name );
        self::setPicture( $picture );
        self::setPrice( $price );
    }

    public function setId ( int $id ) {
        $this->id = $id;
    }
    public function getId (): int {
        return $this->id;
    }

    public function setName ( string $name ) {
        $this->name = $name;
    }
    public function getName (): string {
        return $this->name;
    }

    public function setPicture ( string $picture ) {
        $this->picture = $picture;
    }
    public function getPicture (): string {
        return $this->picture;
    }

    public function setPrice ( int $price ) {
        $this->price = $price;
    }
    public function getPrice (): int {
        return $this->price;
    }
}