<template>
    <div class="personal-page">
        <asside class="left-panel">
            <p @click="tabIndex = 1" class="panel-component">Персональная информация</p>
            <p @click="tabIndex = 2" class="panel-component">Мои записи</p>
            <p @click="tabIndex = 3" class="panel-component">Статистика</p>
            <p @click.once="randMethod" class="panel-component">Выход</p>
        </asside>
        <div class="container">
            <div class="info" v-if="tabIndex === 1">
                    <input type="hidden" name="id" :value="user.id">

                    <label for="image">Ваш аватар</label>
                    <img v-show="imgForView" class="Image-input__image" :src="imgForView">
                    <input @change="viewImage" id="image" class="Image-input__input" name="image" ref="image" type="file">

                    <label for="name">Имя</label>
                    <input v-model="name" id="name" name="name">

                    <button @click="updateUserInfo">Обновить информацию</button>
            </div>
            <div class="my-records" v-if="tabIndex === 2">

            </div>
            <div class="statistic " v-if="tabIndex === 3">

            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tabIndex: 1,
            imgForView: '',
            imgForSend: '',
            name: '',
            email: '',
            answer: '',
        }
    },
    props: {
        user: {
            type: Object,
            require: true,
        }
    },
    created() {
        this.name = this.user.name;
        this.imgForView = this.user.avatar;
    },
    methods: {
        show() {
            console.log('1111111111');
        },
        randMethod() {
            axios
                .get('/api/test');

        },
        updateUserInfo() {
            let formData = new FormData();
            formData.append('file', this.imgForSend);
            formData.append('name', this.name);
            formData.append('id', this.user.id)
            axios.post('api/updateUser', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
        },
        updateImage() {
            this.imgForSend = this.$refs.image.files[0];
        },
        viewImage: function(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var vm = this;
                reader.onload = function(e) {
                    vm.imgForView = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
            this.updateImage();
        },
    }
}
</script>
