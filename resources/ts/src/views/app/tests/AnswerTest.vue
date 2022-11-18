<template>
    <TestQuestion @submit="questionAnswered" :order="currentQuestionIndex + 1" :question="currentQuestion" />

</template>

<script>
import ApiService from "../../../core/services/ApiService";
import TestQuestion from "../../../app/components/tests/TestQuestion";
import Swal from "sweetalert2/dist/sweetalert2";
import router from "../../../router";

export default {
    name: "AnswerTest",
    components: {TestQuestion},
    data(){
        return {
            currentQuestionIndex:0,
            questions:[],
            startDate:null,
            test_id:null,
        }
    },
    methods:{
        questionAnswered(data){
            const params = {
                test_id:this.test_id,
                question_id:data.question.id,
                answers:data.answers
            };
            ApiService.setHeader()
            ApiService.post("/axios/save-step", params)
                .then(({ data }) => {
                    if(data.success === 'success'){
                        this.currentQuestionIndex++
                        console.log(this.test_id)

                        if(this.currentQuestionIndex >= this.questions.length){
                            router.push({path:'/statistics/' + this.test_id})
                        }
                    }
                    console.log(data, 'save-step response')
                })
                .catch(({ response }) => {
                    console.log(response, 'save-step response  error')

                });
        }
    },
    computed:{
        currentQuestion(){
            return this.questions[this.currentQuestionIndex]
        }
    },
    created(){
        ApiService.setHeader();
        ApiService.get("/axios/get-test/" + this.$route.params.id)
            .then(({ data }) => {
                if(data.success === 'success'){
                    if(data.test.status === 'started'){
                        this.currentQuestionIndex = data.test.step - 1
                        this.test_id = data.test.id
                        Object.assign(this.questions,data.test.questions)
                    }else{
                        router.push({path:'/statistics/' + data.test.id})
                    }

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
