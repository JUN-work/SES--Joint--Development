const SF_JavaScript_data = [
    {
        'id': 1,
        'question':'配列の要素の数を取得するプロパティ', // 問題文
        'answer':'length', // 解答
        'explanation': '配列の最後のインデックスに +1 した値を返す。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index6.html', //詳細リンク
    },
    {
        'id': 2,
        'question':'配列の最後に要素を追加', // 問題文
        'answer':'push', // 解答
        'explanation': '配列の最後に1つまたは複数の要素を追加する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index4.html#section2', //詳細リンク
    },
    {
        'id': 3,
        'question':'配列の先頭に要素を追加', // 問題文
        'answer':'unshift', // 解答
        'explanation': '配列の先頭に1つまたは複数の要素を追加する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index4.html#section3', //詳細リンク
    },
    {
        'id': 4,
        'question':'配列の最後の要素を削除', // 問題文
        'answer':'pop', // 解答
        'explanation': '配列の最後の要素を削除する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index8.html#section1', //詳細リンク
    },
    {
        'id': 5,
        'question':'配列の最初の要素を削除', // 問題文
        'answer':'shift', // 解答
        'explanation': '配列の先頭の要素を削除する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index8.html#section2', //詳細リンク
    },
    {
        'id': 6,
        'question':'配列の要素を別の要素に置き換える', // 問題文
        'answer':'splice', // 解答
        'explanation': '配列の指定した範囲の要素を別の要素に置き換えることができる。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index9.html', //詳細リンク
    },
    {
        'id': 7,
        'question':'配列の要素を順に取得', // 問題文
        'answer':'forEach', // 解答
        'explanation': '配列に含まれる要素を順に取り出し、記述したコールバック関数渡して処理する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index10.html', //詳細リンク
    },
    {
        'id': 8,
        'question':'配列と配列を結合', // 問題文
        'answer':'concat', // 解答
        'explanation': '配列に対して別の配列を結合した新しい配列を取得する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index11.html', //詳細リンク
    },
    {
        'id': 9,
        'question':'指定の値と一致する配列の要素を検索', // 問題文
        'answer':'indexOf', // 解答
        'explanation': '指定した値を持つ要素を配列の先頭から検索する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index12.html', //詳細リンク
    },
    {
        'id': 10,
        'question':'指定の値と一致する配列の要素を配列の先頭から検索', // 問題文
        'answer':'indexOf', // 解答
        'explanation': '指定した値を持つ要素を配列の先頭から検索する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index12.html', //詳細リンク
    },
    {
        'id': 11,
        'question':'指定の値と一致する配列の要素を配列の最後から検索', // 問題文
        'answer':'lastIndexOf', // 解答
        'explanation': '指定した値を持つ要素を配列の最後から検索する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index12.html', //詳細リンク
    },
    {
        'id': 12,
        'question':'条件に一致するインデックスを取得', // 問題文
        'answer':'findIndex', // 解答
        'explanation': '引数に指定したコールバック関数の中で定義した条件式を満たす要素のインデックスを配列の先頭から検索する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index13.html#section1', //詳細リンク
    },
    {
        'id': 12,
        'question':'条件に一致する要素の値を取得', // 問題文
        'answer':'find', // 解答
        'explanation': '引数に指定したコールバック関数の中で定義した条件式を満たす要素の値を配列の先頭から検索する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index13.html#section2', //詳細リンク
    },
    {
        'id': 13,
        'question':'少なくとも一つの要素が条件に一致するかどうか', // 問題文
        'answer':'some', // 解答
        'explanation': '引数に指定したコールバック関数の中で定義した条件式を満たす要素が配列の中に一つでもあるかどうかを調べる。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index13.html#section3', //詳細リンク
    },
    {
        'id': 14,
        'question':'すべての要素が条件に位置するかどうか', // 問題文
        'answer':'every', // 解答
        'explanation': '引数に指定したコールバック関数の中で定義した条件式を配列のすべての要素が満たすかどうかを調べる。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index13.html#section4', //詳細リンク
    },
    {
        'id': 15,
        'question':'配列の指定した範囲の要素をコピーして新しい配列を作成', // 問題文
        'answer':'slice', // 解答
        'explanation': '引数に指定した範囲の要素を持つ新しい配列を作成できる。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index14.html', //詳細リンク
    },
    {
        'id': 16,
        'question':'要素を連結して作成した文字列を取得', // 問題文
        'answer':'join', // 解答
        'explanation': '要素を連結して作成した文字列を取得できる。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index15.html#section1', //詳細リンク
    },
    {
        'id': 17,
        'question':'配列を文字列に変換', // 問題文
        'answer':'toString', // 解答
        'explanation': '要素に配列が格納されていた場合などに、配列を文字列に変換するときに使用される。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index15.html#section2', //詳細リンク
    },
    {
        'id': 18,
        'question':'要素を逆順に並び替える', // 問題文
        'answer':'reverse', // 解答
        'explanation': '配列の要素を逆順に並び替える。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index16.html#section1', //詳細リンク
    },
    {
        'id': 19,
        'question':'要素を文字列の並び順で並び替える', // 問題文
        'answer':'sort', // 解答
        'explanation': '配列の要素を文字列の並び順または指定した並び順で並び替える。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index16.html#section2', //詳細リンク
    },
    {
        'id': 20,
        'question':'配列のすべての要素に順番に同じ処理を行う', // 問題文
        'answer':'map', // 解答
        'explanation': '配列に含まれる要素に対して順番にコールバック関数を呼び出し処理を行うことができる。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index17.html', //詳細リンク
    },
    {
        'id': 21,
        'question':'条件を満たす要素から新しい配列を作成', // 問題文
        'answer':'filter', // 解答
        'explanation': '配列に含まれる要素に対して条件を満たす要素だけを集めた新しい配列を作成する。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index18.html', //詳細リンク
    },
    {
        'id': 22,
        'question':'要素の値を合計する', // 問題文
        'answer':'reduce', // 解答
        'explanation': '配列に含まれるすべての要素の値を合計し、その合計値を返す。', // 解説
        'url':'https://www.javadrive.jp/javascript/array/index19.html', //詳細リンク
    },
    {
        'id': 23,
        'question':'対象のオブジェクトのコンストラクタ関数への参照を取得', // 問題文
        'answer':'constructor', // 解答
        'explanation': 'constructorプロパティを参照することで対象のオブジェクトのコンストラクタ関数への参照を取得できる。', // 解説
        'url':'https://www.javadrive.jp/javascript/object_class/index2.html', //詳細リンク
    },
    {
        'id': 24,
        'question':'対象のBooleanクラスのオブジェクトの基本データ型の値を返す', // 問題文
        'answer':'valueOf', // 解答
        'explanation': 'Booleanクラスのオブジェクトが表す基本データ型の値を返す。Booleanクラスのオブジェクトに対してvalueOfメソッドを呼び出した場合は論理値を返す。', // 解説
        'url':'https://www.javadrive.jp/javascript/boolean_class/index3.html', //詳細リンク
    },
    {
        'id': 25,
        'question':'日付部分のみ取り出す', // 問題文
        'answer':'toDateString', // 解答
        'explanation': '対象のDateクラスのオブジェクトの文字列に変換した結果の中で日付部分を返す。', // 解説
        'url':'https://www.javadrive.jp/javascript/date_class/index2.html', //詳細リンク
    },
    {
        'id': 26,
        'question':'時刻部分のみ取り出す', // 問題文
        'answer':'toTimeString', // 解答
        'explanation': '対象のDateクラスのオブジェクトの文字列に変換した結果の中で時刻部分を返す。', // 解説
        'url':'https://www.javadrive.jp/javascript/date_class/index2.html', //詳細リンク
    },
    {
        'id': 27,
        'question':'ロケールに応じた形式で文字列に変換を行った結果を返す', // 問題文
        'answer':'toLocaleString', // 解答
        'explanation': '対象のDateクラスのオブジェクトを文字列に変換した結果を返す。この時、現在のロケールに応じた形式で変換を行った結果を返す。', // 解説
        'url':'https://www.javadrive.jp/javascript/date_class/index3.html', //詳細リンク
    },
    {
        'id': 28,
        'question':'四捨五入を計算しその結果を返す関数', // 問題文
        'answer':'round', // 解答
        'explanation': 'round関数は四捨五入を計算しその結果を返す。小数点以下の値が0.5未満であれば切り捨て、0.5以上なら切り上げる。', // 解説
        'url':'https://www.javadrive.jp/javascript/math_class/index3.html', //詳細リンク
    },
    {
        'id': 29,
        'question':'一定時間後に特定の処理を1度だけ行う', // 問題文
        'answer':'setTimeout', // 解答
        'explanation': '一定時間後に特定の処理を1度だけ行うタイマー処理。処理は繰り返さない。', // 解説
        'url':'https://techacademy.jp/magazine/5541', //詳細リンク
    },
    {
        'id': 30,
        'question':'指定したタイマー処理を解除', // 問題文
        'answer':'clearTimeout', // 解答
        'explanation': '指定したタイマー処理を解除する。', // 解説
        'url':'https://www.scollabo.com/banban/jsindex/sample/sample_035.html', //詳細リンク
    },
    {
        'id': 31,
        'question':'一定時間ごとに特定の処理を繰り返す', // 問題文
        'answer':'setInterval', // 解答
        'explanation': '一定時間ごとに特定の処理を繰り返すタイマー処理。', // 解説
        'url':'https://techacademy.jp/magazine/5537', //詳細リンク
    },
    {
        'id': 32,
        'question':'指定した繰り返し動作をするタイマー処理を解除', // 問題文
        'answer':'clearInterval', // 解答
        'explanation': 'setInterval を使用して設定された繰り返し動作をキャンセルする。', // 解説
        'url':'https://developer.mozilla.org/ja/docs/Web/API/WindowTimers/clearInterval', //詳細リンク
    },
    {
        'id': 33,
        'question':'確認ダイアログボックスを表示', // 問題文
        'answer':'confirm', // 解答
        'explanation': '確認ダイアログを表示させる時によく使うメソッド。', // 解説
        'url':'https://techacademy.jp/magazine/5487', //詳細リンク
    },
    {
        'id': 34,
        'question':'確認ダイアログボックスを表示', // 問題文
        'answer':'confirm', // 解答
        'explanation': '確認ダイアログを表示させる時によく使うメソッド。', // 解説
        'url':'https://techacademy.jp/magazine/5487', //詳細リンク
    },
]