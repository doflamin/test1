<template>
  <div class = "photo"> 
      <commom-header title="photo" bgColor="rgb(63,81,181)"></commom-header>
      <common-footer></common-footer>
  </div>
</template>
<script>
import CommonHeader from "../common/CommonHeader";
import CommonFooter from "../common/CommonFooter";
export default {
  data() {
    return {
      bgColor: "rgb(63, 81, 181)"
    };
  },
  components: {
    CommonHeader,
    CommonFooter
  }
};
</script>
<style>

</style>
