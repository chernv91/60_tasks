<?php

function makeCensored(string $sentence, array $stop_words): string
{
    $sequence = '$#%!';
    $words = explode(' ', $sentence);

    foreach ($stop_words as $stop_word) {

        foreach ($words as &$word) {

            if ($word === $stop_word) {
                $word = $sequence;
            }

        }

        unset($word);

    }

    $sentence = implode(' ', $words);
    return $sentence;
}

$sentence = 'When you play the game of thrones, you win or you die';
echo makeCensored($sentence, ['die', 'play']) . '<br>';
// => When you $#%! the game of thrones, you win or you $#%!

$sentence2 = 'chicken chicken? chicken! chicken';
echo makeCensored($sentence2, ['?', 'chicken']);
// => '$#%! chicken? chicken! $#%!';