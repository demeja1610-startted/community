<template>
    <div class="lk-settings">
        <div class="lk-settings__item">
            <h2 class="text_secondary-6 mb-4">Основное</h2>

            <div class="form-item mb-4">
                <div class="lk-label text_secondary-6">Имя</div>
                <input name="name" v-model="form.name" class="form-input" type="text">
            </div>

            <div class="form-item mb-4">
                <div class="lk-label text_secondary-6">О себе</div>
                <input name="about" v-model="form.about" class="form-input" type="text">
            </div>

            <div class="form-item mb-4">
                <div class="lk-label text_secondary-6">Email</div>
                <input name="email" v-model="form.email" class="form-input" type="text">
            </div>
        </div>
        <div class="lk-settings__item">
            <h2 class="text_secondary-6 mb-4">Уведомления</h2>
            <div class="form-item mb-4">
                <div class="lk-label text_secondary-6">Пароль</div>
                <div class="forms_checkbox">
                    <input name="notification" v-model="form.notification_preference" type="checkbox"
                           class="forms_checkbox-input">
                    <span class="forms_checkbox-span"></span>
                </div>
            </div>
        </div>

        <div class="lk-settings__item">
            <h2 class="text_secondary-6 mb-4">Смена пароля</h2>
            <div class="form-item mb-4">
                <div class="lk-label text_secondary-6">Пароль</div>
                <input name="password" v-model="form.password" class="form-input" type="password">
            </div>
            <div class="form-item mb-4">
                <input name="password_repeat" v-model="form.password_repeat" class="form-input"
                       placeholder="Повторите пароль" type="password">
            </div>
        </div>
    </div>
</template>

<script>
import {required, numeric, minLength, maxLength, email, sameAs} from 'vuelidate/lib/validators'

export default {
    name: "LKSettings",
    data: () => ({
        form: {
            email: '',
            name: '',
            notification_preference: '',
            about: '',
            password: '',
            password_repeat: '',
        }
    }),
    validations: {
        form: {
            email: {
                required,
                email
            },
            name: {
                required,
                minLength: minLength(4),
                maxLength: maxLength(30),
            },
            about: {
                minLength: minLength(2),
                maxLength: maxLength(400),
            },
            password: {
                required,
                minLength: minLength(6),
            },
            password_repeat: {
                sameAs: sameAs('password')
            }
        }
    },
    props: {
        user: null
    },
    beforeMount() {
        this.form.name = this.user.name
        this.form.email = this.user.email
        this.form.name = this.user.name
        this.form.name = this.user.name
        this.form.name = this.user.name
    },
    mounted() {
        console.log(this.user)
    }
}
</script>

<style lang="scss" scoped>
.lk-settings {
    max-width: 600px;

    &__item {
        margin-bottom: 60px;
    }
}

.lk-label {
    font-weight: 500;
    font-size: 15px;
    line-height: 24px;
    margin-bottom: 6px;
    letter-spacing: -0.13px;
}
</style>
