<template>
    <div class="row mt-10">
        <template v-for="category in categories">
            <div class="col-6 p-8">
                <router-link :to="'/category/' + category.id" class="btn btn-primary w-100 h-100 p-20">{{category.category}}</router-link>
            </div>
        </template>



    </div>

</template>

<script>
import ApiService from "../../../core/services/ApiService";

import Swal from "sweetalert2/dist/sweetalert2";

export default {
    name: "ChooseCategory",
    components: {},
    data(){
        return {
            categories:[],

        }
    },
    methods:{

    },
    computed:{

    },
    created(){
        ApiService.setHeader();
        ApiService.get("axios/get-categories")
            .then(({ data }) => {
                console.log(data)
                if(data.success === 'success'){
                    this.categories = data.categories
                   console.log(data,'5555555555555555555555 get-categories')
                }else{
                    Swal.fire({
                        text: data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                }

            })
            .catch(({ response }) => {
                console.log(response, 'store-question response  error')

            });
    }
}
</script>

<style scoped>

</style>
