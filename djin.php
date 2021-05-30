<?php
//ファイルを配列に読み込む
//日付を含む行を配列に格納　正規表現
//レポートオブジェクトを生成
$file_name = "data/test.txt"; /*読込ファイルの指定*/

$ret_array = file( $file_name ); /*ファイルを全て配列に入れる*/

$i=0;

$d_array=array();
foreach ($ret_array as $value) {
  if(preg_match('|\d{4}\/\d{1,2}\/\d{1,2}|', $value))
      {
        array_push($d_array,$i);
        //echo '<font color="blue">'.$value.' 正しい日付</font><br/>';
      }
  else
      { //echo '<font color="red">'.$value.' 不正な日付</font><br/>';
      }

  /*
    if($value=="")
    else{

    }*/
    $i++;
}
$j=0;
/*
for ($count = 0; $count < $d_array[$j]; $count++){
  // 実行する処理　日付と内容の対のハッシュ
  print($ret_array[$count]."<BR>");
}*/

for ($cnt = 0; $cnt < count($d_array); $cnt++){
  //print("---------<BR>");
  $k=0;
  $text="";
  for ($count = $d_array[$j]; $count < $d_array[$j+1]; $count++){
    if($k==0){
      $date=$ret_array[$count];
    }
    // 実行する処理
    $text=$text.$ret_array[$count];
    $k++;
  }
  $array1=[];
  $array1 = array('date'=>$date, 'body'=>$text);
  $arr[$j]=$array1;
  $j++;
}
//print("----**-----<BR>");
$k=0;
for ($cnt2 = $d_array[count($d_array)-1]; $cnt2 < count($ret_array); $cnt2++){
  if($k==0){
    $date2=$ret_array[$count];
  }
  // 実行する処理
  $text2=$text2.$ret_array[$cnt2];
  $k++;
}
$array1 = array('date'=>$date2, 'body'=>$text2);
$arr[$j+1]=$array1;
//array_push($array1, $array2);

foreach ($arr as $v) {
  $d=$v["date"];
  $b=$v["body"];
echo <<<EOD
<HTML><script type="text/javascript" src="jquery-3.6.0.min.js"></script>
  <style>/*タグクラウドのデザイン*/.widget_tag_cloud
   .tagcloud a { background: #bbb; margin: 3px;
     padding:6px; text-decoration: none; border-left:solid 4px #555;
      color:#fff; font-size:12px;}/*タグクラウドマウスオーバー時*/
      .widget_tag_cloud .tagcloud a:hover{ color: #000;  background:#ddd;}</style><center>
       <table><tr><td><Div ><div style="width:650px;background-color:white;vertical-align:middle;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;-moz-box-shadow: 1px 1px 3px #000;-webkit-box-shadow: 1px 1px 3px #000;">
    <div style="padding:5px 0px 0px 0px; height:5px;background-color:orange;width:100%;"></div>
    <li style="padding:15px 5px 2px 10px;text-align:left;vertical-align:middle;list-style-type:none;">
      <span style="padding:5px 10px 2px 0px;text-align:left;vertical-align:middle;font-weight: bold;">人助け特別会議</span></li>
          <hr style="height:1px;margin:1px 10px;">
          <li style="padding:5px 5px 2px 10px;text-align:left;vertical-align:middle;list-style-type:none;">
          <span style="padding:5px 10px 2px 0px;font-size:14px;text-align:left;vertical-align:middle;">
          $d</span></li>
          <br><a href=""style=" background: #bbb; margin: 3px; padding:6px; text-decoration: none; border-left:solid 4px #ff0000; color:#fff; font-size:12px;">　計画</a><a href=""style=" background: #bbb; margin: 3px; padding:6px; text-decoration: none; border-left:solid 4px #555; color:#fff; font-size:12px;">やること</a>
            <a href=""style=" background: #bbb; margin: 3px; padding:6px; text-decoration: none;
            border-left:solid 4px #55f; color:#fff; font-size:12px;">　推薦</a><a href=""style="
            background: #bbb; margin: 3px; padding:6px; text-decoration: none; border-left:solid
             4px #55f; color:#fff; font-size:12px;">　スコア(123)</a>
             <a href=""style=" background: #bbb; margin: 3px; padding:6px; text-decoration: none;
              border-left:solid 4px #55f; color:#fff; font-size:12px;">　閲覧数(123)</a><BR><BR>
              <PRE style="margin:30px">$b</PRE><BR><BR></div></div>
              </td><tr></td></table></center>

EOD;
}
/*
foreach ($d_array as $d) {
  $d_array[$d]
  $j++;
}
*/
//print_r($d_array);
//print_r($ret_array);
?>
<!---
<PRE><?Php var_dump($arr);?></PRE>
-->
