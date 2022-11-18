<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category -> category = 'ՈՒՀՁ';
        $category -> save();

        $category = new Category();
        $category -> category = 'Դպրոցի կառավարում';
        $category -> save();

        $category = new Category();
        $category -> category = 'Աշխատանքային իրավունք';
        $category -> save();

        $category = new Category();
        $category -> category = 'Կամավոր ատեստավորում';
        $category -> save();

        for($k = 0; $k < 1; $k++){
            $sub_count = 1;
            for($j = 0; $j < $sub_count; $j++){
                $subject = new Subject();
                $subject -> name = $k.Str::random(20);
                $subject -> category_id = $k + 1;
                $subject -> save();
                for($i = 0; $i < 200; $i++){
                    $question = new Question();
                    $question -> title = 'Question '. Str::replace('q', ' ',Str::replace('k', ' ', Str::random(50)));;
                    $question -> rate = rand(0,10);
                    $question -> subject_id  = $subject->id;
                    $question -> image  = 'test.png';
                    $question -> level_id = rand(1,3);
                    $question -> fails = rand(0,1000);
                    $question -> success = rand(0,1000);
                    $type = rand(1,3);
                    $question -> type_id = $type;
                    $question -> save();
                    $this->addAnswers($type,$question->id);

                }
            }
        }
    }

    public function addAnswers($type,$question_id){
        switch($type){
            case 1:
                $ans_count = rand(1,3);
                $this->createAnswer($question_id,true);
                $this->createAnswer($question_id,false);
                for($j = 0;$j < $ans_count; $j++){
                    $this->createAnswer($question_id);
                }
                break;
            case 2:
                $ans_count = rand(5,8);
                for($j = 0;$j < $ans_count; $j++){
                    $this->createAnswer($question_id);
                }
                break;
            case 3:
                $ans_count = rand(4,6);
                for($j = 0;$j < $ans_count; $j++){
                    $this->createAnswer($question_id, true,$j + 1);
                }
                break;
        }

    }

    public function createAnswer($question_id,$right = 'not_set',$order = null){
        if($right === 'not_set'){
            $right = rand(0,1) === 0;
        }
        $answer = new Answer();
        $answer -> question_id = $question_id;
        $answer -> right = $right;
        $answer -> title = 'r['.$right.']'.'o['.$order.']'.Str::replace('q', ' ', Str::replace('k', ' ', Str::random(60,100)));
        $answer -> order = $order;
        $answer -> save();
    }
}
