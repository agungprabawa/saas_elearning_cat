<template>
    <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
        <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
            <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
                <ul class="kt-menu__nav ">

                    <li class="kt-menu__section ">
                        <h4 class="kt-menu__section-text"><i class="kt-menu__section-icon flaticon-presentation-1"></i>Soal</h4>

                    </li>
                    <li v-for="(item, index) in soal" :key="index" v-on:click="moveTo(index)" class="nav-question kt-menu__item">
                        <div class="kt-menu__link ">
                            <span class="kt-menu__link-text">
                                
                            </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import {EventBus} from '../../event-bus.js';
    export default {
        props: [],
        data() {
            return {
                soal: [],
                active_soal: 1,
            }
        },
        mounted() {
            EventBus.$on('change-nav', nomorSoal => {
                console.log(nomorSoal);
                this.active_soal = nomorSoal;
            });

            EventBus.$on('exam-loaded', exams => {
                this.soal = exams;
            });
        },

        methods: {
            moveTo(index){
                EventBus.$emit('change-main', this.active_soal);
            }
        }

    }
</script>