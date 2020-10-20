<template>
  <div id="app">
      <div class="wrapper">
          <div class="box">
              <h1>Login</h1>
              <form action="" method="post" @submit.prevent="submit">
              <input type="email" name="email" v-model="user.email" placeholder="email">
              <br>
              <br>
              <input type="password" name="password" v-model="user.password" placeholder="password">
              <br>
              <br>
              <div>
                <button type="submit" class="float-right">Login</button>
            <router-link to="/register">Register</router-link>
              </div>
            </form>
            <br>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:"login",
    data:function()
    {
        return{
            user:{}
        }
    },
    methods:{
        submit(){
            this.$axios.post('http://127.0.0.1:8000/user/login',this.user).then((response)=>{
               localStorage.setItem('remember_token',response.data.remember_token);
               alert('successful login');
               this.$router.push({name:"home"});
            }).catch(()=>{
                alert('error');
            })
        }
    }
}
</script>

<style>

</style>