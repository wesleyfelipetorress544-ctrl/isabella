<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'description' => 'Bento Santiago, já mais velho e conhecido como Dom Casmurro, decide reconstruir a própria história. Ao relembrar a juventude, o seminário e seu relacionamento com Capitu, ele mistura lembranças e suspeitas. O romance convida o leitor a questionar a versão do narrador e a refletir sobre ciúme, memória e confiança.',
            ],
            [
                'title' => 'Capitães da Areia',
                'author' => 'Jorge Amado',
                'description' => 'Em Salvador, um grupo de meninos que vive em um velho trapiche enfrenta a pobreza e a falta de proteção. Pedro Bala, Professor, Sem-Pernas e os demais formam uma comunidade própria, com conflitos, sonhos e fortes laços de amizade. Jorge Amado acompanha suas histórias e mostra as desigualdades que marcam a cidade.',
            ],
            [
                'title' => 'A Hora da Estrela',
                'author' => 'Clarice Lispector',
                'description' => 'Macabéa deixa Alagoas e vai morar no Rio de Janeiro, onde trabalha como datilógrafa e leva uma vida simples e solitária. Sua história é contada por Rodrigo S. M., um narrador que também questiona o próprio papel ao falar de alguém tão invisibilizado. Clarice Lispector cria um retrato sensível sobre pobreza, identidade e o desejo de ser percebido.',
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                ['title' => $book['title']],
                ['author' => $book['author'], 'description' => $book['description']],
            );
        }
    }
}