<template>
<div class="header" :style="{background:bgColor}">
      <button :style="{background:bgColor}">首页</button>
      <h2>{{title}}</h2>
</div>

</template>



<script>
   export default {
   props: ['title','bgColor'],
  data () {
    return {
      
    }
  }
} 

</script>



<style scoped>
 .header{
        height    : 1rem;
        background: rgb(33, 150, 243);
        display   : flex;
        color     : #fff;
        position  : fixed;
        top       : 0;
        width     : 100%;
      }
      .header button{
        width : 1rem;
        height: 1rem;
        color : #fff;
        line-height: 1rem;
        font-size: 20px;
   
        border:0px;
        outline:none;        
      }
      .header h2{
        flex       : 1;
        text-align : center;
        text-indent: -1rem;
      }

</style>