<template>
    <div class="d-flex flex-row justify-content-center">

        <input type="hidden" :name="fieldName" :value="year">

        <div class="input-container">
            <input
                    name="millenium"
                    v-model="millenium"
                    type="number"
                    max="2"
                    min="1"
                    class="h1 border-0 input-century"
                    maxlength="1">
        </div>
        <div class="input-container">
            <input
                    name="century"
                    v-model="century"
                    type="number"
                    max="9"
                    min="0"
                    class="h1 border-0 input-century"
                    maxlength="1">
        </div>
        <div class="input-container">
            <input
                    name="decade"
                    v-model="decade"
                    type="number"
                    max="9"
                    min="0"
                    class="h1 border-0 input-year"
                    maxlength="1"
            >
        </div>
        <div class="input-container">
            <input
                    name="decadeYear"
                    v-model="decadeYear"
                    type="number"
                    max="9"
                    min="0"
                    class="h1 border-0 input-year"
                    maxlength="1"
            >
        </div>

    </div>

</template>

<script>
    export default {
        name: "YearOfBirthInputComponent",
        props: {
            initialCentury: { // 19,20 etc
                type: Number
            },
            fieldName: {
                type: String,
                default: 'year'
            }
        },
        data() {
            return {
                millenium: 1,
                century: 9,
                decade: 0,
                decadeYear: 0,
            }
        },
        computed: {
            year() {
                return this.millenium + '' + this.century + '' + this.decade + '' + this.decadeYear;
            }
        },

        created: function () {
            if (this.initialCentury) {
                this.millenium = Math.floor(this.initialCentury / 10);
                this.century = this.initialCentury % 10;
            }
        },

    }
</script>

<style lang="scss" scoped>

    .input-century, .input-year {
        max-width: 1em;
        font-size: 3em;
    }

    .input-year {
        color: silver;
    }

    .input-container {
        border-bottom: solid silver 2px;
        padding-left: 1em;
        margin: 0.25em;
    }

</style>