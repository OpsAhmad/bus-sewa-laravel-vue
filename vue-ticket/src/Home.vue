<template>
  <div id="app">
      <div class="wrapper" v-if="render">
          <div class="box" v-if="login">
              <h1>Helo Mr. {{this.user.name}}</h1>
                <div class="d-flex justify-content-center">
              <router-link to="/ticket" class="mr-2">View ticket</router-link>
              <a @click="logout">Logout</a>
                </div>
          </div>
          <div class="box" v-else>
              <h1>Please login first</h1>
              <div class="d-flex justify-content-center">
              <router-link to="/login" class="mr-2">Login</router-link>
              <router-link to="/register">Register</router-link>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:"home",
    data:function()
    {
        return{
            user:{},
            login:false,
            render:false
        }
    },
    beforeCreate(){
        var token = localStorage.getItem('remember_token')
        if(token){
            this.$axios.get('http://127.0.0.1:8000/user/detail?token='+token).then((response) => {
                this.user = response.data.user;
                this.login = true;
                this.render = true;
            }).catch(()=>{
                this.login = false;
                this.render = true;
            })
        }else{
            this.login = false;
            this.render = true;
        }
    },
    methods:{
        logout()
        {
            localStorage.clear();
            this.$router.push({name:"login"});
        }
    }
}
</script>

<style>

</style>