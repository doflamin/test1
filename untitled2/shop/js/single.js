/**
 * Created by ÌúÃú on 2017/6/18.
 */
(function(){
    var oSmallPic = document.getElementById("small-pic");
    var aSmallImgs = oSmallPic.getElementsByTagName("img");
    var oBigPic = document.getElementById("big-pic");
    var oBigImg = oBigPic.getElementsByTagName("img")[0];
    var oLeft = document.getElementById("left");
    var oRight = document.getElementById("right");
    var nowIndex = 0;


        for(var i = 0;i<aSmallImgs.length;i++){
            aSmallImgs[i].index = i;
            aSmallImgs[i].onclick = function(){
                nowIndex = this.index;
                changeImg();
            }
        }

        oLeft.onclick = oRight.onclick = function(){
            if(this === oRight){
                nowIndex++;
                if(nowIndex == aSmallImgs.length){
                    nowIndex = 0;
                }
            }else{
                nowIndex--;
                if(nowIndex == -1){
                    nowIndex = aSmallImgs.length - 1;
                }
            }
            changeImg();

        };

        function changeImg(){
            oBigImg.src = aSmallImgs[nowIndex].src;
            oMagnifyImg.src = aSmallImgs[nowIndex].src;
            for(var i=0; i<aSmallImgs.length; i++){
                aSmallImgs[i].className = "";
            }
            aSmallImgs[nowIndex].className = "selected";

            var left = 0;
            if(nowIndex == 0){
                left = 0;
            }else{
                if(nowIndex == 1){
                    left = 0;
                }else{
                    left = 1;
                }

            }


            animate(oSmallPic, {
                left: -(aSmallImgs[0].offsetWidth + 10) * left
            });//¶¯»­


        }
        var oDrag = document.getElementById("drag");
        var oMagnify = document.getElementById("magnify");
        var oMagnifyImg = oMagnify.getElementsByTagName("img")[0];
        var oSingle = document.getElementById("single");
        var oWrapper = oSingle.getElementsByClassName("wrapper")[0];
        var oMask = document.getElementById("mask");

        oMask.onmouseover = function(){
           oDrag.style.display = "block";
           oMagnify.style.display = "block";
       };
        oMask.onmouseout = function(){
            oDrag.style.display = "none";
            oMagnify.style.display = "none";
        };
        oMask.onmousemove = function(e){
            e = e||window.event;
            var oleft = e.pageX - oWrapper.offsetLeft - oDrag.offsetWidth/2;
            var otop =  e.pageY - oSingle.offsetTop -  oDrag.offsetHeight/2;

            if(oleft <= 0){
                oleft = 0;
            }
            if(otop <= 0){
                otop = 0;
            }
            var maxX = oBigPic.offsetWidth - oDrag.offsetWidth;
            if(oleft >maxX ){
                oleft = maxX;
            }
            var maxY = oBigPic.offsetHeight - oDrag.offsetHeight;
            if(otop >maxY ){
                otop = maxY;
            }
            oDrag.style.left = oleft +"px";
            oDrag.style.top = otop +"px";
            var scaleX = oleft/maxX;
            var scaleY = otop/maxY;
            oMagnifyImg.style.left = -scaleX * (oMagnifyImg.offsetWidth - oMagnify.offsetWidth) + "px";
            oMagnifyImg.style.top = -scaleY * (oMagnifyImg.offsetHeight - oMagnify.offsetHeight) + "px";

        };







}
)();