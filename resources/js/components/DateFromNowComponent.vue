<template>
    <span>
        {{ dates }}
    </span>
</template>

<script>
    import moment from 'moment';
    export default {
        props: ['date','type'],
        data() {
            return{
                dates: '',
            }
        },

        created() {
            let ref = this;
            if(this.date == 'kosong'){
                this.dates = "-";

            }else if(this.date == 'now'){
                setInterval(()=>{
                    let date = new Date();
                    this.dates = ref.formatDate(date.toISOString(), this.type);
                    // console.log(date.toISOString());
                }, 1000);
                
            }else{
                setInterval(()=>{
                    this.dates = ref.formatDate(this.date, this.type);
                },1000);
                
            }
        },

        mounted(){
            
        },

        methods: {

            formatDate(date, type) {
                moment.locale('id');
                if(type == 'fromnow'){
                    return moment(date, 'YYYY-MM-DD hh:mm:ss').fromNow();
                }else if(type == 'date'){
                    return moment(date, 'YYYY-MM-DD hh:mm:ss').format('dddd Do MMMM YYYY');
                }else if(type == 'datetime'){
                    return moment(date, 'YYYY-MM-DD hh:mm:ss').format('dddd Do MMM YYYY hh:mm:ss');
                }else if(type == 'onlydate'){
                    return moment(date, 'YYYY-MM-DD hh:mm:ss').format('Do MMMM YYYY');
                }
            },

            formatRealTime(){
                var ref = this;

            }

        }
    }

</script>
