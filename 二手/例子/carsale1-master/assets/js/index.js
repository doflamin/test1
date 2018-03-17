/**
 * Created by lenovo on 2017/3/15.
 */

require(['jquery.min','carousel'],function($,Carousel){
    var car1 = new Carousel();
    car1.init({
        selector:'#content',
        //buttonStyle:'square',
        speed:1000,
        imgData:['img/indeximages/1.jpg','img/indeximages/2.jpg','img/indeximages/3.jpg','img/indeximages/4.jpg']
    });
});
