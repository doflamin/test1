import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Movie from '@/components/movie/Movie'
import Counter from '@/components/Counter'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path:"/movie",
      component: Movie
      
      
    },
    {
      path:'/counter' ,
      name:'counter',
      component:Counter
    }
  ]
})
