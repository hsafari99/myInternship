<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            ['Do you have any special skills or hobbies?', 'As-tu des passe-temps ou des talents particuliers ?'],
            ['Have you ever been interviewed by another model or contact agency?', 'As-tu déjà eu des interviews avec d­\'autres agences de talents ou de mannequinat ?'],
            ['Do you have any previous modelling or acting experience (pro or amateur)?', 'As-tu de l\'expérience en mannequinat ou en tant qu\'acteur/actrice (pro ou amateur) ?'],
            ['Where do you come from?', 'D\'où proviens-tu ?'],
            ['What are your favourite sports or activities?', 'Quels sont tes sports ou activités préférés ?'],
            ['What is the best piece of advice someone ever gave you?', 'Quel est le meilleur conseil que quelqu\'un t\'a donné ?'],
            ['10 years from now, you hope to...?', 'D\'ici 10 ans, tu souhaiterais... ?'],
            ['When no one is around I tend to...?', 'Lorsque je suis seul, j\'ai tendance à... ?'],
            ['What are some of your secret hidden talents?' , 'Quels seraient certains de tes talents cachés ?'],
            ['If you could buy any one thing right now, what would it be?', 'Si tu pouvais t\'acheter n\'importe quelle chose à l\'instant, qu\'est-ce que ce serait ?'],
            ['Which photographer would you like to shoot with?', 'Avec quel(le) photographe rêves-tu de travailler ?'],
            ['What is the last picture you took with your phone?', 'Quelle est la dernière photo que tu as prise avec ton téléphone ?'],
            ['What is your secret to look like a model?', 'Quel est ton secret pour ressembler à un mannequin ?'],
            ['What is the beauty product you can\'t live without?', 'Quel est le produit de beauté dont tu ne peux pas te passer ?'],
            ['What are 3 words that best describe your style?', 'Quels sont 3 mots qui décrivent bien ton style ?'],
            ['What features do you get most compliments on?', 'Sur quelles caractéristiques les gens te donnent le plus de compliments ?'],
            ['Who is your style icon?', 'Qui est ton idole de style?'],
            ['Do you have any tattoos?', 'As-tu des tattoos ?'],
            ['Do you have any piercings?', 'As-tu des piercings ?'],
            ['Are you a vegetarian?', 'Es-tu végétarien(ne) ?'],
            ['Notes on myself', 'Notes sur moi-même']
        ];

        foreach ($questions as $question) {
            $_question = new App\Models\Question;
            $_question->en = $question[0];
            $_question->fr = $question[1];
            $_question->save();
        }
    }
}
