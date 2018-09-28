<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Building as BuildingEntity;

class Persist extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new BuildingEntity();
        $product->setName('Big Ben');
        $product->setPrice( 39900 );
        $product->setPicture( 'https://images.unsplash.com/photo-1481014472607-f71254019973?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3ef224b7a523caa5d3d836eba7fb884a&auto=format&fit=crop&w=668&q=80' );
        $product->setCountry( 'England' );
        $product->setCity( 'Londres' );

        $manager->persist($product);

        $manager->flush();
    }
}
