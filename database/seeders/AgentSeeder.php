<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Agent::create([
            'nom' => 'Farah Kokobile',
            'role' => 'Co-Founder',
            'description' => "Entrepreneure visionnaire et la co-fondatrice de Dwelt, une agence immobilière nouvelle génération en République Démocratique du Congo (RDC). Animée par une passion pour l’immobilier et une volonté d’innover dans le secteur, elle a co-fondée Dwelt dans le but d’offrir des solutions personnalisées, transparentes et éthiques, adaptées aux besoins spécifiques du marché congolais.",
            'phone' => '+243 999900099',
            'email' => 'farah@dweltimmo.net',
            'image' => '', // Mets une image par défaut dans public/images
        ]);

        Agent::create([
            'nom' => 'Chrispin Ilunga',
            'role' => 'Co-Founder & Agent immobilier',
            'description' => "Chrispin Ilunga, co-fondateur de Dwelt, est un expert immobilier chevronné avec 10 ans d’expérience dans le secteur en République Démocratique du Congo. Sa carrière est marquée par des réussites dans la vente, la location, la gestion de biens immobiliers, et surtout, dans l’art de la négociation.
Reconnu pour son approche stratégique et son engagement envers la transparence, Chrispin a permis à de nombreux partenaires de conclure des affaires fructueuses. Son sérieux, sa capacité à anticiper les besoins, ainsi que son aptitude à résoudre efficacement des conflits, font de lui une figure respectée dans le domaine.
Avec un professionnalisme irréprochable et une détermination sans faille, il ne ménage aucun effort pour trouver les solutions les mieux adaptées à ses clients. Que ce soit pour un investissement ou un projet immobilier, vous pouvez compter sur lui pour atteindre vos objectifs.",
            'phone' => '+243 840 777 722 ',
            'email' => 'chrispin@dweltimmo.net',
            'image' => '',
        ]);

        Agent::create([
            'nom' => 'David Kalonji',
            'role' => 'Expert secteur immobilier',
            'description' => "Dave Kalonji est un expert immobilier confirmé, fort de 7 ans d’expérience en République Démocratique du Congo. Il se distingue par une maîtrise approfondie des domaines de la vente, de la location, du suivi immobilier, et surtout de la négociation, où son expertise fait la différence.
Grâce à son professionnalisme et à son engagement, Dave a permis à de nombreux partenaires de remporter des marchés importants, bâtissant une solide réputation d’honnêteté et d’efficacité.
Il est reconnu pour son sérieux, son talent à résoudre des conflits dans le secteur immobilier, ainsi que pour sa ponctualité et sa réactivité exemplaire. Son approche rigoureuse et sa compréhension fine du marché en font un allié de choix pour concrétiser vos projets immobiliers.
Quelle que soit la propriété ou l’opportunité que vous recherchez, Dave Kalonji ne s’arrêtera pas tant qu’il ne l’aura pas trouvée pour vous.",
            'phone' => '+243 820263200 ',
            'email' => 'david@dweltimmo.net',
            'image' => '',
        ]);
    }
}
