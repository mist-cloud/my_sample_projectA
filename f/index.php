<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>フォームで色々便利に使う</h1>
    <form action="index2.php" method="post">
        <dl>
            <dt>名前：　</dt>
            <dd>
                <input id="my_name" type="text" name="my_name" size="35" maxlength="255" value="" />
            </dd>
            <dt>性別：　</dt>
            <dd><input id="gender_male" type="radio" name="gender" value="male" /><label for="gender_male">男性</label>
            <input id="gender_female" type="radio" name="gender" value="female" /><label for="gender_female">女性</label>
            </dd>
            <dt>年齢：　</dt>
            <dd>
                <select name="age" id="age">
                <?php
                /*1〜70まで繰り返し表示*/
                    for ($i=1; $i<=70; $i++) {
                        print ('<option value="' . $i . '">' . $i . '歳</option>');
                    }
                ?>
                </select>
            </dd>
            <dt>テスト：　</dt>
            <dd>
                <select name="test" id="test">
                    <?php
                    /*1〜50まで繰り返し表示*/
                        $j = 1;
                        while ($j <= 50) {
                            print ('<option value="' . $j . '">' . $j . '点でした。');
                            $j++;
                        }
                    ?>
                </select>
            </dd>
            <dt>ご希望日：　</dt>
            <dd>
                <?php print(date('n')); ?>月　
                <select name="day" id="day">
                <?php
                /*dateファンクションには月末日を示すtがあるので便利。月末日まで繰り返し表示し続ける。*/
                  for ($day=1; $day<=date('t'); $day++) {
                      print('<option value="' . $day . '">' . $day . '日</option>');
                  }  
                ?>
                </select>
            </dd>
            <dt>県名：　</dt>
            <dd>
                <select name="pref" id="pref">
                    <?php
                    /*配列を使う際に便利な制御構造であるforeach。配列の内容を前から順番に全て取出すまで繰り返す。*/
                    $prefs = array('北海道','青森県','岩手県','宮城県','秋田県');
                    foreach($prefs as $pref) {
                        print('<option value="' . $pref . '">' . $pref . '</option>');
                    }
                    ?>
                </select>
            </dd>
            <dt>好きな物すべて選択：　</dt>
            <dd>
                <?php
                $items = array('a-1'=>'ガム','b-1'=>'チョコ','c=3'=>'クッキー');
                foreach($items as $itemKey => $itemValue) {
                    print('<input type="checkbox" id="' . $itemKey . '" value="' . $itemKey . '" /><label for="' . $itemKey . '">' . $itemValue . '</label> ');
                }
                ?>
            </dd>
        </dl>
        
        <table>
            <?php
            for($k=1; $k<=10; $k++) {
                if ($k % 2) {
                    print('<tr style="background-color: #bce0f2">');
                } else {
                    print('<tr>');
                }
                print('<td>' . $k . '</td>');
                print('<td>' . $k . '行目の情報です</td>');
                print('</tr>');
            }
            ?>
        </table>
        
        <input type="submit" value="送信" />
    </form>
</body>
</html>
