import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Movie from '@/components/movie/Movie'
import Counter from '@/components/Counter'
import Music from '@/components/music/Music'
import Book from '@/components/book/Book'
import Photo from '@/components/photo/Photo'


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
    },
    {
      path:'/music' ,
      name:'music',
      component:Music
    },
    {
      path:'/book' ,
      name:'bookr',
      component:Book
    },
    {
      path:'/photo' ,
      name:'photo',
      component:Photo
    }
  ]
})
