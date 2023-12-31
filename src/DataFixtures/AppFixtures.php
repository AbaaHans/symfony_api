<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        #creation des author
        $authorList = [];
        for ($i=0; $i <10; $i++) { 
            $author = new Author();
            $author->setFirstName("Prénom : " . $i);
            $author->setLastName("Nom : " . $i);
            $manager->persist($author);
            $authorList[] = $author;
        }

        for ($i=0; $i <20; $i++) { 
            $book = new Book();
            $book->setTitle("Titre : " . $i);
            $book->setCoverText("Quatrième de couverture  numéro " . $i);
            $book->setCls("sous titre " . $i);
            $book->setAuthor($authorList[array_rand($authorList)]);
            $manager->persist($book);
        }

        $manager->flush();
    }
}
