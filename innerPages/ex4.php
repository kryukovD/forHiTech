<? include $_SERVER["DOCUMENT_ROOT"] . "/test/include/header.php"; ?>
<?
/* сгенерировали массив*/
$randArray=array();
$arrByView;
$outputArray=array();
$maxValue=0;
$maxValueKey=0;
for($i=0;$i<=9;$i++){
    array_push($randArray,rand(0,100));
}
$arrByView=new ArrayObject($randArray); // создание копии для вывода
for($j=0;$j<=2;$j++){
for($i=0;$i<=9;$i++){
    if($maxValue<$randArray[$i+1]){
        $maxValue=$randArray[$i+1];
        $maxValueKey=$i+1;
    }
}
array_push($outputArray,$maxValue);
array_splice($randArray,$maxValueKey, 1);
$maxValue=0;
$maxValueKey=0;
}
?>
<section class="random_numbers">
    <div class="cst-container">
    <h2>Задание 4</h2>
    <p class="random_numbers__text">Сгенирировано 10 рандомных чисел от 0 - 100:</p>
     <?foreach ($arrByView as $value) :?>
        <span><?=$value?></span>
    <?endforeach; ?>

    <p class="random_numbers__text">Три самых максимальный из них:</p>
     <?foreach ($outputArray as $value) :?>
        <span class="random_numbers_success"><?=$value?></span>
    <?endforeach; ?>
    </div>
</section>
<? include $_SERVER["DOCUMENT_ROOT"] . "/test/include/footer.php"; ?>  