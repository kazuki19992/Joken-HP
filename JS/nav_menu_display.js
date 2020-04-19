const OPEN = '開く';
const CLOSE = '閉じる';

// 初期状態ではextra以外のすべてのメニュー項目を非表示にしておく
hide_classes('nv_Link');
hide_classes('nv_Link1');
hide_classes('nv_Link2');
hide_classes('nv_Link3');

budge_text_changer('extra_budge', CLOSE);
budge_text_changer('link_budge', OPEN);
budge_text_changer('link1_budge', OPEN);
budge_text_changer('link2_budge', OPEN);
budge_text_changer('link3_budge', OPEN);

function menu_display_toggle(class_name, budge_id){
    var toggle_budge = document.getElementById(budge_id);
    var toggle_class = document.getElementsByClassName(class_name);

    for(i = 0; i < toggle_class.length; i++){
        if(toggle_class[i].style.display == "block"){
            // 非表示
            budge_text_changer(budge_id, OPEN);
            toggle_class[i].style.display = "none";
        }else{
            // 表示
            budge_text_changer(budge_id, CLOSE);
            toggle_class[i].style.display = "block";
        }
    }
}

function hide_classes(class_name){
    var hide_class_name = document.getElementsByClassName(class_name);
    for(var i = 0; i < hide_class_name.length; i++) {
        hide_class_name[i].style.display = "none";
    }
}

function budge_text_changer(link_budge_id, change_text){
    var init_budge_id = document.getElementById(link_budge_id);
    console.log(init_budge_id.outerHTML);
    init_budge_id.outerHTML = '<span class="badge" id='+link_budge_id+' data-badge-caption='+change_text+'></span>';
}