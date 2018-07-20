<template>
  <div>
    <vue-ckeditor v-model="content" :config="config" @blur="onBlur($event)" @focus="onFocus($event)" />
  </div>
</template>

<script>
import VueCkeditor from 'vue-ckeditor2';

export default {
  components: { VueCkeditor },
  data() {
    return {
      content: '',
      config: {
        height: 300
      }
    };
  },
  methods: {
    onBlur(editor) {
      console.log(editor);
    },
    onFocus(editor) {
      console.log(editor);
    }
  }
};
</script>
