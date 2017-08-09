//var x,y,max;
//x = Math.random();
//y = Math.random();
//max = x>y?x:y;




//var today,year,is_leap_year
//today = new Date();
//year = today.getFullYear();
//is_leap_year = ((year%4==0 && year%100!=0) || (year%400==0));
//document.write("本年");document.write(is_leap_year?"是闰年":"不是闰年");

//var condition = prompt("请输入");
//  condition = parseInt(condition);
//switch (condition){
//    case condition <14:
//        document.write(儿童);
//        break;
//    case condition >=14|| condition<24:
//        document.write(青少年);
//        break;
//    case condition >=24|| condition<40:
//        document.write(青少年);
//        break;
//}


//3.编写程序，计算10!(即 1*2*3＊·…10）的结果(10的阶乘)。
//var fac,i;
//fac=1;
//for(i=1;i<=10;i++) fac *= i;
//alert("10!=" + fac);


//编写程序，计算 1!+2!+3!+…..＋10！的结果。
//var fac, i,sum_fac;
//fac=1;
//sum_fac=0;
//for(i=1;i<=10;i++) {
//    fac *=i;
//    sum_fac+=fac;
//}
//alert("1!+2!+3!+…..＋10！="+sum_fac);
//
//
//



//5.在页面上输出如下数字图案。
//1
//1 2
//1 2 3
//1 2 3 4
//1 2 3 4 5
//其中，每行的数字之间有一个空格间隔。


//var i,line;
//for(line=1;line<=5;line++)
//{
//    document.write("    ");
//        for(i=1;i<=line;i++)
//            {
//                document.write(i);
//                if (i>0) document.write(" ");
//            }
//    document.write("<br>");
//}




//6.在页面上输出如下图案。
//
//其中，每行的星号"*"之间有一个空格间隔。


//var i,line;
//for(line=1;line<=5;line++)
//{
//    document.write("    ");
//    for(i=1;i<=5-line;i++) document.write(" ");
//    for(i=1;i<=line;i++)
//    {
//        document.write("*");
//        if (i>0) document.write(" ");
//    }
//    document.write("<br>");
//}
//


//7.有一个三位数x，被4除余2，被7除余3，被9除余5，请求出这个数。


//var x;
//for(x=100;x<=999;x++)
//{
//    if (x%4==2 && x%7==3 && x%9==5)
//        document.write("x=" + x + "<br>");
//}
//


//8.求所有满足条件的四位数ABCD，它是13的倍数，且第3位数加上第2位数等于第4位数（即：A=B+C）。
// （提示：对于四位数的整数x，通过Math.floor(x/1000)可求出第4位的数字，其他位数的提取也类似） 

//var nb=0,n,x,A,B,C;
//for(n=1000;n<=9999;n++)
//{
//    if (n%13 != 0) continue;
//    x = n;
//    A = Math.floor(x/1000);
//    x %= 1000;
//    B = Math.floor(x/100);
//    x %= 100;
//    C = Math.floor(x/10);
//    x %= 10;
//    if (A == B+C)
//    {
//        nb += 1;
//        document.write(n + "   ");
//        if (nb%10 == 0) document.write("\n");
//    }
//}
//document.write("\n\n");
//document.write("共有" + nb + "个满足条件的数");

//1.编写一个函数 f(x) = 4x2+3x+2，使用户通过提示对话框瑜入x的值，能得到相应的计算结果。
//
//    function f(x)
//    {
//        return 4*x*x + 3*x + 2;
//    }
//
//var x;
//x = prompt("x=","0");
//alert("f("+x+")=" + f(x));
//

//2.编写一个函数Min(x,y)求出x,y这两个数中的最小值，要求x,y的值由用户通过提示对话框输入。
//function f(x,y)
//{
//    if(x>y)
//    return y;
//    else
//    return x;
//}
//var x,y;
//x = prompt("x=","0");
//y = prompt("y=","0");
//alert(f(x,y));



//编写一个判断某个非负整数是否能够同时被3,5,7整除的函数，
//然后在页面上输出1~1000之间所有能同时被3,5,7整除的整数，并要求每行显示6个这样的数。



//    function IsThatNumber(i)
//    {
//        return i%3==0 && i%5==0 && i%7==0;
//    }
//var n,nb=0;
//for(n=1;n<1000;n++)
//{
//    if (IsThatNumber(n))
//    {
//        if (nb%6 > 0) document.write(",");
//        nb++;
//        document.write(n);
//        if (nb%6 == 0) document.write("<br>");
//    }
//}
//
//document.write("<br>");
//document.write("共有"+nb+"个数");



//4.在页面上编程输出100~1000之间的所有素数，并要求每行显示6个素数。


//
//
//    function IsPrime(n)
//    {
//        if (n<1) return false;
//        var i;
//        for(i=2;i<n;i++) if(n%i==0) return false;
//        return true;
//    }
//
//var n,nb=0;
//for(n=100;n<1000;n++)
//{
//    if (IsPrime(n))
//    {
//        if (nb%6 > 0) document.write(",");
//        nb++;
//        document.write(n);
//        if (nb%6 == 0) document.write("<br>");
//    }
//}
//
//document.write("<br>");
//document.write("共有"+nb+"个素数");
//





//5.编写一个非递归函数factorial(n)，计算12!-10!的结果。


//编制一个从字符串中收集数字字符（"0"',"1"，…"9"）的函数CollectDigits(s)，
// 它从字符串s中顺序取出数字，并且合并为一个独立的字符串作为函数的返回值。
// 例如函数调用CollectDigits("1abc23def4"）的返回值是字符串"1234"。
//function CollectDigits(source)
//    {
//        var s = new String(source),       result="",       ch,    i
//        for(i=0;   i<s.length;   i++)
//        {
//            ch = s.charAt(i);
//            if (ch>="0" && ch <= "9") result += ch;
//        }
//        return result;
//    }
//
//var s;
//s = prompt("请输入一个含有数字的字符串:","");
//alert("收集的数字串:\n"+CollectDigits(s));
//







//编制一个将两个字符串交叉合并的函数Merge(s1,s2)
// 例如Merge("123","abc"）的返回结果是"1a2b3c"，
// 如果两个字符串的长度不同，那么就将多余部分直接合并到结果字符串的末尾，
// 如Merge("123456",''abc''）的返回结果是”1a2b3c456”。
//
function Merge(str1,str2)
    {
        var s1 = new String(str1),s2=new String(str2),result="",max_len,i
        max_len = Math.max(s1.length,s2.length)
        for(i=0;i<max_len;i++)
        {
            if (i<s1.length) result += s1.charAt(i)
            if (i<s2.length) result += s2.charAt(i)
        }
        return result;
    }

var s1,s2;
s1 = prompt("请输入第一个字符串:","");
s2 = prompt("请输入第二个字符串:","");
alert("合并后的字符串:\n"+Merge(s1,s2));






































