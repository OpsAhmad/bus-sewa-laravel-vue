<template>
  <div id="app">
       <div class="wrapper">
          <div class="box">
              <h1>Register</h1>
            <div class="error" v-if="Object.keys(error).length > 0">
                <div class="error-item text-danger" v-for="key in Object.keys(error)" :key="key">
                    {{error[key][0]}}
                </div>
            </div>
              <form action="" method="post" @submit.prevent="submit" class="form">
                <div class="form-group">
              <input type="text" name="name" v-model="user.name" class="form-control" placeholder="name">
                </div>
              <br>
              <br>
              <input type="email" name="email" v-model="user.email" placeholder="email">
              <br>
              <br>
              <input type="password" name="password" v-model="user.password" placeholder="password">
              <br>
              <br>
              <input type="password" name="c_password" v-model="user.c_password" placeholder="confirm password">
              <br>
              <br>
              <div>
                <button type="submit" class="float-right">Register</button>
            <router-link to="/login">Login</router-link>
              </div>
            </form>
            <br>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:"register",
    data:function()
    {
        return{
            user:{},
            error:{}
        }
    },
    methods:{
        submit(){
            this.$axios.post('http://127.0.0.1:8000/user/register',this.user)
            .then((response)=>{
               localStorage.setItem('remember_token',response.data.remember_token);
               alert('successful register');
               this.$router.push({name:"home"});
            }).catch((error)=>{
                this.error = error.response.data
                console.log(error.response);
                // alert('error');
            })
        }
    }
}
</script>

<style>

</style>