<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\AbstractFont;
use Intervention\Image\Facades\Image;

class QuoteController extends Controller
{
    /**
     * Quote string length
     */
    protected const STRING_LENGTH = 65;

    /**
     * Copyright symbol regular expression pattern
     */
    protected const COPYRIGHT_PATTERN = '/(©|\([cCсС]\))/u';

    public function __invoke(Request $request)
    {
        if ($text = $request->get('text', false)) {
            $text = static::chunk($text);
            $type = $request->get('type', 'png');

            $width = 1920;
            $height = 1080;
            $fontSize = $height / 13;

            $image = Image::canvas($width, $height, '#000000');

            $a = [
                '#808080' => [
                    $width * .1,
                    $height / 2,
                ],
                '#ffffff' => [
                    $width * .1 - 3,
                    $height / 2 - 3,
                ],
            ];

            foreach ($a as $color => [$x, $y]) {
                $image->text($text, $x, $y, static function (AbstractFont $font) use ($fontSize, $color) {
                    $font->file(resource_path('fonts/BosaNova.ttf'));
                    $font->size($fontSize);
                    $font->color($color);
                    $font->align('left');
                    $font->valign('center');
                });
            }

            return $image->response($type);
        }

        $quotes = [
            'Я не просто старая а еще и алкаш и бомж © Маргарита Моногарова',
            'Там хоть кормят? © Руслан Самигуллин',
            'Хороший релиз! И доработки интересные! © Артур Ахатов',
            'Ты разбила нам коллектив © Игорь Финагин',
        ];

        $placeholder = $quotes[array_rand($quotes)];

        return view('quote', ['placeholder' => $placeholder]);
    }

    protected static function chunk(string $text)
    {
        $words = explode(' ', $text);
        $length = static::STRING_LENGTH;
        $rows = [''];
        $row = 0;

        foreach ($words as $word) {
            $word = preg_replace(static::COPYRIGHT_PATTERN, '©', $word, -1, $count);

            if ($count === 0 && strlen($rows[$row].' '.$word) <= $length) {
                $rows[$row] .= ' '.$word;
            } else {
                $row++;
                $rows[$row] = $word;
            }
        }

        return trim(implode("\n", $rows));
    }
}
