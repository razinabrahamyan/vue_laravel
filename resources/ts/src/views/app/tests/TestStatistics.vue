<template>
    <template v-if="test">
        <div class="row">
            <div class="col-6">
                <div class="card h-100">
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Արդյունք</span>
                        </h3>
                    </div>

                    <div class="card-body d-flex">
                        <div>
                            <i class="bi fs-2" :class="[percent >= 50 ? 'bi-check-square text-success':'bi-x-square text-danger']"></i>
                        </div>
                        <div class="d-flex flex-grow-1 ps-5 justify-content-between">
                            <div>
                                <template v-if="percent >= 50">
                                    <h3>Թեսթը հաջողված է</h3>
                                </template>
                                <template v-else>
                                    <h3>Թեսթը ձախողված է</h3>
                                </template>

                            </div>
                            <div class="">
                                <apexchart
                                    class="mixed-widget-4-chart"
                                    :options="chartConf"
                                    :series="[percent]"
                                    :height="200"
                                    type="radialBar">
                                </apexchart>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card h-100">
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Ժամանակ</span>
                        </h3>
                    </div>

                    <div class="card-body d-flex">
                        <div>
                            <i class="bi bi-clock fs-2"></i>
                        </div>
                        <div class="ps-5 flex-grow-1">
                            <h1 class="line-height-1">Ընդհանուր Ժամանակը</h1>
                            <div class="d-flex  mt-4">
                                <div>
                                    <h1 class="">{{turnIntoTime(testDuration)}}</h1>
                                </div>
                                <div class="mx-4">
                                    <h1 class="text-secondary">/</h1>
                                </div>
                                <div>
                                    <h1 class="text-secondary">{{turnIntoTime(720)}}</h1>
                                </div>
                            </div>
                            <div class="progress h-10px w-100 mt-4">
                                <div
                                    class="progress-bar time_progress"
                                    role="progressbar"
                                    :style="`width: 75%`"
                                    :aria-valuenow="75"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6">
                                    <p class="fs-3 text-secondary">
                                        Start Time
                                        <span class="ps-2 text-dark fw-bolder">{{startTime}}</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="fs-3 text-secondary">
                                        Date
                                        <span class="ps-2 text-dark fw-bolder">{{date}}</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="fs-3 text-secondary">
                                        End Time
                                        <span class="ps-2 text-dark fw-bolder">{{endTime}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>



                    </div>
                    <!--end::Body-->
                </div>

            </div>
        </div>


        <div class="accordion" multiple="true" id="questions_accordion">
            <template  v-for="(question,index) in questions" >
                <template v-if="question.result.status !== 'initial'">
                    <div class="accordion-item my-5">
                        <h2 class="accordion-header" :id="'questions_accordion_header_' + index">
                            <button
                                class="accordion-button fs-4 fw-bold collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                :data-bs-target="'#questions_accordion_body_' + index"
                                aria-expanded="false"
                                :aria-controls="'questions_accordion_body_' + index">

                                <div class="d-flex justify-content-between w-100">
                                    <div>{{question.title}}</div>
                                    <div>
                                        <span class="me-3">{{turnIntoTime(question.result.spent,true)}}</span>
                                        <template v-if="question.result.status === 'right'">
                                            <span class="text-success me-3">1/1մ</span>
                                            <span class="badge badge-success me-1">Ճիշտ</span>
                                        </template>
                                        <template v-else>
                                            <span class="text-danger me-2">0/1մ</span>
                                            <span class="badge badge-danger me-1">Սխալ</span>
                                        </template>
                                    </div>

                                </div>
                            </button>
                        </h2>
                        <div
                            :id="'questions_accordion_body_' + index"
                            class="accordion-collapse collapse"
                            :aria-labelledby="'questions_accordion_header_' + index"
                        >
                            <div class="accordion-body"><StatisticAnswer :question="question"/></div>
                        </div>
                    </div>
                </template>


            </template>


        </div>

    </template>
</template>

<script>
import Swal from "sweetalert2/dist/sweetalert2";
import ApiService from "../../../core/services/ApiService";
import StatisticAnswer from "../../../app/components/tests/StatisticAnswer";

export default {
    name: "TestStatistics",
    components: {StatisticAnswer},
    data(){
        return {
            questions:[],
            test:null,
            chartOptions:{
                chart: {
                    fontFamily: "inherit",
                    height: '200',
                    type: "radialBar",
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "65%",
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: false,
                                fontWeight: "700",
                            },
                            value: {
                                color: '#000',
                                fontSize: "30px",
                                fontWeight: "700",
                                offsetY: 12,
                                show: true,
                                formatter: function (val) {
                                    return val + "%";
                                },
                            },
                        },
                        track: {
                            background: '#dcfdfdd9',
                            strokeWidth: "100%",
                        },
                    },
                },
                colors: ['#04C8C8'],
                stroke: {
                    lineCap: "round",
                },
                labels: ["Progress"],
            }
        }
    },
    computed:{
        chartConf(){
            let conf = this.chartOptions;
            if(this.percent < 50){
                conf.plotOptions.radialBar.track.background = '#de808033'
                conf.colors = ['#f00']
            }
            return conf;
        },
        percent(){
            if(this.questions && this.questions.length){
                return this.questions.filter(val => val.result.status === 'right').length * 100 / this.questions.length
            }
            return 0;
        },
        testDuration(){
            let time = 0;
            this.questions.forEach(value => time += value.result.spent)
            return time
        },
        startTime(){
            let date = new Date(this.test.started_at);
            let hours = date.getHours();
            hours = hours < 10 ? '0' + hours : hours;
            let minutes = date.getMinutes();
            minutes = minutes < 10 ? '0' + minutes : minutes;
            return hours + ':' + minutes
        },
        endTime(){
            let date = new Date(this.test.ended_at);
            let hours = date.getHours();
            hours = hours < 10 ? '0' + hours : hours;
            let minutes = date.getMinutes();
            minutes = minutes < 10 ? '0' + minutes : minutes;
            return hours + ':' + minutes
        },
        date(){
            let date = new Date(this.test.started_at);
            let month = date.getMonth()
            month = month < 10 ? '0' + month : month;
            let day = date.getDate()
            day = day < 10 ? '0' + day : day;
            return date.getFullYear() + '-' + month + '-' + day
        }
    },
    methods:{
        turnIntoTime(time,depth = null){
            let hours = Math.floor(time / 3600);
            hours = hours < 10 ? '0' + hours : hours;
            let minutes = Math.floor(time%3600 / 60);
            minutes = minutes < 10 ? '0' + minutes : minutes;
            let seconds = time%60 < 10 ? '0' + time%60 : time%60;
            if(!depth){
                return hours + ':' + minutes + ':' + seconds
            }
            return minutes + ':' + seconds
        }
    },
    created() {

        ApiService.setHeader();
        ApiService.get("/axios/get-statistics/" + this.$route.params.id)
            .then(({ data }) => {
                console.log(data)
                if(data.success === 'success'){
                    this.test = data.test
                    this.questions = data.test.questions
                   console.log(data, 'statistics')
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
                console.log(response, 'get-statistics  error')

            });
    }
}
</script>

<style scoped>
.line-height-1, .line-height-1  *{
    line-height: 1;
}
.time_progress{
    background: #000;
}
</style>
