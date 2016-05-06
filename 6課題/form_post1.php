<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css">
  <title>フォーム：POST</title>
</head>
<body>


<script>

    window.onload=function(){
        check();
        document.getElementById("name").value=localStorage.getItem("name");
        document.getElementById("mail").value=localStorage.getItem("mail");
        
    }
    function check() {
        document.getElementById("q2_1").disabled=true;
        document.getElementById("q2_2").disabled=true;
        document.getElementById("q2_3").disabled=true;
        document.getElementById("q2_4").disabled=true;
        document.getElementById("q2_1").value="";
        document.getElementById("q2_2").value="";
        document.getElementById("q2_3").value="";
        document.getElementById("q2_4").selectedIndex=0;

        if (document.getElementById("q1_1").checked) {
            document.getElementById("q2_1").disabled=false;
            document.getElementById("q2_2").disabled=false;
            document.getElementById("q2_1").focus();
        } else if ( document.getElementById("q1_2").checked) {
            document.getElementById("q2_3").disabled=false;
            document.getElementById("q2_3").focus();
        } else if ( document.getElementById("q1_3").checked) {
            document.getElementById("q2_4").disabled=false;
            document.getElementById("q2_4").focus();
        }

    }
    function checksubmit(){
        localStorage.setItem("name",document.getElementById("name").value);
        localStorage.setItem("mail",document.getElementById("mail").value);
        
        if (document.getElementById("q1_1").checked) {
            if (document.getElementById("q2_1").value <0 || document.getElementById("q2_2").value <0 || document.getElementById("q2_1").value =="" || document.getElementById("q2_2").value =="" ) {
                alert("値を正しく入力してください");
                return false;
            }
        } else if ( document.getElementById("q1_2").checked) {
            if (document.getElementById("q2_3").value =="" ) {
                alert("値を入力してください");
                return false;
            }
        } else if ( document.getElementById("q1_3").checked) {
            if (document.getElementById("q2_4").value =="0" ) {
                alert("値を選択してください");
                return false;
            }
        } else {
            alert("チェックが入力されていません");
            return false;
        }
        return true;
    }
</script>


<form name="postform"  method="post" action="form_post2.php"  onSubmit="return checksubmit()">
<legend>基本情報</legend>
<fieldset>
お名前:<input type="text" name="name" id="name" size="20">
MAIL:<input type="text" name="mail" id="mail" size="20">
</fieldset>
    <p></p>
<legend>q1：実施するコマンドは？</legend>
<fieldset>
<input type="radio" name="command" id="q1_1" value="1" onclick="check();" />クリック
<input type="radio" name="command" id="q1_2" value="2" onclick="check();" />入力
<input type="radio" name="command" id="q1_3" value="3" onclick="check();" />スリープ
</fieldset>
<legend>q2：送り値</legend>
<fieldset>
（X:<input type="number"  name="x" id="q2_1" size="20">
  Y:<input type="number"  name="y" id="q2_2" size="20">）
（ワード:<input type="text"  name="word"  id="q2_3" size="20">）
<select name="sleep" id="q2_4">
<option value="0" />▼待ち時間
<option value="1" />1
<option value="2" />2
<option value="3" />3
<option value="5" />5
<option value="10" />10
<option value="15" />15
<option value="30" />30
</select>
</fieldset>
<p><input type="submit" value="送信"></p>

</form>

</body>
</html>


