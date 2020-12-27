import moment from 'moment';
import Vue from 'vue'
Vue.filter('timeFormat',(arg)=>{
  return  moment(arg).format('MMMM DD YYYY');
})

// Vue.filter('sortlength',function (text,length,suffix) {
//   return text.substring(0,length)+suffix;
// })

Vue.filter('sortlength',function (text,length,suffix){
  return text.substring(0,length)+suffix;
})