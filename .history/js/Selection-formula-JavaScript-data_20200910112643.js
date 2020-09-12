const SF_css_data = [
    {
        'id': 1,
        'question':'不透明度', // 問題文
        'answer':'opacity', // 解答
        'explanation': '透明度を指定することができる(透明度を 0.0～1.0 の範囲で指定)。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/function_list/', //詳細リンク
    },
    {
        'id': 2,
        'question':'フォントの種類', // 問題文
        'answer':'font-family', // 解答
        'explanation': 'ホームページで使用するフォント種類を指定することができる(指定しないとブラウザのデフォルトフォントが使用される)。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/font-family/', //詳細リンク
    },
    {
        'id': 3,
        'question':'文字サイズの自動調節', // 問題文
        'answer':'font-size-adjust', // 解答
        'explanation': 'フォントの種類の違いによる見た目のサイズの調整をすることができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/font-size-adjust/', //詳細リンク
    },
    {
        'id': 4,
        'question':'フォントの斜体', // 問題文
        'answer':'font-style', // 解答
        'explanation': '使用するフォントの斜体を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/font-style/', //詳細リンク
    },
    {
        'id': 5,
        'question':'フォントの太さ', // 問題文
        'answer':'font-weight', // 解答
        'explanation': 'フォント太さを指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/font-weight/', //詳細リンク
    },
    {
        'id': 6,
        'question':'フォントの形状（幅広・幅狭）', // 問題文
        'answer':'font-stretch', // 解答
        'explanation': '文字を伸縮するのではなく、指定のフォントが提供するフェイスから適切なものを選択することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/font-stretch/', //詳細リンク
    },
    {
        'id': 7,
        'question':'行の高さ', // 問題文
        'answer':'line-height', // 解答
        'explanation': '1行の高さを指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/line-height/', //詳細リンク
    },
    {
        'id': 8,
        'question':'横(水平)方向の文字位置', // 問題文
        'answer':'text-align', // 解答
        'explanation': '文字の横(水平)方向の位置を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-align/', //詳細リンク
    },
    {
        'id': 9,
        'question':'縦(垂直)方向の文字位置', // 問題文
        'answer':'vertical-align', // 解答
        'explanation': '文字の縦(垂直)方向の位置を指定することができる。DIVなどのブロック要素にはそのままでは適用できない。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/vertical-align/', //詳細リンク
    },
    {
        'id': 10,
        'question':'文字の装飾線の種類', // 問題文
        'answer':'text-decoration-style', // 解答
        'explanation': '文字の装飾線の種類を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-decoration/', //詳細リンク
    },
    {
        'id': 11,
        'question':'文字の両端揃えの調節', // 問題文
        'answer':'text-justify', // 解答
        'explanation': '文字の両端揃えの調節方法を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-justify/', //詳細リンク
    },
    {
        'id': 12,
        'question':'文字の影付け', // 問題文
        'answer':'text-shadow', // 解答
        'explanation': '文字に影を付ける場合に使用します。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-shadow/', //詳細リンク
    },
    {
        'id': 13,
        'question':'基点から下端までの距離', // 問題文
        'answer':'bottom', // 解答
        'explanation': '基点から下端までの距離を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/bottom/', //詳細リンク
    },
    {
        'id': 14,
        'question':'ボックスの種類', // 問題文
        'answer':'display', // 解答
        'explanation': '要素の表示形式を(ブロックレベル要素をインラインで表示やブロックレベルで表示などに)指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/display/', //詳細リンク
    },
    {
        'id': 15,
        'question':'配置と回り込み', // 問題文
        'answer':'float', // 解答
        'explanation': '指定した要素を左または右に寄せて配置する場合に、使用します。後に続く要素は、その反対側に回り込む。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/float/', //詳細リンク
    },
    {
        'id': 16,
        'question':'高さ', // 問題文
        'answer':'height', // 解答
        'explanation': '要素の高さを指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/height/', //詳細リンク
    },
    {
        'id': 17,
        'question':'基点から左端までの距離', // 問題文
        'answer':'left', // 解答
        'explanation': '基点から左端までの距離を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/bottom/', //詳細リンク
    },
    {
        'id': 18,
        'question':'幅の最大値', // 問題文
        'answer':'max-width', // 解答
        'explanation': '要素の幅の最大値を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/max-width/', //詳細リンク
    },
    {
        'id': 19,
        'question':'幅の最小値', // 問題文
        'answer':'min-width', // 解答
        'explanation': '要素の幅の最小値を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/max-width/', //詳細リンク
    },
    {
        'id': 20,
        'question':'領域からはみ出たコンテンツの表示', // 問題文
        'answer':'overflow', // 解答
        'explanation': '領域からはみ出たコンテンツの表示方法を(横方向、縦方向の表示方法をまとめて)指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/overflow/', //詳細リンク
    },
    {
        'id': 21,
        'question':'要素の配置方法(設定値：relative など)', // 問題文
        'answer':'position', // 解答
        'explanation': '要素の配置方法のみを指定することができる。要素の配置位置は、「top」「right」「bottom」「left」にて指定できる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/position/', //詳細リンク
    },
    {
        'id': 22,
        'question':'基点から右端までの距離', // 問題文
        'answer':'right', // 解答
        'explanation': '基点から右端までの距離を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/bottom/', //詳細リンク
    },
    {
        'id': 23,
        'question':'基点から上端までの距離', // 問題文
        'answer':'top', // 解答
        'explanation': '基点から上端までの距離を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/bottom/', //詳細リンク
    },
    {
        'id': 24,
        'question':'基点から上端までの距離', // 問題文
        'answer':'top', // 解答
        'explanation': '基点から上端までの距離を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/bottom/', //詳細リンク
    },
    {
        'id': 25,
        'question':'横幅', // 問題文
        'answer':'width', // 解答
        'explanation': '要素の横幅を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/width/', //詳細リンク
    },
    {
        'id': 26,
        'question':'ボックスの重なり順', // 問題文
        'answer':'z-index', // 解答
        'explanation': '要素のボックスの重なり順を指定することができる。「position: static」を指定した場合はz-indexは有効にはならない。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/z-index/', //詳細リンク
    },
    {
        'id': 27,
        'question':'カーソルの種類', // 問題文
        'answer':'cursor', // 解答
        'explanation': 'マウスポインターが対象の要素の上に乗ったときに表示されるマウスカーソルの形状を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/cursor/', //詳細リンク
    },
    {
        'id': 28,
        'question':'表示の有無', // 問題文
        'answer':'visibility', // 解答
        'explanation': '要素を非表示にすることができる。「display:none」と似ているが、「visibility」は要素のエリアが縮まらない。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/visibility/', //詳細リンク
    },
    {
        'id': 29,
        'question':'余白(マージン)の大きさ', // 問題文
        'answer':'margin', // 解答
        'explanation': 'マージン領域の４辺（上下左右）の設定をまとめて行うことができる。マージン領域とは、要素と要素の間の余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/margin/', //詳細リンク
    },
    {
        'id': 30,
        'question':'パディングの大きさ', // 問題文
        'answer':'padding', // 解答
        'explanation': 'パディング領域の４辺（上下左右）の設定をまとめて行うことができる。 パディング領域とは、要素の内側の内容までの余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/padding/', //詳細リンク
    },
    {
        'id': 31,
        'question':'下マージン', // 問題文
        'answer':'margin-bottom', // 解答
        'explanation': '下マージンを指定することができる。 下マージンは、要素の下の余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/margin-bottom/', //詳細リンク
    },
    {
        'id': 32,
        'question':'左マージン', // 問題文
        'answer':'margin-left', // 解答
        'explanation': '左マージンを指定することができる。 左マージンは、要素の左の余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/margin-left/', //詳細リンク
    },
    {
        'id': 33,
        'question':'右マージン', // 問題文
        'answer':'margin-right', // 解答
        'explanation': '右マージンを指定することができる。 右マージンは、要素の右の余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/margin-right/', //詳細リンク
    },
    {
        'id': 34,
        'question':'上マージン', // 問題文
        'answer':'margin-top', // 解答
        'explanation': '上マージンを指定することができる。 上マージンは、要素の上の余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/margin-top/', //詳細リンク
    },
    {
        'id': 35,
        'question':'下パディング', // 問題文
        'answer':'padding-bottom', // 解答
        'explanation': '下パディングを指定することができる。 下パディングは、要素の内側の内容までの下からの余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/padding-bottom/', //詳細リンク
    },
    {
        'id': 36,
        'question':'左パディング', // 問題文
        'answer':'padding-left', // 解答
        'explanation': '左パディングを指定することができる。 左パディングは、要素の内側の内容までの左からの余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/padding-left/', //詳細リンク
    },
    {
        'id': 37,
        'question':'右パディング', // 問題文
        'answer':'padding-right', // 解答
        'explanation': '右パディングを指定することができる。 右パディングは、要素の内側の内容までの右からの余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/padding-right/', //詳細リンク
    },
    {
        'id': 38,
        'question':'上パディング', // 問題文
        'answer':'padding-top', // 解答
        'explanation': '上パディングを指定することができる。 上パディングは、要素の内側の内容までの上からの余白のこと。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/padding-top/', //詳細リンク
    },
    {
        'id': 39,
        'question':'文字の色', // 問題文
        'answer':'color', // 解答
        'explanation': '文字の色を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/color/', //詳細リンク
    },
    {
        'id': 40,
        'question':'背景の設定(背景をまとめて設定)', // 問題文
        'answer':'background', // 解答
        'explanation': '背景に関する設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/background/', //詳細リンク
    },
    {
        'id': 41,
        'question':'背景色の設定', // 問題文
        'answer':'background-color', // 解答
        'explanation': '背景色の設定を行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/background-color/', //詳細リンク
    },
    {
        'id': 42,
        'question':'背景画像の設定', // 問題文
        'answer':'background-image', // 解答
        'explanation': '背景画像の設定を行うことができる。背景画像は複数指定することも可能。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/background-image/', //詳細リンク
    },
    {
        'id': 43,
        'question':'背景画像の表示サイズ設定', // 問題文
        'answer':'background-size', // 解答
        'explanation': '背景画像の表示サイズの設定を行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/background-size/', //詳細リンク
    },
    {
        'id': 44,
        'question':'罫線の設定(罫線に関してまとめて設定)', // 問題文
        'answer':'border', // 解答
        'explanation': '罫線に関する設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border/', //詳細リンク
    },
    {
        'id': 45,
        'question':'罫線の底辺の設定', // 問題文
        'answer':'border-bottom', // 解答
        'explanation': '罫線の底辺に関する設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-bottom/', //詳細リンク
    },
    {
        'id': 46,
        'question':'罫線の色設定', // 問題文
        'answer':'border-color', // 解答
        'explanation': '罫線の色の設定を行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-color/', //詳細リンク
    },
    {
        'id': 47,
        'question':'画像を使った罫線の表示', // 問題文
        'answer':'border-image', // 解答
        'explanation': '画像を使った罫線の表示の値をまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-image/', //詳細リンク
    },
    {
        'id': 48,
        'question':'罫線の左辺の設定', // 問題文
        'answer':'border-left', // 解答
        'explanation': '罫線の左辺に関する設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-left/', //詳細リンク
    },
    {
        'id': 49,
        'question':'罫線の角丸の設定', // 問題文
        'answer':'border-radius', // 解答
        'explanation': '罫線の四隅を丸く設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-radius/', //詳細リンク
    },
    {
        'id': 50,
        'question':'罫線の右辺の設定', // 問題文
        'answer':'border-right', // 解答
        'explanation': '罫線の右辺に関する設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-right/', //詳細リンク
    },
    {
        'id': 51,
        'question':'罫線のスタイル設定', // 問題文
        'answer':'border-style', // 解答
        'explanation': '罫線のスタイルの設定を行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-style/', //詳細リンク
    },
    {
        'id': 52,
        'question':'罫線の上辺の設定', // 問題文
        'answer':'border-top', // 解答
        'explanation': '罫線の上辺に関する設定をまとめて行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-top/', //詳細リンク
    },
    {
        'id': 53,
        'question':'罫線の太さ設定', // 問題文
        'answer':'border-width', // 解答
        'explanation': '罫線の太さの設定を行うことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/border-width/', //詳細リンク
    },
    {
        'id': 54,
        'question':'要素に影を付ける', // 問題文
        'answer':'box-shadow', // 解答
        'explanation': '要素に影を付けることができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/box-shadow/', //詳細リンク
    },
    {
        'id': 55,
        'question':'アウトラインの表示を(まとめて)設定', // 問題文
        'answer':'outline', // 解答
        'explanation': 'アウトラインのスタイル、太さ、色、アウトラインまでの距離をまとめて指定できる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/outline/', //詳細リンク
    },
    {
        'id': 56,
        'question':'アニメーション設定', // 問題文
        'answer':'animation', // 解答
        'explanation': '要素をアニメーション（指定した動き）に変化させる事ができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/animation/', //詳細リンク
    },
    {
        'id': 57,
        'question':'時間的変化', // 問題文
        'answer':'transition', // 解答
        'explanation': '時間や速度を指定したCSSプロパティの値を変化させる事ができる。アニメーションの1つで、カーソルイン（:hover）のタイミングで変化を与えたりできる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/transition/', //詳細リンク
    },
    {
        'id': 58,
        'question':'変形(回転、拡大・縮小など)', // 問題文
        'answer':'transform', // 解答
        'explanation': '要素を変形させる事ができる。アニメーションとの組み合わせで要素が回り続けたり、拡大縮小などを繰り返すことができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/transform/', //詳細リンク
    },
    {
        'id': 59,
        'question':'flexアイテムの垂直方向の揃え方の設定', // 問題文
        'answer':'align-items', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の垂直方向の揃え方を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/align-items/', //詳細リンク
    },
    {
        'id': 60,
        'question':'flexアイテムの水平方向の揃え方の設定', // 問題文
        'answer':'justify-content', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の水平方向の揃え方を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/justify-content/', //詳細リンク
    },
    // ここからは中級以上のレベル、または使用頻度少なめのもの
    {
        'id': 61,
        'question':'グリッドコンテナをまとめて指定', // 問題文
        'answer':'grid', // 解答
        'explanation': 'TABLEのセルのような考え方で、アイテム（ボックス）を配置することができる。グリッドコンテナをまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/grid/', //詳細リンク
    },
    {
        'id': 62,
        'question':'高さの最大値', // 問題文
        'answer':'max-height', // 解答
        'explanation': '要素の高さの最大値を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/max-height/', //詳細リンク
    },
    {
        'id': 63,
        'question':'高さの最小値', // 問題文
        'answer':'min-height', // 解答
        'explanation': '要素の高さの最小値を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/max-height/', //詳細リンク
    },
    {
        'id': 64,
        'question':'書字方向', // 問題文
        'answer':'direction', // 解答
        'explanation': '書字方向を指定することができる。インライン要素に指定する場合は、「unicode-bidi」に、embed または bidi-override を指定する必要がある。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/direction/', //詳細リンク
    },
    {
        'id': 65,
        'question':'ボックスの大きさの算出', // 問題文
        'answer':'box-sizing', // 解答
        'explanation': 'widthやheightの値が適用される範囲を調整することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/box-sizing/', //詳細リンク
    },
    {
        'id': 66,
        'question':'回り込みの解除', // 問題文
        'answer':'clear', // 解答
        'explanation': '「float」で指定した回り込みを解除することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/clear/', //詳細リンク
    },
    {
        'id': 67,
        'question':'グリッドアイテムの行開始/終了をまとめて指定', // 問題文
        'answer':'grid-row', // 解答
        'explanation': 'グリッドアイテムの行開始/終了をまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/grid/', //詳細リンク
    },
    {
        'id': 68,
        'question':'グリッドアイテムの余白をまとめて指定', // 問題文
        'answer':'grid-gap', // 解答
        'explanation': 'グリッドアイテムの余白をまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/grid/', //詳細リンク
    },
    {
        'id': 69,
        'question':'グリッドアイテムの列開始/終了をまとめて指定', // 問題文
        'answer':'grid-column', // 解答
        'explanation': 'グリッドアイテムの列開始/終了をまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/grid/', //詳細リンク
    },
    {
        'id': 70,
        'question':'gridのstart,endをまとめて指定', // 問題文
        'answer':'grid-area', // 解答
        'explanation': 'gridのstart,endをまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/grid/', //詳細リンク
    },
    {
        'id': 71,
        'question':'画像の表示位置', // 問題文
        'answer':'object-position', // 解答
        'explanation': '画像一部の表示位置を指定する場合などに使用する。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/object-position/', //詳細リンク
    },
    {
        'id': 72,
        'question':'ボックスに合わせた画像サイズの調節', // 問題文
        'answer':'object-fit', // 解答
        'explanation': '画像などのサイズを自動調整することができる。レスポンシブWebデザインを行うときに非表示便利。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/object-fit/', //詳細リンク
    },
    {
        'id': 73,
        'question':'オーバーフローしたテキストの省略表示', // 問題文
        'answer':'text-overflow', // 解答
        'explanation': 'オーバーフローしたテキストの省略表示の方法を指定することができる。適用条件あり。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-overflow/', //詳細リンク
    },
    {
        'id': 74,
        'question':'flexアイテムの並び順', // 問題文
        'answer':'order', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の並び順を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/order/', //詳細リンク
    },
    {
        'id': 75,
        'question':'flexアイテムの折り返し方法', // 問題文
        'answer':'flex-wrap', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の横または縦の折り返し方法を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/order/', //詳細リンク
    },
    {
        'id': 76,
        'question':'flexアイテムの自動幅調整（縮む）', // 問題文
        'answer':'flex-shrink', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の自動幅調整（縮む）を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flex-shrink/', //詳細リンク
    },
    {
        'id': 77,
        'question':'flexアイテムの自動幅調整（伸ばす）', // 問題文
        'answer':'flex-grow', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の自動幅調整（伸ばす）を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flex-grow/', //詳細リンク
    },
    {
        'id': 78,
        'question':'flexアイテムの並びと折り返しをまとめて指定', // 問題文
        'answer':'flex-flow', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の並びと折り返しをまとめて指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flexbox/', //詳細リンク
    },
    {
        'id': 79,
        'question':'flexアイテムの縦横の並び方向', // 問題文
        'answer':'flex-direction', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の横または縦の並び方向を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flex-direction/', //詳細リンク
    },
    {
        'id': 80,
        'question':'flexアイテムの幅を調整', // 問題文
        'answer':'flex-basis', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の幅を調整を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flex-basis/', //詳細リンク
    },
    {
        'id': 81,
        'question':'flexアイテムの垂直位置指定', // 問題文
        'answer':'align-self', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の垂直（縦）方向の位置指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flex-basis/', //詳細リンク
    },
    {
        'id': 82,
        'question':'flexアイテムの垂直方向の揃え方(複数行)', // 問題文
        'answer':'align-content', // 解答
        'explanation': 'flexbox（flexコンテナ内のflexアイテム）の垂直方向の揃え方(複数行)を指定することができる。flexboxはCSS3で導入されたレイアウトモード。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/flex-basis/', //詳細リンク
    },
    {
        'id': 83,
        'question':'文字の装飾線の位置・種類・色をまとめて指定', // 問題文
        'answer':'text-decoration', // 解答
        'explanation': '文字の装飾線の位置、種類、色をまとめて指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-decoration/', //詳細リンク
    },
    {
        'id': 84,
        'question':'文字の装飾線の位置指定', // 問題文
        'answer':'text-decoration-line', // 解答
        'explanation': '文字の装飾線の位置を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-decoration/', //詳細リンク
    },
    {
        'id': 85,
        'question':'文字の装飾線の色指定', // 問題文
        'answer':'text-decoration-color', // 解答
        'explanation': '文字の装飾線の色を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-decoration/', //詳細リンク
    },
    {
        'id': 86,
        'question':'圏点(「、」「・」「◦」など)の色、塗りつぶしと種類ををまとめて指定', // 問題文
        'answer':'text-emphasis', // 解答
        'explanation': '圏点(「、」「・」「◦」など)の色、塗りつぶしと種類ををまとめて指定することができる。省略した値は、それぞれの初期値が設定される。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-emphasis/', //詳細リンク
    },
    {
        'id': 87,
        'question':'圏点(「、」「・」「◦」など)の色を指定', // 問題文
        'answer':'text-emphasis-color', // 解答
        'explanation': '圏点(「、」「・」「◦」など)の色を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-emphasis/', //詳細リンク
    },
    {
        'id': 88,
        'question':'圏点(「、」「・」「◦」など)の位置を指定', // 問題文
        'answer':'text-emphasis-position', // 解答
        'explanation': '圏点(「、」「・」「◦」など)の位置を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-emphasis/', //詳細リンク
    },
    {
        'id': 89,
        'question':'圏点(「、」「・」「◦」など)の塗りつぶしと種類を指定', // 問題文
        'answer':'text-emphasis-style', // 解答
        'explanation': '圏点(「、」「・」「◦」など)の塗りつぶしと種類を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-emphasis/', //詳細リンク
    },
    {
        'id': 90,
        'question':'１行目の字下げ', // 問題文
        'answer':'text-indent', // 解答
        'explanation': '段落の最初の行のインデント（字下げ）幅を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/text-indent/', //詳細リンク
    },
    {
        'id': 91,
        'question':'スペース・改行の表示方法', // 問題文
        'answer':'white-space', // 解答
        'explanation': 'スペースや改行の表示方法を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/white-space/', //詳細リンク
    },
    {
        'id': 92,
        'question':'英単語の間隔', // 問題文
        'answer':'word-spacing', // 解答
        'explanation': '英単語の間隔を指定することができる。日本語ではは有効とはなりませんが、あえて半角スペースを使用すると、日本語でも単語間隔が有効となる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/word-spacing/', //詳細リンク
    },
    {
        'id': 93,
        'question':'リストマークのデザイン(種類、位置、画像)をまとめて指定', // 問題文
        'answer':'list-style', // 解答
        'explanation': 'リストマークの種類、位置、画像をまとめて指定することができる。種類と画像を両方指定した場合は、画像が優先される。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/list-style/', //詳細リンク
    },
    {
        'id': 94,
        'question':'リストマークの画像', // 問題文
        'answer':'list-style-image', // 解答
        'explanation': 'リストマークの画像を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/list-style/', //詳細リンク
    },
    {
        'id': 95,
        'question':'リストマークの種類', // 問題文
        'answer':'list-style-type', // 解答
        'explanation': 'リストマークの種類を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/list-style/', //詳細リンク
    },
    {
        'id': 96,
        'question':'リストマークの位置', // 問題文
        'answer':'list-style-position', // 解答
        'explanation': 'リストマークの位置を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/list-style/', //詳細リンク
    },
    {
        'id': 97,
        'question':'アウトラインのスタイル', // 問題文
        'answer':'outline-style', // 解答
        'explanation': 'アウトラインのスタイルを指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/outline/', //詳細リンク
    },
    {
        'id': 98,
        'question':'アウトラインの太さ', // 問題文
        'answer':'outline-width', // 解答
        'explanation': 'アウトラインの太さを指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/outline/', //詳細リンク
    },
    {
        'id': 99,
        'question':'アウトラインの色', // 問題文
        'answer':'outline-color', // 解答
        'explanation': 'アウトラインの色を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/outline/', //詳細リンク
    },
    {
        'id': 100,
        'question':'アウトラインまでの距離', // 問題文
        'answer':'outline-color', // 解答
        'explanation': 'アウトラインまでの距離を指定することができる。', // 解説
        'url':'https://web-designer.cman.jp/css_ref/abc_list/outline/', //詳細リンク
    },
]