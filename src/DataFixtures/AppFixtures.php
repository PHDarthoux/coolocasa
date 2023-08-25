<?php

namespace App\DataFixtures;

use App\Entity\LodgingType;
use App\Entity\User;
use App\Factory\GenderFactory;
use App\Factory\LodgingTypeFactory;
use App\Factory\MediaFactory;
use App\Factory\MessageFactory;
use App\Factory\OfferFactory;
use App\Factory\RentalSearchFactory;
use App\Factory\ReviewFactory;
use App\Factory\RoommateOfferFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userAdmin = new User();
        $adminBirthday = new \DateTime('1986-11-16');

        // génération des Genders
        for ($i = 1; $i < 4; ++$i) {
            $gender = GenderFactory::createOne(['type' => $i]);
        }

        // génération des LodgingTypes
        for ($i = 1; $i < 8; ++$i) {
            $lodgingType = LodgingTypeFactory::createOne(['type' => $i]);
        }

        // Création d'un admin
        // $userAdmin->setFirstname('Pierre-Henri');
        // $userAdmin->setName('Darthoux');
        // $userAdmin->setBirthday('1986-11-16');
        $userAdmin = UserFactory::createOne([
            'firstname' => 'Pierre-Henri',
            'name' => 'Darthoux',
            'birthday' => $adminBirthday,
            'email' => 'coolocasa@mailinator.com',
            'isVerified' => true,
            'password' => 123456,
            'phone' => '01 02 03 04 05',
            'roles' => ['ROLE_ADMIN'],
            'gender' => GenderFactory::first(),
        ]);

        // Création des Users
        $users = UserFactory::createMany(
            5,
            function () {
                return [
                    'gender' => GenderFactory::random(),
                    'media' => MediaFactory::new(),
                ];
            }
        );

        // Création des Reviews
        $reviews = ReviewFactory::createMany(50);

        // Création des Messages
        $messages = MessageFactory::createMany(50);

        // Création des RoommateOffers
        // $roommateOffers =  RoommateOfferFactory::createMany(20);

        // Création des Offers liées à RoommateOffers
        $offers = OfferFactory::createMany(10,
            function () {
                return [
                    'media' => MediaFactory::new(),
                    'roommateOffer' => RoommateOfferFactory::new(),
                ];
            }
        );

        // Création des RentalSearches
        // $rentalSearches = RentalSearchFactory::createMany(20,
        //     function(){
        //         $aa = [];
        //         for ($i=0; $i < 10 ; $i++) {
        //             $aa[] = LodgingTypeFactory::random();
        //         }
        //         // dump($aa);
        //         return ['lodgingType' => $aa];
        //     }
        // );

        // Création des Offers liées à RentalSearches
        $offers = OfferFactory::createMany(10,
            function () {
                return [
                    'media' => MediaFactory::new(),
                    'rentalSearch' => RentalSearchFactory::new(function () {
                        $aa = [];
                        for ($i = 0; $i < 10; ++$i) {
                            $aa[] = LodgingTypeFactory::random();
                        }

                        return ['lodgingType' => $aa];
                    }),
                ];
            }
        );

        // Création des Medias
        $medias = MediaFactory::createMany(20,
            function () {
                return ['roommateOffer' => RoommateOfferFactory::random()];
            }
        );

        $manager->flush();
    }
}
