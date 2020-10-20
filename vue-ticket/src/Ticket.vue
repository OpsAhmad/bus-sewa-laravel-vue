<template>
  <div id="app">
      <div class="wrapper">
          <div class="box">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <th>No</th>
                          <th>Brand</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          <tr v-for="(bus,index) in Buses" :key="bus.id">
                              <td>{{index + 1}}</td>
                              <td>{{bus.brand}}</td>
                              <td><a class="btn btn-sm btn-primary">Detail</a></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:"ticket",
    data:function(){
        return{
            Buses:{},
        }
    },
    beforeCreate(){
        this.$axios.get('http://127.0.0.1:8000/ticket/all').then((response)=>{
            this.Buses = response.data.bus;
        });
    }
}
</script>

<style>

</style>