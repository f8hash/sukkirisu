# 練習：スッキりす
練習シリーズ第1弾。

## 意識すること
- interfaceを使った実装
- SOLIDの原則

## スッキりすとは
http://www.ntv.co.jp/sukkiri/sukkirisu/index.html

## 使い方
```
$ php --version
PHP 7.3.13 (cli) (built: Dec 18 2019 16:08:06) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.13, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.3.13, Copyright (c) 1999-2018, by Zend Technologies

$ php index.php
スッキりす！7月生まれは6位。苦手な事にチャレンジすると克服できるチャンス。ラッキーカラーは青
```

## テスト実行（未実装）
```
./vendor/bin/phpunit tests/SampleTest.php
PHPUnit 9.1.4 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 00:00.033, Memory: 4.00 MB

OK (1 test, 1 assertion)
```

## 今後やりたいこと
- [x] 表示を整える
- [x] 超スッキりす、ガッカりすへの対応
- [x] sukkirisu型
    - 実装として存在させる
- [ ] 別言語（Goとか）で書き換え
