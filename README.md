# Array Collection

PHPの配列操作をより安全で意図が明確になるようにするライブラリです。

## 特徴

- 連想配列と通常の配列を明確に区別
- 存在しないキーへのアクセスを安全に処理
- 型の安全性を向上
- メソッドチェーンが可能
- 通常の配列関数との互換性を維持

## 使用方法

### HashMap (連想配列)

```php
use ArrayCollection\HashMap;

// 初期化
$map = new HashMap(["name" => "John", "age" => 30]);

// 値の取得
echo $map->get("name"); // "John"
echo $map->get("unknown", "default"); // "default"
echo $map["name"]; // "John"

// 値の設定
$map->set("email", "john@example.com");
$map["email"] = "john@example.com";

// キーの存在確認
if ($map->has("name")) {
    // 処理
}

// 値の削除
$map->remove("name");

// 配列のクリア
$map->clear();

// キーと値の取得
$keys = $map->keys();
$values = $map->values();

// 配列への変換
$array = $map->toArray();

// イテレーション
foreach ($map as $key => $value) {
    echo "$key: $value";
}
```

### Vector (通常の配列)

```php
use ArrayCollection\Vector;

// 初期化
$vector = new Vector([1, 2, 3]);

// 値の追加
$vector->add(4);
$vector[] = 5;

// 値の取得
echo $vector->get(0); // 1
echo $vector->get(10, "default"); // "default"
echo $vector[0]; // 1

// 値の設定
$vector->set(1, 10);
$vector[1] = 10;

// 値の削除
$vector->remove(1);

// 配列のクリア
$vector->clear();

// 配列への変換
$array = $vector->toArray();

// イテレーション
foreach ($vector as $index => $value) {
    echo "$index: $value";
}
```

### フレームワークとの連携

フレームワークが`array`を渡す場合でも、内部で`HashMap`や`Vector`を使用できます：

```php
use ArrayCollection\HashMap;
use ArrayCollection\Vector;

function processUserData(array $userData)
{
    $map = new HashMap($userData);
    // HashMapとして安全に操作
    return $map->toArray();
}

function processNumbers(array $numbers)
{
    $vector = new Vector($numbers);
    // Vectorとして安全に操作
    return $vector->toArray();
}
```

## テスト

```bash
./vendor/bin/phpunit
```
