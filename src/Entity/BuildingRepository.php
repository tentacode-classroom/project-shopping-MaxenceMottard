<?php

namespace App\Entity;
use App\Entity\Building;


class BuildingRepository
{
    private $buildings;
    
    public function __construct( array $buildingsArray) {
        foreach ( $buildingsArray as $key => $item ) {
            $building = new Building( (int) $key, $item->name, $item->picture, (int) $item->price );
            $this->buildings[] = $building;
        }
    }

    public function findAll (): array {
        return $this->buildings;
    }

    public function findOneById ( $id ): Building {
        foreach ( $this->buildings as $building ){
            if ( $building->getId() === $id ) {
                return $building;
            }
        }

        return null;
    }
}