/***********************************************/ 
/* onloadにfunctionを追加する仕組み */
/***********************************************/ 

var onloadHandle="";
function addOnloadHandle(str){
onloadHandle+=str;
}
window.onload=function(){
eval(onloadHandle);
}


/***********************************************/ 
/* getElementsByClassName定義 */
/***********************************************/ 

document.getElementsByClassName = function (className) {
    var i, j, eltClass;
    var objAll = document.getElementsByTagName ? document.getElementsByTagName("*") : document.all;
    var objCN = new Array();
    for (i = 0; i < objAll.length; i++) {
        eltClass = objAll[i].className.split(/\s+/);
        for (j = 0; j < eltClass.length; j++) {
            if (eltClass[j] == className) {
                objCN.push(objAll[i]);
                break;
            }
        }
    }
    return objCN;
}


/***********************************************/ 
/* ロールオーバー画像切替動作 */
/***********************************************/ 

//mouseover
function swapImage(e){
	e = (e) ? e : event;
	var imgTag = (e.srcElement) ? e.srcElement : e.target;
	imgTag.src = imgTag.src.replace("_f1","_f2");
}

//mouseout
function restoreImage(e){
	e = (e) ? e : event;
	var imgTag = (e.srcElement) ? e.srcElement : e.target;
	imgTag.src = imgTag.src.replace("_f2","_f1");
}

//mouseover（mapタグの場合）
function swapImageMap(e){
	e = (e) ? e : event;
	var areaTag = (e.srcElement) ? e.srcElement : e.target;
	var mapTag = areaTag.parentNode;
	var mapTagId = mapTag.id;
	var allImageTags = document.getElementsByTagName('img');
	var swapImageTags = new Array();
	
	for(var i=0; i < allImageTags.length; i++){
		if(allImageTags[i].src.indexOf('_f1',0)){
			swapImageTags.push(allImageTags[i]);
		}
	}
	
	
	for(var i = j = 0; i < mapTag.getElementsByTagName('area').length; i++){//ここでマウスオーバーしたareaがどこなのか判定（_f○○の数字を知るため）
		if(mapTag.getElementsByTagName('area')[i].shape != null){
			j++;
			if(mapTag.getElementsByTagName('area')[i] == areaTag){
				var areaNo = j+1;
			}
		}
	}
	
	for(var i = 0; i < swapImageTags.length; i++){//全imgタグからマウスオーバーがあったareaタグの親のmapタグのidと同じusemapを持つimgタグを探し画像名を置換
		if(swapImageTags[i].useMap){
			var useMap = swapImageTags[i].useMap.split("#")[1];
			if(useMap == mapTagId){
				var mapImgTag = swapImageTags[i];
				mapImgTag.src = mapImgTag.src.replace("_f1","_f" + areaNo);
			}
		}
	}
}

//mouseout（mapタグの場合）
function restoreImageMap(e){
	e = (e) ? e : event;
	var areaTag = (e.srcElement) ? e.srcElement : e.target;
	var mapTag = areaTag.parentNode;
	var mapTagId = mapTag.id;
	var allImageTags = document.getElementsByTagName('img');
	var swapImageTags = new Array();
	
	for(var i=0; i < allImageTags.length; i++){
		if(allImageTags[i].src.indexOf('_f1',0)){
			swapImageTags.push(allImageTags[i]);
		}
	}
	
	
	for(var i = 0; i < swapImageTags.length; i++){//全imgタグからマウスオーバーがあったareaタグの親のmapタグのidと同じusemapを持つimgタグを探し画像名を置換
		if(swapImageTags[i].getAttribute("usemap")){
			var useMap = swapImageTags[i].getAttribute("usemap").split("#")[1];
		}
		if(useMap == mapTagId){
			var mapImgTag = swapImageTags[i];
			mapImgTag.src = mapImgTag.src.replace(/_f[0-9][0-9]?/,"_f1");
		}
	}
}

