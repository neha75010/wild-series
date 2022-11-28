<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAM = [
        'Le Roi Lion',
        'Blanche-Neige',
        'Cendrillon',
        'La princesse et la grenouille',
        'Raiponce',
        
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $programName){
            $program = new Program();
            $program->setTitle($programName);
            $program->setSynopsis('Des zombies envahissent la terre');
            $program->setCategory($this->getReference('category_Disney'));
            $manager->persist($program);
            $manager->flush(); 
        }
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }


}

