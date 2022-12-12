<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAM = [
        ['name' => 'Le Roi Lion',
        'synopsis' => 'Un lionceau nommé Simba est exilé de son royaume après avoir été accusé d\'être responsable de la mort de son père, Mufasa. Avec l\'aide d\'un étrange duo composé d\'un suricate et d\'un phacochère, il décide de reprendre ce qui lui revient de droit lorsqu\'il apprend qu\'il est destiné à être roi',
        'category' => 'category_Disney',
        'poster' => 'Unknown.jpeg',  
        ],
        ['name' => 'Blanche-Neige',
        'synopsis' => 'La petite princesse Blanche-Neige, poursuivie par la jalousie de la méchante reine, se réfugie chez les nains de la forêt.',
        'category' => 'category_Disney',
        'poster' => 'Unknown-1.jpeg',
        ],
        ['name' => 'Cendrillon',
        'synopsis' => 'Cendrillon, une douce jeune fille, subit les méchancetés de sa belle-mère et de ses deux horribles filles.',
        'category' => 'category_Disney',
        'poster' => 'Unknown-2.jpeg',
        ],
        ['name' => 'La princesse et la grenouille',
        'synopsis' => 'À La Nouvelle-Orléans, dans les années 1920, le prince Naveen de Maldonia est transformé en grenouille par le docteur Facilier, un terrifiant sorcier vaudou. Afin de retrouver sa forme humaine à l\'aide d\'un baiser, Naveen décide de trouver une princesse et tombe sur Tiana, qui est en fait une jeune serveuse.',
        'category' => 'category_Disney',
        'poster' => 'Unknown-3.jpeg',
        ],
        ['name' => 'Raiponce',
        'synopsis' => 'Lorsque Flynn Rider, le bandit le plus recherché du royaume, se réfugie dans une mystérieuse tour, il se retrouve pris en otage par Raiponce, une belle et téméraire jeune fille à l\'impressionnante chevelure de 20 mètres de long, gardée prisonnière par Mère Gothel. ',
        'category' => 'category_Disney',
        'poster' => 'download.jpg',
        ],
        ['name' => 'Walking Dead',
        'synopsis' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.',
        'category' => 'category_Thriller',
        'poster' => 'Unknown-5.jpeg', 
        ],
        ['name' => 'Men in Black',
        'synopsis' => 'Chargés de protéger la Terre de toute infraction extraterrestre et de réguler l\'immigration intergalactique sur notre planète, les Men in black ou MIB opèrent dans le plus grand secret. Vêtus de costumes sombres et équipés des toutes dernières technologies, ils passent inaperçus aux yeux des humains dont ils effacent régulièrement la mémoire récente.',
        'category' => 'category_Action',
        'poster' => 'Unknown-6.jpeg',  
        ],
        ['name' => 'The Man from Toronto',
        'synopsis' => 'eddy Jackson, connu pour ses ratages, notamment une entreprise de boxe sans contact, a prévu la parfaite surprise d\'anniversaire. Pendant que Lori se fait dorloter dans un spa, il va préparer la maison isolée qu\'il a louée. Teddy se trompe sur le numéro de la maison et tombe par inadvertance sur une paire de voyous qui interrogent un homme. Pris pour l\'assassin, L\'homme de Toronto, Teddy joue le jeu, amenant l\'homme à révéler un code, juste avant que le FBI ne fasse irruption sur les lieux.',
        'category' => 'category_Comédies',
        'poster' => 'Unknown-7.jpeg',  
        ],
        ['name' => 'Scream',
        'synopsis' => 'Casey Becker, une belle adolescente, est seule dans la maison familiale. Elle s\'apprête à regarder un film d\'horreur, mais le téléphone sonne. Au bout du fil, un tueur en série la malmène, et la force à jouer à un jeu terrible: si elle répond mal à ses questions portant sur les films d\'horreur, celui-ci tuera son copain.',
        'category' => 'category_Horreur',
        'poster' => 'Unknown-8.jpeg',  
        ],

    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $programName){
            $program = new Program();
            $program->setTitle($programName['name']);
            $program->setSynopsis( $programName['synopsis']);
            $program->setCategory($this->getReference($programName['category']));
            $program->setPoster($programName ['poster']);
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

