<template>
    <div class="d-flex flex-row justify-content-center">

        <input type="hidden" :name="fieldName" :value="year">

        <input
                name="millenium"
                v-model="millenium"
                type="number"
                max="2"
                min="1"
                class="form-control input-century"
                maxlength="1">
        <input
                name="century"
                v-model="century"
                type="number"
                :max="centuryMax"
                min="0"
                class="form-control input-century"
                maxlength="1">
        <input
                name="decade"
                v-model="decade"
                type="number"
                max="9"
                min="0"
                class="form-control input-year"
                maxlength="1"
        >
        <input
                name="decadeYear"
                v-model="decadeYear"
                type="number"
                max="9"
                min="0"
                class="form-control input-year"
                maxlength="1"
        >

    </div>

</template>

<script>
    export default {
        name: "YearOfBirthInputComponent",
        props: {

            initialYear: {
                type: Number,
                default: 1900
            },
            fieldName: {
                type: String,
                default: 'year'
            }
        },
        data() {
            return {
                millenium: null,
                century: null,
                decade: null,
                decadeYear: null,
            }
        },
        computed: {
            year() {
                return this.millenium + '' + this.century + '' + this.decade + '' + this.decadeYear;
            },
            centuryMax() {
                return this.millenium >= "2" ? "0" : "9";
            }
        },
        watch: {
            millenium(newValue, oldValue) {
                if (oldValue !== null && newValue > oldValue) {
                    this.century = 0;
                    this.decade = 0;
                    this.decadeYear = 0;
                }
            },
            century(newValue, oldValue) {
                if (oldValue !== null && newValue > oldValue) {
                    this.decade = 0;
                    this.decadeYear = 0;
                }
            }
        },


        created: function () {

            if (this.initialYear) {
                this.millenium = Math.floor(this.initialYear / 1000);
                this.century = this.initialYear % 1000;
                this.century = Math.floor(this.century / 100);
                this.decade = this.initialYear % 100;
                this.decade = Math.floor(this.decade / 10);
                this.decadeYear = this.initialYear % 10;
            }
        },

    }
</script>

<style lang="scss" scoped>


</style>