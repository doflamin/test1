/**
 * Created by 铁铭 on 2017/7/13.
 */
function $(selector, context) {
    context = context || document;
    var elements = [];
    switch(selector.charAt(0)){
        case '#': //id
            elements = [document.getElementById(selector.substring(1))];
            break;
        case '.': //class
            elements = getByClass(selector.substring(1), context);
            break;
        default: //tag
            elements = context.getElementsByTagName(selector);
            break;
    }

    return {
        click: function (fn) {
            for(var i=0; i<elements.length; i++){
                addEvent(elements[i], 'click', fn);
            }
            return this;
        },
        mouseover: function (fn) {
            for(var i=0; i<elements.length; i++){
                addEvent(elements[i], 'mouseover', fn);
            }
            return this;
        },
        mouseout: function (fn) {
            for(var i=0; i<elements.length; i++){
                addEvent(elements[i], 'mouseout', fn);
            }
            return this;
        },
        css: function (attr, value) {
            if(value){//如果给value传了值
                for(var i=0; i<elements.length; i++){
                    elements[i].style[attr] = value;
                }
                return this;
            }else{
                if(typeof attr === 'string'){
                    return getStyle(elements[0], attr);
                }else{
                    for(var p in attr){
                        switch(p){
                            case 'width':
                            case 'height':
                            case 'padding':
                            case 'paddingLeft':
                            case 'paddingRight':
                            case 'paddingTop':
                            case 'paddingBottom':
                                value = /\%/.test(attr[p])?attr[p]:Math.max(parseInt(attr[p]), 0) + 'px';
                                break;
                            case 'left':
                            case 'top':
                            case 'bottom':
                            case 'right':
                            case 'margin':
                            case 'marginLeft':
                            case 'marginRight':
                            case 'marginTop':
                            case 'marginBottom':
                                value = /\%/.test(attr[p])?attr[p]:parseInt(attr[p]) + 'px';
                                break;
                            default:
                                value = attr[p];
                        }
                        for(var i=0; i<elements.length; i++){
                            elements[i].style[p] = value;
                        }
                    }
                    return this;
                }
            }
        },
        next: function () {
            var elem = elements[0];
            do{
                elem = elem && elem.nextSibling;
            }while(elem && elem.nodeType != 1);
            return elem;
        }
    };
}
function getByClass(className,context) {
    context = context||document;
    var result = [];
    var arr = context.getElementsByTagName('*');
    var re = new RegExp('\\b'+className+'\\b');
    for(var i=0;i<arr.length;i++){
        if(re.test(arr[i].className)){
            result.push(arr[i]);
        }
    }
    return result;
}



function next(elem){
    do{
        elem = elem &&elem.nextSibling;
    }
        while(elem && elem.nodeType !=1);
        return elem;
}
function prev(elem){
    do{
        elem = elem &&elem.previousSibling;
    }
    while(elem && elem.nodeType !=1);
    return elem;
}
function first(elem){
    elem = elem.firstChild;
    return elem && elem.nodeType == 1 ? elem : next(elem);
}
function last(elem) {
    elem = elem.lastChild;
    return elem && elem.nodeType == 1 ? elem : prev(elem);
}
function before(elem,newNode){
    elem.parentNode.insertBefore(newNode,elem);
}
function after(elem,newNode){
    if(elem.nextSibling){
        before(elem.nextSibling,newNode);
    }else{
        elem.parentNode.appendChild(newNode);
    }
}

function remove(elem){
    elem.parentNode.removeChild(elem);
}
function siblings(elem){
    var arr = [];
    var elements = elem.parentNode.children;
    for(var i=0;i<elements.length;i++){
        if(elements[i] != elem){
            arr.push(elements[i])
        }
    }
    return arr;
}
function cloneObj(obj){
    var nowObj = {};
    for(var p in obj){
        if(typeof obj[p] === 'object'){
            nowObj[p] =arguments.callee(obj[p]);
        }
        else{
            nowObj[p] = obj[p];
        }
    }
    return nowObj;
}
function extend (target,obj){
    for(var p in obj){
        if(typeof  obj[p] === "object"){
            target[p] = cloneObj(obj[p]);
        }else{
            target[p] = obj[p];
        }
    }
    return target;
}
function getStyle(elem,attr){
    if(elem.currentStyle){
        return elem.currentStyle[attr];
    }else if(window.getComputedStyle){
        return getComputedStyle(elem,false)[attr];
    }else{
        return elem.style[attr];
    }
}
function addEvent(elem,type,fn){
    if(elem.addEventListener){
        elem.addEventListener(type,fn,false)
    }else if(elem.attachEvent){
        elem[type+fn] = function(){
            fn.call(elem);
        };
        elem.attachEvent('on'+type,elem[type+fn])
    }else{
        elem['on' + type] = fn;
    }
}
function removeEvent(elem,type,fn){
    if(elem.removeEventListener){
        elem.removeEventListener(type,fn,false);
    }else if(elem.detachEvent){
        elem.detachEvent('on'+type,elem[type+fn]);
    }else{
        elem['on' + type] = null;
    }
}


function getByClass(className,contest){
    var reslt = [];
    var arr = contest.getElementsByTagName("*");
    var re = new RegExp("\\b" + className +'\\b');

}









