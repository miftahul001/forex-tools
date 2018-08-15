<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
  if($_SERVER['REQUEST_URI']=='/php') phpinfo();
  else include_once 'm.html';
//  if(!isset($_REQUEST['a']))include_once 'm.html';
//  elseif($_REQUEST['a']=='db') include_once './m/d.html';
//  else include_once 'm.html';
}elseif($_SERVER['REQUEST_METHOD']=="POST"){

try { $db = new SQLite3('eu.sqlite');
} catch(Exception $e){ exit("[0,$e->getMessage()]"); }

if($db->busyTimeout(10000)){
//  $a='SELECT (substr(a1,1,14)||":00") as b1, max(a2)as b2, min(a2)as b3, max(a3)as b4, min(a3)as b5 FROM t1 WHERE a1 BETWEEN :a1 AND :a2  GROUP BY b1;';
//  $a='SELECT (substr(a1,1,14)||":00") as b1, max(a2)as b2, min(a2)as b3, max(a3)as b4, min(a3)as b5 FROM t1 GROUP BY b1 LIMIT 10;';
//  $a='SELECT (substr(a1,1,11)||":00:00") as b1, max(a2)as b2, min(a2)as b3, max(a3)as b4, min(a3)as b5 FROM t1 GROUP BY b1 LIMIT 30;';
//  $a='SELECT (substr(a1,1,11)||":00:00") as b1, max(a2)as b3, min(a2)as b4 FROM t1 GROUP BY b1 LIMIT 10;';
//  $a='SELECT t2.b3 AS time, t3.b2 AS open, t2.b4 AS high, t2.b5 AS low, t4.b2 AS close FROM'
//     .'(SELECT MIN(rowid)as b1, MAX(rowid)as b2,(substr(a1,1,11)||":00:00")as b3, MAX(a2)as b4, MIN(a2)as b5 FROM t1 GROUP BY b3 LIMIT 100)AS t2,'
//     .'(SELECT rowid AS b1, a2 AS b2 from t1)AS t3,'
//     .'(SELECT rowid AS b1, a2 AS b2 from t1)AS t4'
//     .' WHERE t2.b1=t3.b1 AND t2.b2=t4.b1';
  $a='SELECT * FROM t3 limit 100';
  $a=$_REQUEST['a'];
  
  if($stmt = $db->prepare($a)){
    //$stmt->bindValue(':a1', '20180101 22:01:00.000', SQLITE3_TEXT);
    //$stmt->bindValue(':a2', '20180101 22:02:00.000', SQLITE3_TEXT);
    if($result = $stmt->execute()){
      while ($array = $result->fetchArray(SQLITE3_NUM)) { $jsonData[] = $array; }
      $result->finalize();
      $a='[1,'.json_encode($jsonData).']';
    }else $a="[0,$db->lastErrorMsg()]";
    $stmt->close();
  }else $a="[0,$db->lastErrorMsg()]";
}else $a="[0,$db->lastErrorMsg()]";
$db->close();

echo $a;

}
?>
