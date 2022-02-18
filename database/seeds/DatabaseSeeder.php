<?php

use Illuminate\Database\Seeder;
use App\Destination;
use App\Assoblog;
use App\Assolien;
use App\Assoimage;
use App\Assocours;
use App\Admin;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $fred=new Admin();
        $fred->uid="wagner228u";
        $fred->save();
        $ayoub=new Admin();
        $ayoub->uid="echchama1u";
        $ayoub->save();        
        for($j=0;$j<4;$j++){
            $faker = Faker\Factory::create();
            $destination=new Destination();
            $nom=$faker->city;
            $destination->nom=$nom;
            $destination->pays=$faker->country;
            $destination->continent=$faker->countryCode();
            $destination->intro=$faker->text;
            $destination->temoignages=$faker->text;
            $destination->astucesinfos=$faker->text;
            $destination->save();
            for($i=0;$i<3;$i++){
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="intro";
                $assoimage->url=$faker->imageUrl();
                $assoimage->save();
            }
            for($i=0;$i<3;$i++){
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="temoignages";
                $assoimage->url=$faker->imageUrl();
                $assoimage->save();
            }
            for($i=0;$i<3;$i++){
                $assoblog=new Assoblog();
                $assoblog->nomdestination=$nom;
                $assoblog->nom=$faker->text(10);
                $assoblog->lien=$faker->url;
                $assoblog->save();
            }
            for($i=0;$i<3;$i++){
                $assolien=new Assolien();
                $assolien->nomdestination=$nom;
                $assolien->nom=$faker->text(10);
                $assolien->lien=$faker->url;
                $assolien->save();
            }
            for($i=0;$i<3;$i++){
                $assocours=new Assocours();
                $assocours->nomdestination=$nom;
                $assocours->code=$faker->text(10);
                $assocours->titre=$faker->text(10);
                $assocours->semestre=$faker->numberBetween(7,10);
                $assocours->ects=$faker->numberBetween(1,10);
                $assocours->nombre=$faker->numberBetween(5,100);
                $assocours->contenu=$faker->text(50);
                $assocours->save();
            }
        }
    }
}
