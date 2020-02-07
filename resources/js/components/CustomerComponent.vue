<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer Component</div>

                    <div class="card-body">
                       <form method="POST" action="">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="name" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" v-model="phone" required >

                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" v-model="address"  required>

                              
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" @click.prevent="customerDataSave()" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item active text-center">Customer List</li>
                        <li v-for="(customer,index) in customers" class="pl-5 list-group-item">
                           {{index+1}} => {{customer.name}} => {{customer.phone}} 
                           <a :href="'customer-edit/'+customer.id" class="ml-3 btn btn-sm btn-success">Edit</a> | 
                           <a href="javascript;" @click.prevent="customerDelete(customer.id,index)" class="btn btn-sm btn-danger">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                customers: {},
                name: '',
                phone: '',
                address: '',
            }
        },
        mounted() {
            //console.log('Component mounted.')
            this.customerList();
        },
        methods:{
            customerDataSave(){
                axios.post('/customer-save',{
                    name: this.name,
                    phone: this.phone,
                    address: this.address,
                })
                .then(res => {
                    
                    console.log(res);
                    location.reload();
                })
                .catch(err => {
                    console.log(err);
                })
            },
            customerList(){
                axios.get('/customer-list')
                .then(res =>{
                    this.customers = res.data;
                })
                .catch(err => {
                    console.log(err);
                })
            },
            customerDelete(id,index){
                alert("Are you sure to delete this?");
                axios.post('/customer-delete/'+id,{

                })
                .then(res =>{
                   location.reload();
                })
                .catch(err => {
                    console.log(err);
                })
            },
        }
    }
</script>
