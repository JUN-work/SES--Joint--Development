<?php

use Illuminate\Database\Seeder;

class css_questions_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'question' => '不透明度', // 問題文
            'answer' => 'opacity',  // 解答
            'explanation' => '',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/function_list/', //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

    //ここから「ここまで」とコメントアウトしてある部分までをコピペして、各項目の記述を変えてデータを作っていきます。
        $param = [  
            'id' => '2',
            'question' => 'フォントの種類', // 問題文
            'answer' => 'font-family',  // 解答
            'explanation' => '配列の最後に 1 つまたは複数の要素を追加する。',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/font-family/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);
    //ここまで

        $param = [
            'id' => '3',
            'question' => 'フォントの種類', // 問題文
            'answer' => 'font-family',  // 解答
            'explanation' => '配列の最後に 1 つまたは複数の要素を追加する。',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/font-family/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '4',
            'question' => 'フォントの斜体', // 問題文
            'answer' => 'font-style',  // 解答
            'explanation' => '使用するフォントの斜体を指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/font-style/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '5',
            'question' => 'フォントの太さ', // 問題文
            'answer' => 'font-weight',  // 解答
            'explanation' => 'フォント太さを指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/font-weight/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '6',
            'question' => 'フォントの太さ', // 問題文
            'answer' => 'font-weight',  // 解答
            'explanation' => 'フォント太さを指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/font-weight/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '7',
            'question' => '行の高さ', // 問題文
            'answer' => 'line-height',  // 解答
            'explanation' => '1行の高さを指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/line-height/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '8',
            'question' => '横(水平)方向の文字位置', // 問題文
            'answer' => 'text-align',  // 解答
            'explanation' => '文字の横(水平)方向の位置を指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/text-align/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '9',
            'question' => '横(水平)方向の文字位置', // 問題文
            'answer' => 'text-align',  // 解答
            'explanation' => '文字の横(水平)方向の位置を指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/text-align/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);

        $param = [  
            'id' => '10',
            'question' => '文字の装飾線の種類', // 問題文
            'answer' => 'text-decoration-style',  // 解答
            'explanation' => '文字の装飾線の種類を指定することができる',  // 解説
            'url' => 'https://web-designer.cman.jp/css_ref/abc_list/text-decoration/',  //詳細リンク
    ];
    DB::table('css_questions')->insert($param);
    
    }
}
