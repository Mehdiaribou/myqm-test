<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Auto;
use App\Entity\AutoBrand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($K = 1; $K <= mt_rand(2, 8); $K++) {
            $brand = new AutoBrand();

            $brand->setName($faker->sentence())
                ->setDescription($faker->paragraph(5));
                

            $manager->persist($brand);
       
          for ($i = 1; $i <= 30; $i++) {
            $auto = new Auto();

            $name           = $faker->sentence();
            $version        = $faker->sentence();
            $motorisation   = $faker->sentence(). mt_rand(16,32);
            $airbags        = $faker->boolean();
            $performance    = $faker->paragraph(3);
            $details        = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';
            $couleurs       = $faker->safeColorName();
            $photos = "https://picsum.photos/1200/350?random=" . mt_rand(1, 55000);

            
            $auto->setName($name)
                ->setVersion($version)
                ->setMotorisation($motorisation)
                ->setAirbags($airbags)
                ->setPerformance($performance)
                ->setDetails($details)
                ->setCouleurs($couleurs)
                ->setPhotos($photos)
                ->setPrix(mt_rand(120000, 2000000))
                ->setMarqueauto($brand);
 

        $manager->persist($auto);

    }
}
    $manager->flush();


}

}