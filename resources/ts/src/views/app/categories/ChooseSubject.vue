<template>
    <template v-if="category">

        <div class="card">

            <div class="card-body p-0">
                <div class="px-9 pt-7 bg-success card-rounded h-275px w-100">
                    <div class="d-flex text-center flex-column text-white pt-8">
                        <span class="fw-bolder fs-2x pt-1">{{category.category}}</span>
                    </div>
                </div>
                <div class="shadow-xs card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 bg-white"
                     style="margin-top: -100px">

                    <div v-for="subject in category.subjects">
                        <div class="mb-7">
                            <div class="d-flex align-items-center flex-wrap w-100">
                                <div class="mb-1 pe-3 flex-grow-1">
                                    <button :disabled="buttonsDisabled" type="button" @click="generateTest(subject.id)" class="fs-5 text-gray-800 btn btn-light-warning text-hover-white fw-bolder">{{subject.name}}</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </template>
</template>

<script>
import ApiService from "../../../core/services/ApiService";
import {useRoute, useRouter} from "vue-router";

export default {
    name: "ChooseSubject",
    data(){
        return {
            category:{},
            buttonsDisabled:false
        }

    },
    methods:{

        generateTest(id){
            /*this.buttonsDisabled = true*/
            const params = {subject_id:id};
            ApiService.setHeader()
            ApiService.post("/axios/generate-test", params)
                .then(({ data }) => {
                    if(data.success === 'success'){
                        this.$router.push({path: '/test/' + data.test.id})

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
                    console.log(response, "/axios/generate-test/")

                });
        }
    },
    created(){

        const route = useRoute();
        ApiService.get("/axios/get-subjects/" + route.params.id)
            .then(({ data }) => {
                if(data.success === 'success'){
                    this.category = data.category
                    console.log(data,'axios/get-subjects')
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
                console.log(response, "/axios/get-subjects/" + route.params.id)

            });

    }
}
</script>

<style scoped>

</style>
