<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionLevel;
use App\Models\QuestionType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question_type = new QuestionType();
        $question_type -> type = 'Ընտրել Ճիշտ պատասխան(ը/երը)';
        $question_type -> save();

        $question_type = new QuestionType();
        $question_type -> type = 'Առանձնացնել ճիշտը սխալից';
        $question_type -> save();

        $question_type = new QuestionType();
        $question_type -> type = 'Դասավորել ըստ հերթականության';
        $question_type -> save();

        $question_level = new QuestionLevel();
        $question_level -> level = 'Հեշտ';
        $question_level -> save();

        $question_level = new QuestionLevel();
        $question_level -> level = 'Միջին';
        $question_level -> save();

        $question_level = new QuestionLevel();
        $question_level -> level = 'Բարդ';
        $question_level -> save();

    }




}
