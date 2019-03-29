<template>
    <div>
        <b-form
                id="registrationForm"
                @submit="onSubmit"
                @reset.prevent="onReset"
                novalidate>

            <b-form-group
                    id="fieldset-email"
                    :label="emailLabel"
                    label-for="email"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.email"
                    :state="state.email"
            >
                <b-form-input
                        type="email"
                        id="email"
                        v-model="user.email"
                        :state="state.email"
                        trim
                        required
                        :placeholder="emailLabel"
                >

                </b-form-input>


            </b-form-group>

            <b-form-group
                    id="fieldset-title"
                    :label="titleLabel"
                    label-for="title"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.title"
                    :state="state.title"
            >

                <b-form-select
                        id="title"
                        v-model="user.title"
                        :options="titleOptions"
                        required
                        :state="state.title"
                ></b-form-select>

            </b-form-group>

            <b-form-group
                    id="fieldset-first_name"
                    :label="firstNameLabel"
                    label-for="first_name"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.first_name"
                    :state="state.first_name"
            >

                <b-form-input
                        type="text"
                        id="first_name"
                        v-model="user.first_name"
                        required
                        trim
                        :state="state.first_name"
                        :placeholder="firstNameLabel"

                ></b-form-input>

            </b-form-group>

            <b-form-group
                    id="fieldset-last_name"
                    :label="lastNameLabel"
                    label-for="last_name"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.last_name"
                    :state="state.last_name"
            >

                <b-form-input
                        id="last_name"
                        type="text"
                        v-model="user.last_name"
                        :state="state.last_name"
                        required
                        trim
                        :placeholder="lastNameLabel"
                ></b-form-input>

            </b-form-group>

            <b-form-group
                    id="fieldset-mobile"
                    :label="mobileLabel"
                    label-for="mobile"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.mobile"
                    :state="state.mobile"
            >

                <b-form-input
                        id="mobile"
                        type="tel"
                        v-model="user.mobile"
                        :state="state.mobile"
                        required
                        trim
                        :placeholder="mobileLabel"
                ></b-form-input>

            </b-form-group>

            <b-form-group
                    id="fieldset-postcode"
                    :label="postcodeLabel"
                    label-for="postcode"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.postcode"
                    :state="state.postcode"
            >

                <b-form-input
                        id="postcode"
                        v-model="user.postcode"
                        type="text"
                        max="4"
                        required
                        trim
                        :state="state.postcode"
                        :formatter="postcodeFormatter"
                        :placeholder="postcodeLabel"
                ></b-form-input>


            </b-form-group>

            <b-form-group
                    id="fieldset-date_of_birth"
                    :label="dateOfBirthLabel"
                    label-for="date_of_birth"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.date_of_birth"
                    :state="state.date_of_birth"
            >

                <b-form-input
                        type="date"
                        id="date_of_birth"
                        v-model="user.date_of_birth"
                        required
                        :max="maxDateOfBirth"
                        :placeholder="dateOfBirthLabel + ' (dd/mm/yyyy)'"
                ></b-form-input>

            </b-form-group>

            <b-form-group
                    id="fieldset-password"
                    :label="passwordLabel"
                    label-for="password"
                    label-sr-only
                    :invalid-feedback="invalidFeedback.password"
                    :state="state.password"
            >

                <b-input-group>
                    <b-form-input
                            id="password"
                            :type="passwordType"
                            class="form-control"
                            v-model="user.password"
                            required
                            :placeholder="passwordLabel"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-btn
                                variant="link"
                                class="form-control"
                                @click="showPassword = !showPassword"
                        >
                            {{ showLabel }}
                        </b-btn>
                    </b-input-group-append>
                </b-input-group>

                <password
                        v-model="user.password"
                        :strength-meter-only="true"
                ></password>

            </b-form-group>

            <b-form-group>
                <b-form-checkbox
                        id="acceptTerms"
                        name="acceptTerms"
                        v-model="user.acceptTerms"
                        :state="state.acceptTerms"
                        required
                        :value="true"
                        :unchecked-value="false"
                >
                    {{acceptTermsLabel}}
                </b-form-checkbox>
                <b-form-invalid-feedback :state="!validated || user.acceptTerms">{{invalidFeedback.acceptTerms}}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-button type="submit" variant="primary">{{registerButtonLabel}}</b-button>
            <b-button type="reset" variant="warning">{{resetButtonLabel}}</b-button>

        </b-form>
    </div>
</template>

