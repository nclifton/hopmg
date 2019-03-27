<template>
    <div class="d-flex flex-row">
        <div>
            <input
                    name="millenium"
                    :value="millenium"
                    type="number"
                    max="2"
                    min="1"
                    class="h1 border"
                    maxlength="1">
        </div>
        <div>
            <input name="century" :value="century" type="number" max="9" min="0" class="h1" maxlength="1">
        </div>
        <div>
            <input name="millenium" :value="decade" type="number" max="9" min="0" class="h1" maxlength="1">
        </div>
        <div>
            <input name="decadeYear" :value="decadeYear" type="number" max="9" min="0" class="h1" maxlength="1">
        </div>

    </div>

</template>

<script>
    export default {
        name: "YearOfBirthInputComponent",
        props: {
            initialCentury: { // 19,20 etc
                type: Number
            }
        },
        data() {
            return {
                millenium: 1,
                century: 9,
                decade: '',
                decadeYear: ''
            }
        },
        created: function() {
            if (this.initialCentury){
                this.millenium = Math.floor(this.initialCentury / 10);
                this.century = this.initialCentury % 10;
            }
        },

    }
</script>

<style scoped>

</style>