<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/dragtable.js"></script> 
  <script src="js/sorttable.js"></script> 
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
  <title>フォーム：POST</title>



<script>
jQuery(function($) {
    $('#javascript_sample_table_1_tbody').sortable();
    
	jQuery("#btn_javascript_sample_table_1").click(function() {
		var tblTbody = document.getElementById('javascript_sample_table_1_tbody');
		document.getElementById("txtArea_javascript_sample_table_1").value = "";
		// td内のtrをループ。rowsコレクションで,行位置取得。
		for (var i=0, rowLen=tblTbody.rows.length; i<rowLen; i++) {
			// tr内のtdをループ。cellsコレクションで行内セル位置取得。
			for (var j=0, colLen=tblTbody.rows[i].cells.length ; j<colLen; j++) {
				//i行目のj列目のセルを取得
				var cells = tblTbody.rows[i].cells[j];
				//取得した値をテキストエリアへ表示
				document.getElementById("txtArea_javascript_sample_table_1").value += i + "行目" + j + "列目の値は「" + cells.innerHTML + "」です。\n";
			}
		}
	});
});


    
(function(documet){
    
    $(document).ready(function(){
        $("#javascript_sample_table_1 > tbody > tr > td").click(edit_toggle());
        //document.getElementsByName("ii").click(edit_toggle());
    });
    
 
    function edit_toggle(){
        var edit_flag=false;
        return function(){
            if(edit_flag) return;
            var $input = $("<input>").attr("type","text").val($(this).text());
            $(this).html($input); 
            
            $("input", this).focus().blur(function(){
                save(this);
                $(this).after($(this).val()).unbind().remove();
                edit_flag = false;
            });
            edit_flag = true;
        }
    }    
    
    function save(elm){
         //保存する処理をここに書く
    }
    
   
    
})(document);

function insertRow(id) {

    // テーブル取得
    var table = document.getElementById(id);
    // 行を行末に追加
    var row = table.insertRow(-1);
    // セルの挿入
    var cell1 = row.insertCell(-1);
    var cell2 = row.insertCell(-1);
    var cell3 = row.insertCell(-1);
    var cell4 = row.insertCell(-1);
    var cell5 = row.insertCell(-1);
    var cell6 = row.insertCell(-1);
    var cell7 = row.insertCell(-1);
    var cell8 = row.insertCell(-1);
    
    // ボタン用 HTML
    var button = '<input type="button" value="行削除" onclick="deleteRow(this)" />';
    var text = '<input type="text" value=<?=date("Y年m月d日 h:i:s");?>>';
 
    // 行数取得
    var row_len = table.rows.length;
 
    // セルの内容入力
    
        
    cell1.innerHTML = '<input type="text"  style="width: 200px;" value=<?=date("Y年m月d日 h:i:s");?>>';
    cell2.innerHTML = "<input type='text'  style='width: 40px;' value=" + localStorage.getItem("name") + ">";
    cell3.innerHTML = "<input type='text'  style='width: 40px;' value=" + localStorage.getItem("mail") + ">";
    cell4.innerHTML = "<input type='text'  style='width: 40px;' value=NON>";
    cell5.innerHTML = "<input type='number' style='width: 30px;'>";
    cell6.innerHTML = "<input type='number' style='width: 30px;'>";
    cell7.innerHTML = "<input type='number' style='width: 30px;'";
    cell8.innerHTML = button;
    
}

function deleteRow(obj) {
    // 削除ボタンを押下された行を取得
    tr = obj.parentNode.parentNode;
    // trのインデックスを取得して行を削除する
    tr.parentNode.deleteRow(tr.sectionRowIndex);
}
 
    
function addList(obj) {

  // tbody要素に指定したIDを取得し、変数「tbody」に代入
  var tbody = document.getElementById("javascript_sample_table_1_tbody");
  //var tbody = document.getElementById("p2146-table");
  // objの親の親のノードを取得し（つまりtr要素）、変数「tr」に代入
  var tr = obj.parentNode.parentNode;

  
    
    
    
    
    
    insertRow("javascript_sample_table_1_tbody");
}
    
    </script>

</head>
<body>




<?php
error_reporting(E_ALL & ~E_NOTICE);
?>



<?php

function htmlEnc($value) {
        return htmlspecialchars($value,ENT_QUOTES);
}

    $date = date("Y年m月d日 h:i:s");
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $tel  = "NON";
    $command = $_POST["command"];
    $x = $_POST["x"];
    $y = $_POST["y"];
    $word = $_POST["word"];
    $sleep = $_POST["sleep"];

    $str = $date.",".$name.",".$mail.",".$tel.",".$command.",".$x.$word.$sleep.",".$y.",\n";

    $file = fopen("data/data.txt","a");
    flock($file, LOCK_EX);
    fputs($file,$str);
    flock($file, LOCK_UN);
    fclose($file);
?>
<!--    <p>お名前:<?=htmlEnc($name)?></P>
    <P>MAIL:<?=htmlEnc($mail)?></p>
  -->
       
 
           
  <P>
 <input type="button" value="行追加" onclick='insertRow("javascript_sample_table_1_tbody")' />
    
<table id="javascript_sample_table_1" style="border-style: solid; width: 300px;" border="1" cellspacing="0" cellpadding="1" align="center"  class="draggable sortable">
<thead>
<tr style="border-style: solid;">
<th style="min-width: 256px;">日付</th>
<th style="min-width: 80px;">名前</th>
<th style="min-width: 80px;">メールアドレス</th>
<th style="min-width: 80px;">電話番号</th>
<th style="min-width: 80px;">コマンド</th>
<th style="min-width: 30px;">OP1</th>
<th style="min-width: 30px;">OP2</th>
</tr>
</thead>
<tbody id="javascript_sample_table_1_tbody"> 
       <?
        $fp = fopen("data/data.txt", "r");       //ファイルを開く
        flock($fp, LOCK_SH);                      //ファイルロック.cvx,/
        while ($array = fgetcsv( $fp )) {
            echo "<tr>";
            $num = count($array);
            for($i=0;$i<=$num;$i++){
                $com = $array[$i];
                echo "<td>".$com."</td>";
                if ($i > 5) 
                { 
                    echo "<td>".'<input type="button" value="行削除" onclick="deleteRow(this)" />'."</td>";
                    break 1;
                }
            }
            echo "</tr>";
        }
        flock($fp, LOCK_UN);                      //ロック解除
        fclose($fp);                              //ファイルを

        ?>
</tbody>
</table>

       
       
       
       
       
       
        
        </p>
        
</body>
</html>