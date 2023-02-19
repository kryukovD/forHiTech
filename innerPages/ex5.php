<? include $_SERVER["DOCUMENT_ROOT"] . "/test/include/header.php"; ?>
<?
$paths = [];
$crumbsResult;
$feature = [
    1 => "Главная",
    2 => [
        "Каталог" => [
            3 => [
                "Телефоны" => [
                    4 => "iPhone 6",
                    5 => "iPhone 5",
                    6 => ".iPhone 4"
                ]
            ],
            8 => [
                "Планшеты" => [
                    9 => "iPad Air",
                    10 => "iPad Mini",
                    11 => "Аксессуары"
                ]
            ],
            12 => [
                "Ноутбуки" => [
                    13 => "Macbook Air",
                    14 => "Macbook Pro",
                    15 => "Aкссесуары"
                ]
            ]


        ]
    ],
    16 => "О компании"

];


function fillPaths($array, $searchKey, &$paths = [], &$path = [])
{
    foreach ($array as $key => $values) {
        if ((is_array($values) == false)) {
            $path[] = $values;
        } else {
            $path[] = key($values);
        }
        if ($key === $searchKey) {
            $paths[] = $path;
        }
        if (is_array($values)) {
            fillPaths($values, $searchKey, $paths, $path);
        }
        array_pop($path);
    }
}


if ($_GET["id"]) {
    $id=(int)$_GET["id"];
    fillPaths($feature,$id, $paths);
    foreach ($paths[0] as $key => $value) {
        if (is_int($value) !== true) {
            $crumbsResult .= "<span class='breadcrumbs__item'>" . "$value" . "</span>";
        }
    }
}
?>
<section class="breadcrumbs cst-container">
    <ul>
        <h2>Структура</h2>
        <li>1.Главная</li>
        <li>2.Каталог
            <ul class="submenu">
                <li>3.Телефоны
                    <ul class="submenu">
                        <li>4.iPhone 6</li>
                        <li>5.Phone 5</li>
                        <li>6.Phone 5</li>
                        <li>7.Аксессуары</li>
                    </ul>
                </li>
                <li>8.Планшеты
                    <ul class="submenu">
                        <li>9.iPad Air</li>
                        <li>10.iPad Mini</li>
                        <li>11.Аксессуары</li>
                    </ul>

                </li>
                <li>12.Ноутбуки</li>
                <ul class="submenu">
                    <li>13.Macbook Air</li>
                    <li>14.Macbook P</li>
                    <li>15.Аксессуары</li>
                </ul>
            </ul>
        </li>
        <li>16.О компании</li>


    </ul>
    <div>
        <h2>Крошки</h2>
        <p> <?= $crumbsResult ?> </p>
    </div>
    <form action="/test/innerPages/ex5.php">
        <div class="section-form__wrap">
            <div class="form__input-wrap">
                <input name="id" class="form__input" placeholder="Введите id">
            </div>
            <input type="submit" value="Получить крошки" class="form__btn">
    </form>
    </div>
</section>
<? include $_SERVER["DOCUMENT_ROOT"] . "/test/include/footer.php"; ?>