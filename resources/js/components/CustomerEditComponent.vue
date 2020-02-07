<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Customer Info: #{{customer.name}}</div>

                    <div class="card-body">
                       <form method="POST" action="">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="customer.name" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" v-model="customer.phone" required >

                              
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" v-model="customer.address"  required>

                              
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" @click.prevent="customerUpdateData()" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['customer'],
        data(){
            return{
                customers: {},
                name: '',
                phone: '',
                address: '',
            }
        },
        mounted() {
            console.log(this.customer);
            this.customerList();
        },
        methods:{
            customerUpdateData(){
                axios.post('/customer-update/'+this.customer.id,{
                    name: this.customer.name,
                    phone: this.customer.phone,
                    address: this.customer.address,
                })
                .then(res => {
                    
                    console.log(res);
                    location = '/';
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
        }
    }
</script>
