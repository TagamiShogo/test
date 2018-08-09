<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>掲示板</title>
        <link rel="stylesheet" text="text/css" href="style.css">
    </head>

    <body>
        <?php 
            mb_internal_encoding("utf8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","mysql");
            $stmt = $pdo->query("select * from 4each_keijiban");
        ?>
        <header>
            <div class="logo">
                <img src="4eachblog_logo.jpg">
            </div>
            <div　class="menu">
                <ul>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>4eachについて</li>
                    <li>登録フォーム</li>
                    <li>問合せ</li>
                    <li>その他</li>
                </ul>
            </div>
        </header>
            <div class="contents-wrapper">
                <div class="left">
                    <h2>プログラミングに役立つ掲示板</h2>
                    <form method="post" action="insert.php">
                        <h3>入力フォーム</h3>
                        <div>
                            <label>ハンドルネーム：</label><br>
                            <input type="text" class="text" size="90" name="handlename">
                        </div>
                        <div>
                            <label>タイトル：</label><br>
                            <input type="text" class="text" size="90" name="title">
                        </div>
                        <div>
                            <label>コメント：</label><br>
                            <textarea cols="90" rows="7" name="comments"></textarea>
                        </div>
                        <div>
                            <input type="submit" class="submit" value="送信する">
                        </div>
                    </form>
                    <div class="comments-line">
                        <p>以下、コメント</p>
                    </div>
<?php
                    while($row = $stmt -> fetch()){
                    echo "<div class='kiji'>";
                        echo "<h3>".$row['title']."</h3>";
                        echo "<div class='comments'>";
                        echo $row['comments'];
                        echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                        echo "</div>";
                    echo "</div>";
                    }
?>
                    <div class="comments-line-end">
                        <p></p>
                    </div>

                </div>
                    
                <div class="right">
                    <div class="popular-articles">
                        <h3>人気の記事</h3>
                        <ul>
                            <li>PHPオススメ本</li>
                            <li>PHP　MyAdminの使い方</li>
                            <li>今人気のエディタTop5</li>
                            <li>HTMLの基礎</li>
                        </ul>
                    </div>
                    <div class="links">
                        <h3>オススメリンク</h3>
                         <ul>
                            <li>インターノウス株式会社</li>
                            <li>XAMPPのダウンロード</li>
                            <li>Eclipseのダウンロード</li>
                            <li>Bracketのダウンロード</li>
                        </ul>
                    </div>
                    <div class="category">
                        <h3>カテゴリ</h3>
                         <ul>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>JavaScript</li>
                        </ul>
                    </div>
                </div>
            </div>
        <footer>
            copyright(c) all right reserved internous 2015-2018
        </footer>
        </body>
</html>