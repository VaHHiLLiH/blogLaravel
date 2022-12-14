<template id="image-input-template">
    <div class="Image-input">
        <div class="Image-input__image-wrapper">
            <i v-show="! imageSrc" class="icon fa fa-picture-o"></i>
            <img v-show="imageSrc" class="Image-input__image" :src="imageSrc">
        </div>

        <div class="Image-input__input-wrapper">
            Choose
            <input @change="previewThumbnail" class="Image-input__input" name="thumbnail" type="file">
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            file: ''
        }
    },
    methods: {
        previewThumbnail: function(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var vm = this;
                reader.onload = function(e) {
                    vm.imageSrc = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}
</script>
