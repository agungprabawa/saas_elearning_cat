<template>

</template>

<script>
import { EventBus } from '../../event-bus.js';
export default {
    props: [],
    data(){
        return {
            soal: [],
            active_soal: 1,
        }
    },

    created(){

    },

    mounted(){
        EventBus.$on('move-to', nomorSoal => {
            console.log(nomorSoal);
            this.active_soal = nomorSoal;
        });
    }

}
</script>