/********************************
 * 表の一番下に行を追加
 **********************************/
var i = 1;
function addTableRow() {
    var table = document.getElementById('answer-tbl');  //表のオブジェクトを取得

    var row = table.insertRow(-1);  //行末に行(tr要素)を追加

    var cell1 = row.insertCell(0);  //セル(td要素)の追加
    var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);

	//フォームの情報
	var input_data = document.createElement('input');
	input_data.className = 'input';
	input_data.type = 'text';
	input_data.name = 'answers[]';

	//削除ボタンの情報
	var button_data = document.createElement('input');
	button_data.type = 'button';
  	button_data.onclick = function(){deleteTableRow(this);}
  	button_data.value = '削除';

	cell1.innerHTML = '　　';   //セルにデータを挿入する
    cell2.appendChild(input_data);
	cell3.appendChild(button_data);

	i++ ;
}

/********************************
 * 指定された行を削除
 **********************************/
function deleteTableRow(obj) {
 	tr = obj.parentNode.parentNode;

  	tr.parentNode.deleteRow(tr.sectionRowIndex);
}