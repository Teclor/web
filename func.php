<?php

$text = file_get_contents ("article.html"); 

preg_match_all('/<[hH]([1-6]).*?>(.*?)<\/[hH][1-6]>/',$text,$tags);

$quantityanchor=0;

$content="<div id=\"content\"><h1>Содержание</h1><ul>";

$headers=$tags[0];



for ($i=0;$i<count($tags[0]);$i++){


	if ($i<>0 and $tags[1][$i]>$tags[1][$i-1]){
		$content.="<p><ul>";
	}elseif ($i<>0 and $tags[1][$i]<$tags[1][$i-1]){
		$content.="</ul></p>";
	}
	
	//Создание якорей в содержании, на заголовки в статье
	$quantityanchor++;
	$content.="<a href=\"#HAnch{$quantityanchor}\"><li>{$tags[2][$i]}</li></a>";

	$headers[$i] = substr($headers[$i], 0, 3)." id=\"HAnch{$quantityanchor}\"".substr($headers[$i], 3);
	//Изменение заголовков статьи, путем добавления для каждого уникального ID
	//$text=str_replace($tags[0][$i],"<H{$tags[1][$i]} style=\"text-align: center\" id=\"HAnch{$quantityanchor}\">{$tags[2][$i]}</H{$tags[1][$i]}>",$text);
	$text=str_replace($tags[0][$i], $headers[$i] ,$text);

}
$content.="</ul></div>";

echo '
  <section class="jumbotron text-left">
    <div class="container">
      <p>
      ',$content,'
      </p>
    </div>
  </section>

';



echo $text;

 ?>