//あらかじめ画像名に'_f1'があるimgタグにロールオーバーをセット
function rolloverImgset(){
	var allImageTags = document.getElementsByTagName('img');
	var swapImageTags = new Array();
	
	for(var i=0; i < allImageTags.length; i++){
		if(allImageTags[i].src.indexOf('_f1',0) != -1){
			swapImageTags.push(allImageTags[i]);
		}
	}
	
	if(swapImageTags != ""){
		var len = swapImageTags.length;
		var getMapTag = document.getElementsByTagName('map');
		var mapLen = getMapTag.length;
		var swapImages = new Array();
		for(var i = 0; i < len; i++) {
			if(swapImageTags[i].useMap) { //mapタグ
				for(var a = 0; a < mapLen; a++) {
					if(swapImageTags[i].useMap.split('#')[1] == getMapTag[a].id) { //マウスオーバーがあった画像のusemapと同じidを持つmapタグなら処理
						var areaLen = getMapTag[a].getElementsByTagName('area').length;
						swapImages[i] = new Array();
						for(var b = 0; b < areaLen; b++) {
							swapImages[i][b] = new Image();
							swapImages[i][b].src = swapImageTags[i].src.replace("_f1","_f" + (b + 2)); //画像プリロード
						}
						getMapTag[a].onmouseover = swapImageMap;
						getMapTag[a].onmouseout = restoreImageMap;
					}
				}
			}
			else{ //imgタグ
				swapImages[i] = new Image();
				swapImages[i].src = swapImageTags[i].src.replace("_f1","_f2"); //画像プリロード
				swapImageTags[i].onmouseover = swapImage;
				swapImageTags[i].onmouseout = restoreImage;
			}
		}
	}else{
		return false;
	}
}
addOnloadHandle("rolloverImgset();");





/***********************************************/ 
/* popup window */
/***********************************************/ 

/* スクロールバー無し */
function popWin1(theURI,windowName,Width,Height){
	PopUpWin = window.open(
		theURI,windowName,'scrollbars=0,width=' + Width + ',height=' + Height + ',resizable=1,directories=0,toolbar=0,status=1,location=0'
		);
	PopUpWin.focus();
	}

/* スクロールバー有り */
function popWin2(theURI,windowName,Width,Height){
	PopUpWin = window.open(
		theURI,windowName,'scrollbars=1,width=' + Width + ',height=' + Height + ',resizable=1,directories=0,toolbar=0,status=1,location=0'
		);
	PopUpWin.focus();
	}





/***********************************************/ 
/* IE6でロールオーバーをCSSで行う際のちらつきをおさえる */
/***********************************************/ 

try {
	document.execCommand('BackgroundImageCache', false, true);
} catch(e) {}



/***********************************************/ 
/* 問い合わせフォーム用 */
/***********************************************/ 

function check_num(obj){

    //数字かどうかのチェック
    if (obj.value.length > 0){
        if(isNaN(obj.value)){
            alert("半角数字を入力してください。");        //警告コメント
	    obj.focus(); 
        }
    }
}

function check_char(obj){

    //半角英数字でないとき
    if (obj.value.length > 0){
        if(checkRoman(obj.value) == false){
            obj.focus();
            obj.select();
            //警告コメント
            alert("半角英数字で入力して下さい。")
            return false;
        }
    }
}

function check_tel_num(obj){

    //半角英数字でないとき
    if (obj.value.length > 0){
        if(checkTelchar(obj.value) == false){
            obj.focus();
            obj.select();
            //警告コメント
            alert("半角英数字で入力して下さい。")
            return false;
        }
    }
}

//半角英数字の判別
function checkRoman(msg){
    var i,msg2;
    //許容範囲を増やす場合はここで文字を増やせばよい
    var checkStr = new String   ("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.@-_/");
    //スペースを取り除く
    msg2 = msg.replace(/ /g,"");
    if(msg2.length == 0){
        return false;
    }
    for(i=0;i<msg2.length;i++){
        if(checkStr.indexOf(msg2.charAt(i),0) == -1){
            return false;
        }
    }
    return true;
}

//半角英数字（電話番号用）の判別
function checkTelchar(msg){
    var i,msg2;
    //許容範囲を増やす場合はここで文字を増やせばよい
    var checkStr = new String   ("0123456789-()");
    //スペースを取り除く
    msg2 = msg.replace(/ /g,"");
    if(msg2.length == 0){
        return false;
    }
    for(i=0;i<msg2.length;i++){
        if(checkStr.indexOf(msg2.charAt(i),0) == -1){
            return false;
        }
    }
    return true;
}




