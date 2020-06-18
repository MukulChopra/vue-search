<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="container" id="app">
    <div class="row">
        <div class="col-sm-8">
            <h1>Search Users</h1>
            <div class="panel panel-default">
                <div class="panel-heading">Please Enter first name for Search</div>
                <div class="panel-body">
                    <autocomplete></autocomplete>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    Vue.component('autocomplete', {
      template: '<div><input type="text" placeholder="First name?" v-model="searchquery" v-on:keyup="autoComplete" class="form-control"><div class="panel-footer" v-if="data_results.length"><ul class="list-group"><li class="list-group-item" v-for="result in data_results"> <p v-if="result.type === 1" class="male-class" style="background-color: lightskyblue;height: 10px;"> <p v-else-if="result.type === 2" class="female-class" style="background-color: pink; height: 10px;"></p> <h5>{{ result.label.toUpperCase() }}</h5><h5>Origin :{{ result.origin }}</h5><h5 class="list-inline-item" v-if="result.gender == 1">Gender:Male</h5><h5 v-else="result.gender == 2">Gender:Female</h5></li></ul></div></div>',
      data: function () {
        return {
          searchquery: '',
          data_results: [],
        }
      },
      methods: {
        autoComplete(){
        this.data_results = [];
        if(this.searchquery.length > 1){
         axios.get('/autocomplete/search',{params: {searchquery: this.searchquery}}).then(response => {
            console.log(response);
          this.data_results = response.data;
         });
        }
       }
      },
    })

    const app = new Vue({
        el: '#app'
    });
</script>

</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\code-test\resources\views/vuejsAutocomplete.blade.php ENDPATH**/ ?>