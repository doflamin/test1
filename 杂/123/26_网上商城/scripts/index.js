$(function(){
    //输入框
    $("#inputSearch").on("focus",function(){
        if(this.value == this.defaultValue){
            this.value = "";
        }
    }).on("blur", function(){
        if(this.value == ""){
            this.value = this.defaultValue;
        }
    });
    //二级菜单
    $("#nav li").hover(function(){
        $(this).children(".jnNav").show();
    },function(){
        $(this).children(".jnNav").hide();
    });
    //hot
    $(".promoted").append("<span class='hot'></span>");
    //调整图片的层级
    var $imgs = $("#JS_imgWrap img");
    $imgs.each(function(index, elem){
        $(elem).css({
            zIndex : 5 - index
        });
    });
    //切换
    var nowIndex = 0;
    var $menus = $("#menu a");
    var timer;
    function play(){
        timer = setInterval(function(){
            nowIndex++;
            if(nowIndex == $imgs.length){
                nowIndex = 0;
            }
            changeImg();
        }, 1000);
    }
    play();
    $menus.hover(function(){
        clearInterval(timer);
        nowIndex = $(this).index();
        changeImg();
    },function(){
        play();
    });
    //$menus.on("mouseover", function(){
    //    clearInterval(timer);
    //    nowIndex = $(this).index();
    //    changeImg();
    //});
    //$menus.on("mouseout",function(){
    //    play();
    //});

    function changeImg(){
        $menus.eq(nowIndex).addClass("chos").siblings().removeClass("chos");
        $imgs.eq(nowIndex).stop().fadeIn().siblings().stop().fadeOut();
    }
    //品牌活动
    $("#jnBrandTab li").on("click", function(){
        $(this).addClass("chos").siblings().removeClass("chos");
        $("#jnBrandList").animate({
            left: -$("#jnBrandList li").innerWidth() * 4 * $(this).index()
        }, 1000);
    });
    //tooltip
    tooltip("#jnNoticeInfo li a");
    tooltip(".jnCatainfo a");

















});