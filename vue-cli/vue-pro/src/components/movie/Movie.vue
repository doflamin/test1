<template>
  <div class="movie">
      <common-header title="movie" bgColor="rgb(33, 150, 243)"></common-header>
      <movie-nav></movie-nav>
      <router-view></router-view>
      <div class='loading' v-show="isShow">
          <img src="/static/img/loading.gif" alt="">
      </div>
      <common-footer bgColor="rgb(33, 150, 243)"></common-footer>
  </div>
</template>

<script>
import CommonHeader from "../common/CommonHeader";
import CommonFooter from "../common/CommonFooter";
import MovieNav from "./MovieNav";
import MovieList from "./MovieList";
import Axios from "axios";
export default {
  props: ['bgColor'],
  data() {
    return {
      movieList: [],
      isShow: false
    };
  },
  components: {
    CommonHeader,
    CommonFooter,
    MovieNav,
    MovieList
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.list{
       margin: 2rem 0 1.6rem;
    }
.loading {
  margin-bottom: 1rem;
  text-align: center;
}
</style>
