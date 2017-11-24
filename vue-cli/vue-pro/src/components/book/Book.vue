<template>
  <div class="book">
        <common-header title="photo" bgColor="rgb(121, 85, 72)"></common-header>
        <common-footer></common-footer>
    </div>
</template>
<script>
   import CommonHeader from "../common/CommonHeader"
import CommonFooter from "../common/CommonFooter"
export default {
    data(){
        return {
            bgColor: "rgb(63, 81, 181)"
        }
    },
    components: {
      CommonHeader,
      CommonFooter
  }
} 
</script>
<style>

</style>
