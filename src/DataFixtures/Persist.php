<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Building as BuildingEntity;

class Persist extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
         *  Country Fixtures
         */
        $us = new Country();
        $us->setName( 'Etats-Unis' );
        $us->setPicture( 'us.png' );
        $manager->persist($us);
        
        $england = new Country();
        $england->setName( 'England' );
        $england->setPicture( 'england.png' );
        $manager->persist($england);

        $malaysia = new Country();
        $malaysia->setName( 'Malaisie' );
        $malaysia->setPicture( 'malaysia.png' );
        $manager->persist($malaysia);

        $emirate = new Country();
        $emirate->setName( 'Émirats arabes unis' );
        $emirate->setPicture( 'emirate.png' );
        $manager->persist($emirate);

        
        /*
         * City Fixtures
         */
        $london = new City();
        $london->setName( 'Londres' );
        $london->setCountry( $england );
        $manager->persist( $london );
        
        $kuala = new City();
        $kuala->setName( 'Kuala Lumpur' );
        $kuala->setCountry( $malaysia );
        $manager->persist( $kuala );
        
        $boston = new City();
        $boston->setName( 'Boston' );
        $boston->setCountry( $us );
        $manager->persist( $boston );

        $chicago = new City();
        $chicago->setName( 'Chicago' );
        $chicago->setCountry( $us );
        $manager->persist( $chicago );

        $dubai = new City();
        $dubai->setName( 'Dubaï' );
        $dubai->setCountry( $emirate );
        $manager->persist( $dubai );

        $ny = new City();
        $ny->setName( 'New York' );
        $ny->setCountry( $us );
        $manager->persist( $ny );
        
        
        /*
         * Building Fixtures
         */
        $product = new BuildingEntity();
        $product->setName('Big Ben');
        $product->setPrice( 39900 );
        $product->setPicture( 'https://images.unsplash.com/photo-1481014472607-f71254019973?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3ef224b7a523caa5d3d836eba7fb884a&auto=format&fit=crop&w=668&q=80' );
        $product->setCity( $london );
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Tour Petronas');
        $product->setPrice( 57000 );
        $product->setPicture( 'https://images.unsplash.com/photo-1508062878650-88b52897f298?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cb247a4ea31fd3b82eeac324cfde4470&auto=format&fit=crop&w=582&q=80' );
        $product->setCity( $kuala );
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Building');
        $product->setPrice( 31000 );
        $product->setPicture( 'https://images.unsplash.com/photo-1488750059241-ed3ad4563245?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a6cd16ca9797c7216abc5ef14d32ec64&auto=format&fit=crop&w=668&q=80' );
        $product->setCity($boston);
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Trump Tower');
        $product->setPrice( 78000 );
        $product->setPicture( 'https://images.unsplash.com/photo-1528834352857-6058fe09174d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f25bad655f91ca3fa095e41e6625a0b5&auto=format&fit=crop&w=668&q=80' );
        $product->setCity( $chicago );
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Bulding avec un pont');
        $product->setPrice( 54500 );
        $product->setPicture( 'https://images.unsplash.com/photo-1521259524283-f6e9b4184f7a?ixlib=rb-0.3.5&s=a3dcda76bcb5dfff27928057071bea4e&auto=format&fit=crop&w=668&q=80' );
        $product->setCity( $chicago );
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Burj Khalifa');
        $product->setPrice( 89000 );
        $product->setPicture( 'https://images.unsplash.com/photo-1510665724063-f77a01074aa2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c5aaf8187426c0c9a3a85bdf92413c9d&auto=format&fit=crop&w=668&q=80' );
        $product->setCity( $dubai );
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Burj Al Arab');
        $product->setPrice( 83300 );
        $product->setPicture( 'https://images.unsplash.com/photo-1522685644486-ab3fe4c74e44?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b1a88d5434630ea557522602decabf96&auto=format&fit=crop&w=668&q=80' );
        $product->setCity( $dubai );
        $manager->persist($product);

        $product = new BuildingEntity();
        $product->setName('Flatiron Building');
        $product->setPrice( 29900 );
        $product->setPicture( 'https://images.unsplash.com/photo-1496871455396-14e56815f1f4?ixlib=rb-0.3.5&s=2460fc20c6ed6192b7b5e1b6a2d375bf&auto=format&fit=crop&w=634&q=80' );
        $product->setCity( $ny );
        $manager->persist($product);

        $manager->flush();
    }
}
