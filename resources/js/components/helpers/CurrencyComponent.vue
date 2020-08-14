<template>
    <span>
        {{ finalMoney }}
    </span>
</template>

<script>
    import moment from 'moment';
    export default {
        props: ['money','type', 'currency'],
        data() {
            return{
                finalMoney: '',
            }
        },

        created() {
            this.formatNumber(this.money,this.type,this.currency);
        },

        mounted(){
            
        },

        methods: {

            formatNumber(money, type, currency){
                let formatter = new Intl.NumberFormat(type, {
                    style: 'currency',
                    currency: currency,
                });

                this.finalMoney = formatter.format(money);
            }

        }
    }

</script>