<script>
    import Password from 'vue-password-strength-meter'

    export default {
        name: "RegistrationComponent",
        components: {Password},

        props: {
            emailLabel: {
                type: String,
                default: 'EMAIL'
            },
            emailInvalidFeedback: {
                type: String,
                default: 'Please provide a valid email address'
            },
            titleLabel: {
                type: String,
                default: 'TITLE'
            },
            titleInvalidFeedback: {
                type: String,
                default: 'Please select a title'
            },
            firstNameLabel: {
                type: String,
                default: 'FIRST NAME'
            },
            firstNameInvalidFeedback: {
                type: String,
                default: 'please provide a first name'
            },
            lastNameLabel: {
                type: String,
                default: 'LAST NAME'
            },
            lastNameInvalidFeedback: {
                type: String,
                default: 'please provide a last name'
            },
            mobileLabel: {
                type: String,
                default: 'MOBILE'
            },
            mobileInvalidFeedback: {
                type: String,
                default: 'Please provide a valid telephone number'
            },
            postcodeLabel: {
                type: String,
                default: 'POSTCODE'
            },
            postcodeInvalidFeedback: {
                type: String,
                default: 'Please provide a valid australian postcode'
            },
            dateOfBirthLabel: {
                type: String,
                default: 'DATE OF BIRTH'
            },
            dateOfBirthInvalidFeedback: {
                type: String,
                default: 'Please provide a valid date of birth'
            },
            passwordLabel: {
                type: String,
                default: 'PASSWORD'
            },
            passwordInvalidFeedback: {
                type: String,
                default: 'Please provide a password'
            },
            acceptTermsLabel: {
                type: String,
                default: 'I agree to terms of use'
            },
            acceptTermsInvalidFeedback: {
                type: String,
                default: 'Please agree to accept the terms'
            },
            registerButtonLabel: {
                type: String,
                default: 'REGISTER'
            },
            resetButtonLabel: {
                type: String,
                default: 'RESET'
            },
            titleOptions: {
                type: Array,
                default: () => [{value: null, text: 'select title'}, 'Mr', 'Ms', 'Mrs', 'Dr']
            },
            maxDateOfBirth: {
                type: String,
                default: () => {
                    var d = new Date();
                    d.setFullYear(d.getFullYear() - 18);
                    return d.toISOString();
                }
            },
            passwordHideLabel: {
                type: String,
                default: 'hide'
            },
            passwordShowLabel: {
                type: String,
                default: 'show'
            }

        },

        data() {
            return {
                user: {
                    email: null,
                    title: null,
                    first_name: null,
                    last_name: null,
                    mobile: null,
                    postcode: null,
                    date_of_birth: null,
                    password: null,
                    acceptTerms: false
                },
                state: {
                    email: null,
                    title: null,
                    first_name: null,
                    last_name: null,
                    mobile: null,
                    postcode: null,
                    date_of_birth: null,
                    password: null,
                    acceptTerms: null
                },
                invalidFeedback: {
                    email: null,
                    title: null,
                    first_name: null,
                    last_name: null,
                    mobile: null,
                    postcode: null,
                    date_of_birth: null,
                    password: null,
                    acceptTerms: null
                },
                showPassword: false,
                validated: false

            }
        },
        computed: {

            passwordType() {
                return this.showPassword ? 'text' : 'password';
            },
            showLabel() {
                return this.showPassword ? this.passwordHideLabel : this.passwordShowLabel;
            },

        },

        created() {
            this.invalidFeedback.email = this.emailInvalidFeedback;
            this.invalidFeedback.title = this.titleInvalidFeedback;
            this.invalidFeedback.first_name = this.firstNameInvalidFeedback;
            this.invalidFeedback.last_name = this.lastNameInvalidFeedback;
            this.invalidFeedback.mobile = this.mobileInvalidFeedback;
            this.invalidFeedback.postcode = this.postcodeInvalidFeedback;
            this.invalidFeedback.date_of_birth = this.dateOfBirthInvalidFeedback;
            this.invalidFeedback.password = this.passwordInvalidFeedback;
            this.invalidFeedback.acceptTerms = this.acceptTermsInvalidFeedback;
        },

        methods: {
            onSubmit(event) {

                event.preventDefault();
                event.stopPropagation();

                var form = document.getElementById('registrationForm');
                var valid = true;
                // Loop over them and prevent submission
                if (form.checkValidity() === false) {
                    valid = false;
                }

                form.classList.add('was-validated');
                this.validated = true;

                if (valid) {
                    const url = route('register.api');
                    axios
                        .post(url, this.user)
                        .then(response => this.checkRegistrationResponse(response))
                        .catch(error => this.handleRegistrationError(error));
                }
                return valid;

            },
            onReset() {
                user.email = null;
                user.title = null;
                user.first_name = null;
                user.last_name = null;
                user.mobile = null;
                user.postcode = null;
                user.date_of_birth = null;
                user.password = null;
                user.acceptTerms = null;
            },
            postcodeFormatter(value, event) {
                // allows only digits
                const regex = /[^0-9]/;
                return value.replace(regex, '');
            },
            checkRegistrationResponse(response) {
                window.location = response.data.redirect;
            },
            handleRegistrationError(error) {
                if (error.response && error.response.status === 422 && error.response.data && error.response.data.errors) {
                    // validation error
                    this.handleValidationErrors(error.response.data.errors)
                } else {
                    console.log(error);
                }

            },
            handleValidationErrors(errors) {
                for (var item in errors) {
                    this.state[item] = 'invalid';
                    this.invalidFeedback[item] = errors[item].join('<br/>');
                }
            }
        }
    }
</script>

<style scoped>

</style>