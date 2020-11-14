// 編集画面で削除ボタン押下時に確認ダイアログを表示する
function confirmDelete(){
	if(window.confirm('本当に削除してもよろしいですか？')){
		return true;
    }
    return false;
}
